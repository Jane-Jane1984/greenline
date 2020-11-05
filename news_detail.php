<?php

require_once 'core/init.php';

$id = intval($_GET['id']);
$title = 'Новость';
$query = "SELECT n.`id`, n.`title`, n.`detail_text`, DATE_FORMAT(n.`date`, '%d.%m.%Y %H:%i') AS date_detail, n.`image`, n.`comments_cnt`, c.`title` AS news_cat FROM `news` n
JOIN `category` c ON c.`id` = n.`category_id` WHERE n.`id` = ? LIMIT ?";

$res = getStmtResult($link, $query, [$id, 1]);

$arNewsDetail = mysqli_fetch_assoc($res);

$resComment = getStmtResult($link, "SELECT * FROM `comments` WHERE `news_id` = ?", [$id]); 

$arComments = mysqli_fetch_all($resComment, MYSQLI_ASSOC); //получаем комментарии текущей новости, строка выше это запрос новости

$comments = renderTemplate('comments', [ //получаем шаблон комментариев
        'arComments' => $arComments //передаём массив в шаблон комментариев
]);






$arTag = mysqli_query($link, "SELECT t.`id`, t.`tag`, t.`news_id` FROM `tags` t JOIN `news` n ON t.`news_id` = n.`id`");

$arrTags = mysqli_fetch_all($arTag, MYSQLI_ASSOC);

pr($arrTags);

$page_content = renderTemplate("news_detail", [ //получаем html блока c новостями шаблона news_detail
    'arNews' => $arNewsDetail,  //передаём массив с новостью, полученной из базы
    'comments' => $comments  //передвём готовый html комментариев
]);


$result = renderTemplate('layout', [  //получаем главный шаблон страницы
    'content' => $page_content, //туда передаём html-код шаблона main
    'title' => $title, //передаём заголовок окна
    'arCategory' => $arCategory, //передаём массив с категориями из базы
    'menuActive' => 'main'
]);

echo $result; //выводим на экран окончательный html страницы

