<?php

require_once 'core/init.php';

/**
 * $arCategory - список категорий для layout(init.php)
 */

$title = 'Главная страница';

$num = 3; //количество новостей на странице

$resTotal = mysqli_query($link, "SELECT * FROM `news`");
$total = mysqli_num_rows($resTotal); //возвращает количество записей в запросе
$totalStr = ceil($total / $num);  //общее число страниц с функцией округления в большую сторону

$page = intval($_GET['page']); //получение номера страницы из адресной строки(массива GET)с функцией приведения данных к числу
if($page <= 0){
    $page = 1;  //если номер страницы не существует или отрицательный
}elseif ($page > $totalStr){
    $page = $totalStr; //если номер страницы больше, чем их количество
}

$offset = $page * $num - $num; //формула определят, с какой новости начинать


$res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`,
n.`date`, n.`image`, n.`comments_cnt`, c.`title` AS news_cat FROM `news` n
JOIN `category` c ON c.`id` = n.`category_id` ORDER BY n.`id` LIMIT $offset, $num");

$arNews = mysqli_fetch_all($res, MYSQLI_ASSOC);

$arPage = range(1, $totalStr); //создали массив с количеством страниц новостей с помощью функции

//шаблон навигации
$pageNavigation = renderTemplate('navigation', [
                                        'arPage' => $arPage,  //получаем html шаблона навигации, передаем массив со страницами в него.
                                        'totalPage' => $totalStr, // передаём количество страниц
                                        'curPage' => $page //передаём текущую страницу
]);

//pr($arNews);

$page_content = renderTemplate("main", [ //получаем html блока c новостями шаблона main/
                        'arNews' => $arNews,  //передаём массив с новостями, полученными из базы
                        'navigation' => $pageNavigation  //передаём полученный html-код навигации
]);


$result = renderTemplate('layout', [  //получаем главный шаблон страницы
                        'content' => $page_content, //туда передаём html-код шаблона main
                        'title' => $title, //передаём заголовок окна
                        'arCategory' => $arCategory //передаём массив с категориями из базы
                        ]);

echo $result; //выводим на экран окончательный html страницы


