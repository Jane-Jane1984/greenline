<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/init.php";

//сюда будем отправлять пользователя

$arResult = [];
$search = $_GET['search'];
if($search != '') {
    $query = "SELECT n.`id`, n.`title`, n.`detail_text`, DATE_FORMAT(n.`date`, '%d.%m.%Y %H:%i') AS news_date, n.`image`, n.`comments_cnt`, c.`title` AS news_cat FROM `news` n
JOIN `category` c ON c.`id` = n.`category_id` WHERE MATCH(`detail_text`) AGAINST(?)";
    
    $res = getStmtResult($link, $query, [$search]);

    while($arRes = mysqli_fetch_assoc($res)){
        $text = substr($arRes['detail_text'], 0, 200);
        $arRes['detail_text'] = $text;

        $arResult[] = $arRes;
    }


}

$page_content = renderTemplate('search', ['arResult' => $arResult]);

$result = renderTemplate('layout', [  //получаем главный шаблон страницы
    'content' => $page_content, //туда передаём html-код шаблона main
    'title' => 'Поиск по сайту', //передаём заголовок окна
    'arCategory' => $arCategory, //передаём массив с категориями из базы
    'menuActive' => ''
]);

echo $result; //выводим на экран окончательный html страницы