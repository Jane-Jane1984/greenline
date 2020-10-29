<?php

require_once 'core/init.php';

/**
 * $arCategory - список категорий для layout(init.php)
 */
$title = 'Поддержка';




//pr($arSupport);

$num = 3; //количество новостей на странице

$resTotal = mysqli_query($link, "SELECT * FROM `support`");
$total = mysqli_num_rows($resTotal); //возвращает количество записей в запросе
$totalStr = ceil($total / $num);  //общее число страниц с функцией округления в большую сторону

$page = intval($_GET['page']); //получение номера страницы из адресной строки(массива GET)с функцией приведения данных к числу
if($page <= 0){
    $page = 1;  //если номер страницы не существует или отрицательный
}elseif ($page > $totalStr){
    $page = $totalStr; //если номер страницы больше, чем их количество
}

$offset = $page * $num - $num; //формула определят, с какой новости начинать

$where = '';
if(isset($_GET['category'])){//проверяем есть ли такой параметр
    //pr($_GET['category']);
    $category = intval($_GET['category']);
    if($category > 0){
        $where = 'WHERE `category_id` =' . $category;
    }

}


$resSup = mysqli_query($link, "SELECT s.`title` AS `question`, s.`text` AS `answer` FROM `support` AS s $where ORDER BY s.`id` LIMIT $offset, $num");

$arSupport = mysqli_fetch_all($resSup, MYSQLI_ASSOC);

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
                                        'arPage' => $arPage,  //получаем html шаблона навигации, передаем массив со страницами в него.
                                        'totalPage' => $totalStr, // передаём количество страниц
                                        'curPage' => $page, //передаём текущую страницу
                                        'nextPage' => $nextPage, //передаём номер следующей страницы
                                        'prevPage' => $prevPage,  //передаём номер предыдущей страницы
                                        'show' => $is_nav  // параметр для показа навигации
                                         
]);

//pr($arNews);


$page_content = renderTemplate("support", [
                        'arSupport' => $arSupport,
                        'arNews' => $arNews,  //передаём массив с новостями, полученными из базы
                        'navigation' => $pageNavigation  //передаём полученный html-код навигации
]);

$result = renderTemplate('layout', [
                        'content' => $page_content, 
                        'title' => $title,
                        'arCategory' => $arCategory,
                        'menuActive' => 'support'
]);

echo $result;

?>
