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
        $arr[$param] = $value;  //меняем значение в полученном массиве
        
    }
        return http_build_query($arr);
    
}

function getWeekDay(){

}

/**
 * функция для подготовленного запроса
 * @param $link
 * @param $query
 * @param array $param
 * @return false|mysqli_result
 */
function getStmtResult($link, $query, $param = [])
{

    if(!empty($param)){ //если есть массив с параметрами
        $stmt = mysqli_prepare($link, $query); //подготавливает запрос, возвращает указатель
        $type = '';  //подготавливаем аргумент с типами на основе типов в параметрах
        foreach ($param as $item){  //заполнение type
            if(is_int($item)){
                $type .= 'i'; //присоединяем к  концу строки i
            }elseif (is_string($item)){
                $type .= 's';
            }elseif (is_double($item)){
                $type .= 'd';
            }else{
                $type .= 's';
            }
        }

        $values = array_merge([$stmt, $type], $param); //получение единого массива параметров для передачи в функцию mysqli_stmt_bind_param

        $func = 'mysqli_stmt_bind_param';
        $func(...$values); //... указывает, что у функции переменное кол-во аргументов

        mysqli_stmt_execute($stmt); //выполняет подготовленный запрос

        $result = mysqli_stmt_get_result($stmt); //получает результат запроса

        return $result;

    }else{
        $result = mysqli_query($link, $query);
        return $result;
    }

}
