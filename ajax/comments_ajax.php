<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

//pr($_POST);

//$resTr = getStmtResult($link, "START_TRANSACTION");  //запустили транзакцию для контроля получения комментариев и корректности их счётчика

mysqli_begin_transaction($link); //запустили транзакцию для контроля получения комментариев и корректности их счётчика
    $resC = getStmtResult($link, "INSERT INTO `comments` SET `text` = ?, `author` = ?, `news_id` = ?, `date` = NOW()", [
       $_POST['message'],
       $_POST['name'],
       $_POST['news_id']
    ]);

    $id = mysqli_insert_id($link); //получает id только что вставленной записи

    $resN = getStmtResult($link, "SELECT `comments_cnt` FROM `news` WHERE `id` = ?", [$_POST['news_id']]);
    $cnt = mysqli_fetch_assoc($resN)['comments_cnt'];
    $cnt++;

    $resNews = getStmtResult($link, "UPDATE `news` SET `comments_cnt` = ? WHERE `id` = ?", [$cnt, $_POST['news_id']]);

if($id > 0){
    mysqli_commit($link);  //если нет ошибки, комментарий добавится, счётчик изменится
    //echo 'ok';

    $resComment = getStmtResult($link, "SELECT * FROM `comments` WHERE `news_id` = ?", [$_POST['news_id']]);

    $arComments = mysqli_fetch_all($resComment, MYSQLI_ASSOC); //получаем комментарии текущей новости, строка выше это запрос новости

    $comments = renderTemplate('comments', [ //получаем шаблон комментариев
        'arComments' => $arComments //передаём массив в шаблон комментариев
    ]);

    $arResult = []; //массив для комментариев с двумя ячейками
    $arResult['comments'] = $comments;
    $arResult['cc'] = count($arComments);

    echo json_encode($arResult); //превращаем массив в json

}else{
    mysqli_rollback($link);
    echo 'error';//если ошибка, всё останется без изменений

}
