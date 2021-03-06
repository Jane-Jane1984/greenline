<?php

require_once 'core/init.php';

/**
 * $arCategory - список категорий для layout(init.php)
 * $link - ресурс запроса
 */

$title = 'Главная страница';

$num = 3; //количество новостей на странице

/**
 * Фильтрация по категориям
 */
$where = '';
if(isset($_GET['category'])){//проверяем есть ли такой параметр
    //pr($_GET['category']);
    $category = intval($_GET['category']);
    if($category > 0){
        $where = 'WHERE `category_id` = ?';
    }

}

// если есть условие и выбранная категория
if($where != '' && isset($category)){
    $resTotal = getStmtResult($link, "SELECT * FROM `news` $where", [$category]);
}else{
    $resTotal = getStmtResult($link, "SELECT * FROM `news`");
}


$total = mysqli_num_rows($resTotal); //возвращает количество записей в запросе
$totalStr = ceil($total / $num);  //общее число страниц с функцией округления в большую сторону

$page = intval($_GET['page']); //получение номера страницы из адресной строки(массива GET)с функцией приведения данных к числу
if($page <= 0){
    $page = 1;  //если номер страницы не существует или отрицательный
}elseif ($page > $totalStr){
    $page = $totalStr; //если номер страницы больше, чем их количество
}

$offset = $page * $num - $num; //формула определят, с какой новости начинать

$query = "SELECT n.`id`, n.`title`, n.`preview_text`, DATE_FORMAT(n.`date`, '%d.%m.%Y %H:%i') AS news_date, n.`image`, n.`comments_cnt`, c.`title` AS news_cat FROM `news` n
JOIN `category` c ON c.`id` = n.`category_id` $where ORDER BY n.`id` LIMIT ?, ?";

// в зависимости от наличия условий подготавливаем параметры
if($where != '' && isset($category)){
    $param = [$category, $offset, $num];
}else{
    $param = [$offset, $num];
}

$res = getStmtResult($link, $query, $param);

$arNews = mysqli_fetch_all($res, MYSQLI_ASSOC);
//pr($arNews);
$arPage = range(1, $totalStr); //создали массив с количеством страниц новостей с помощью функции

$prevPage = '';
if($page > 1){
    $prevPage = $page - 1;
}
$nextPage = '';
if($page < $totalStr){
    $nextPage = $page + 1;
}


$is_nav = ($totalStr > 1) ? true : false; //если колич-во страниц больше одной, то показывать навигацию


//шаблон навигации
$pageNavigation = renderTemplate('navigation', [
                                        //'arPage' => $arPage,  //получаем html шаблона навигации, передаем массив со страницами в него.
                                        'totalPage' => $totalStr, // передаём количество страниц
                                        'curPage' => $page, //передаём текущую страницу
                                        'nextPage' => $nextPage, //передаём номер следующей страницы
                                        'prevPage' => $prevPage,  //передаём номер предыдущей страницы
                                        'show' => $is_nav  // параметр для показа навигации
]);

//pr($arNews);

$page_content = renderTemplate("main", [ //получаем html блока c новостями шаблона main
                        'arNews' => $arNews,  //передаём массив с новостями, полученными из базы
                        'navigation' => $pageNavigation  //передаём полученный html-код навигации
]);


$result = renderTemplate('layout', [  //получаем главный шаблон страницы
                        'content' => $page_content, //туда передаём html-код шаблона main
                        'title' => $title, //передаём заголовок окна
                        'arCategory' => $arCategory, //передаём массив с категориями из базы
                        'menuActive' => 'main' 
                        ]);

echo $result; //выводим на экран окончательный html страницы


