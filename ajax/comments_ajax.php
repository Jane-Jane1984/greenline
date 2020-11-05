<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

//pr($_POST);

$resC = getStmtResult($link, "INSERT INTO `comments` SET `text` = ?, `author` = ?, `news_id` = ?, `date` = NOW()", [
   $_POST['message'],
   $_POST['name'],
   $_POST['news_id']
]);

$resN = getStmtResult($link, "SELECT `comments_cnt` FROM `news` WHERE `id` = ?", [$_POST['news_id']]);
$cnt = mysqli_fetch_assoc($resN)['comments_cnt'];
$cnt++;

$resNews = getStmtResult($link, "UPDATE `news` SET `comments_cnt` = ? WHERE `id` = ?", [$cnt, $_POST['news_id']]);

