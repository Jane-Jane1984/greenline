<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/init.php";

/*
ob_start(); // Включаем буферизацию

echo 'Hello';

$str = ob_get_contents(); // Возвращает данные из буфера
ob_end_clean(); //Очищает буфер

$str = ob_get_clean(); // Возвращает данные из буфера. Очищает буфер

echo $str;
*/

/*
Шаги создания алгоритмf вывода новостей

1. Сколько выводить на страницу новостей

2. Сколько всего записей в базе в соответсвующей таблице

3. Сколько будет всего страниц с новостями

4. На какой сейчас странице находится пользователь, т.е. определить текущую страницу ($_GET['page'])

LIMIT n OFFSET m
где n- количество строк
    m- смещение, т.е. с какой записи начинать
*/

/*
Алгоритм создания шаблона навигации

1. Получить текущую страницу

2. Получить последнюю страницу

3. Получить две предыдущие страницы от текущей

4. Получить две следующие страницы после текущей
*/

/*
Алгоритм создания переключения категорий

1. У нас в ядре уже получен массив с категориями, иначе нужно было бы его получить

2. Сформировать ссылки с правильными GET_параметрами (layout)

3. Проверяем наличие параметров в массиве $_GET

4. Если параметры пришли, добавляем фильтрацию (условие) в запрос на выборку новостей
*/

/*
Алгоритм работы с подготовленными запросами

1. Сформировать запрос с плейсхолдером

2. Отправить запрос в базу

3. Подставить значение в подготовленное выражение

4. выполнить подготовленное выражение

5. Обработать результат выполнения

Типы переменных

i - integer - число
s - string - строка
d - double - число с точкой
b - blob - бинарные данные (большой объём) 

*/
/*
$category = $_GET['category'];
$title = 'Технологии';

$stmt = mysqli_prepare($link, "SELECT * FROM `category` WHERE `title` = ?"); //подготавливает запрос, возвращает указатель

mysqli_stmt_bind_param($stmt, "s", $title); //привязывает переменные к параметрам запроса

mysqli_stmt_execute($stmt); //выполняет подготовленный запрос

$res = mysqli_stmt_get_result($stmt); //получает результат запроса

while($arRes = mysqli_fetch_assoc($res)){
    pr($arRes);
}
*/
/*$category = $_GET['category'];
$title = 'Технологии';

$res = getStmtResult($link, "SELECT * FROM `category`");
while($arRes = mysqli_fetch_assoc($res)){
    pr($arRes);
    }
*/

        pr($_FILES);
        if(!empty($_FILES['user_file']['error'])){
            foreach ($_FILES['user_file']['error'] as $k => $val) {
                if($val == 0){
                    $upload = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
                    $arName = explode('.', $_FILES['user_file']['name'][$k]);
                    $name = $arName[0] . '_' . time() . '.' . $arName[1];
                    move_uploaded_file($_FILES['user_file']['tmp_name'][$k], $upload . $name);

                }
            }
        }

/*if($_FILES['user_file']['error'] == 0) //проверяем что файл был загружен

$upload = $_SERVER['DOCUMENT_ROOT'] . '/upload/'; // путь к папке с загрузками
$arName = explode('.', $_FILES['user_file']['name']); // массив с именем файла преобразуем в строку
$name = $arName[0] . '_' . time() . '.' . $arName[1]; //составляем новое имя для файла с использованием метки времени
    move_uploaded_file($_FILES['user_file']['tmp_name'], $upload . $name);

}*/



?>
<!--Форма для загрузки файлов-->

<form method="post" enctype="multipart/form-data">
    <!--<input type="hidden" name="MAX_FILE_SIZE" value="30000" />--> <!--поставить ограничение по размеру-->
    <input type="file" name="user_file[]"/><br/>
    <input type="file" name="user_file[]"/><br/>
    <input type="file" name="user_file[]"/><br/>
    <input type="file" name="user_file[]"/><br/>
    <input type ="submit" value="Загрузить"/>

</form>
