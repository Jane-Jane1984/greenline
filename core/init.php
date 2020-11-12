<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php'; //подключаем настройки
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php'; //Подключаем соединение с базой
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/function.php'; // Подключение функций



$res = mysqli_query($link, "SELECT * FROM `category` ORDER BY `title` ASC");

$arCategory = mysqli_fetch_all($res, MYSQLI_ASSOC);  //ередали в ядро массив  с категориями
