<?php

require_once 'core/init.php';

$title = 'Главная страница';

$res = mysqli_query($link, "SELECT * FROM `category` ORDER BY `title` ASC");
$arCategory = mysqli_fetch_all($res, MYSQLI_ASSOC);

// echo '<pre>';
// print_r($arCategory);
// echo '</pre>';


$page_content = renderTemplate("main");


$res = renderTemplate('layout', [
                        'content' => $page_content, 
                        'title' => 'Главная страница',
                        'arCategory' => $arCategory
                        ]);

echo $res;

?>
