<?php

require_once 'core/init.php';

//pr($_POST);
$admin_login = 'admin';
$admin_pass = 'admin';
if($_POST['login'] != '' && $_POST['pass'] != '') {
    if($_POST['login'] == $admin_login && $_POST['pass'] == $admin_pass){
        $_SESSION['is_admin'] ='1';
    }
}

$page_content = renderTemplate('admin');

$result = renderTemplate('admin_layout', [  //получаем главный шаблон страницы
    'content' => $page_content, //туда передаём html-код шаблона admin
    'title' => $Админка, //передаём заголовок окна
    'menuActive' => 'main'
]);

echo $result; //выводим на экран окончательный html страницы

