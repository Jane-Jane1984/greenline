<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

    if(isset($_POST['email']) && $_POST['email'] != ''){
        $email = $_POST['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $resEmail = getStmtResult($link, "SELECT * FROM `subscribe` WHERE `email` = ?", []);
            if(mysqli_num_rows($resEmail) > 0){
                echo "Такой email уже есть в базе.";
            }else{
                getStmtResult($link, "INSERT INTO `subscribe` SET `email` = ?", [$email]);
                echo "Email добавлен.";
            }
        }else{
            echo "Заполните поле корректно!";
        }

    }else{
        echo "Заполните поле email";
    }
?>