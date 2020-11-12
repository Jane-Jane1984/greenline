<?php

require_once 'core/init.php';

/**
 * $arCategory - список категорий для layout(init.php)
 */

$title = 'Контакты';

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) !empty($_POST['message'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'KomlionokEM@yandex.ru'; //куда отправляем письмо
    $subject = 'Письмо из формы обратной связи';
    $text = '';
    $text .= 'Имя: ' . $name . PHP_EOL;
    $text .= 'Email' . $email . PHP_EOL;
    $text .= 'Телефон' . $phone . PHP_EOL;
    $text .= 'Сообщение' . $message . PHP_EOL;


}

$page_content = renderTemplate("contact");

$res = renderTemplate('layout', [
                        'content' => $page_content, 
                        'title' => $title,
                        'arCategory' => $arCategory, 
                        'menuActive' => 'contact'
]);

echo $res;

?>