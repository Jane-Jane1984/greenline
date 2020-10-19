<?php

require_once 'core/init.php';

/**
 * $arCategory - список категорий для layout(init.php)
 */
$title = 'Поддержка';

$resSup = mysqli_query($link, "SELECT s.`title` AS `question`, s.`text` AS `answer` FROM `support` AS s");

$arSupport = mysqli_fetch_all($resSup, MYSQLI_ASSOC);

//pr($arSupport);

$page_content = renderTemplate("support", [
                        'arSupport' => $arSupport
]);

$result = renderTemplate('layout', [
                        'content' => $page_content, 
                        'title' => $title,
                        'arCategory' => $arCategory
]);

echo $result;

?>
