<?php

/**
 * Подключает шаблон с параметрами
 */
function renderTemplate($name, $data = [])
{
    $result = ''; // Подготавливаем результат

    $name = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $name . '.php'; // Создаем полный путь из $name
    if(!file_exists($name)){
        return $result; // Если такого файла нет, возвращаем результат
    }

    ob_start(); // Начало буфуризации

    extract($data); //создает переменные из массива. ['title' => '123'] = $title = '123'
    require_once $name; // Подключаем шаблон

    $result = ob_get_clean(); // Выводим данные из буфера

    return $result; // Возвращаем результат
}

//функция для форматированного вывода массива

function pr($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}


/**
 *функция добавления параметра в адресную строку
 */
function setPageParam($param, $value){

    $qParam = $_SERVER['QUERY_STRING'];  //получаем строку с параметрамі
    parse_str($qParam, $arr);  //генеріруем массив из этой строки

    if(!empty($param) && !empty($value)){ //еслі переданы параметры

        if(array_key_exists($param, $arr)){  //если есть такой ключ в массиве
            $arr['$param'] = $value;  //меняем значение в полученном массиве

        }else{
            $arr[$param] = $value;
        }

    }

    return http_build_query($arr);

}
