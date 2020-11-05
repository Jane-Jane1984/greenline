<?php

require_once 'core/init.php';

/**
 * $arCategory - список категорий для layout(init.php)
 */

$title = 'О нас';

$arAb = mysqli_query($link, "SELECT `title`, `short_text`, `descript_text` FROM `about`");

$arAbout = mysqli_fetch_all($arAb, MYSQLI_ASSOC);

//pr($arAbout);

$page_content = renderTemplate("about", [
                              'arAbout' => $arAbout
]);

$res = renderTemplate('layout', [
                        'content' => $page_content, 
                        'title' => $title,
                        'arCategory' => $arCategory,
                        'menuActive' => 'about'
]);

echo $res;

?>