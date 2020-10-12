<?php

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE);

if(!$link){

    echo 'Произошла ошибка!' . PHP_EOL;
    echo 'Код ошибки ' . mysqli_connect_errno() . PHP_EOL;
    echo 'Текст ошибки ' . mysqli_connect_error();
    die();
}

mysqli_set_charset($link, "utf8");