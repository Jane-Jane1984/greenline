<?php

require_once 'core/init.php';

$id = intval($_GET['id']);
$title = 'Новость';
$query = "SELECT n.`id`, n.`title`, n.`detail_text`, n.`date`, n.`image`, n.`comments_cnt`, c.`title` AS news_cat FROM `news` n
JOIN `category` c ON c.`id` = n.`category_id` WHERE n.`id` = ? LIMIT ?";

$res = getStmtResult($link, $query, [$id, 1]);

$arNewsDetail = mysqli_fetch_assoc($res);


$page_content = renderTemplate("news_detail", [ //получаем html блока c новостями шаблона news_detail
    'arNews' => $arNewsDetail  //передаём массив с новостью, полученной из базы
]);


$result = renderTemplate('layout', [  //получаем главный шаблон страницы
    'content' => $page_content, //туда передаём html-код шаблона main
    'title' => $title, //передаём заголовок окна
    'arCategory' => $arCategory, //передаём массив с категориями из базы
    'menuActive' => 'main'
]);

echo $result; //выводим на экран окончательный html страницы

