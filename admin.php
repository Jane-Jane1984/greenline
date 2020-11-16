<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/init.php";

//pr($_POST);
$admin_login = 'admin';
$admin_pass = 'admin';
if($_POST['login'] != '' && $_POST['pass'] != '') {
    if($_POST['login'] == $admin_login && $_POST['pass'] == $admin_pass){
        $_SESSION['is_admin'] ='1';
        //$new_news = [];
        if($_POST['title'] != '' && $_POST['detail_text'] != ''){

            $title = htmlspecialchars($_POST['title']);
            $detail_news = htmlspecialchars($_POST['detail_text']);
            echo $title;
            $new_news = "INSERT INTO `news` SET `title` = $title, `detail_text` = $detail_news";
            $arNew = mysqli_fetch_all($new_news, MYSQLI_ASSOC);
                //pr($arNew);
//            if($new_news){
//                mysqli_insert_id($link);
//                echo "Новость добавлена";
//            }
        }else{
            echo "Все поля должны быть заполнены";
        }
    }
}

$page_content = renderTemplate('admin');

$result = renderTemplate('admin_layout', [  //получаем главный шаблон страницы
    'content' => $page_content, //туда передаём html-код шаблона admin
    'title' => $Админка, //передаём заголовок окна
    'menuActive' => 'main'
]);

echo $result; //выводим на экран окончательный html страницы

