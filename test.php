<?php

ob_start(); // Включаем буферизацию

echo 'Hello';

// $str = ob_get_contents(); // Возвращает данные из буфера
// ob_end_clean(); //Очищает буфер

$str = ob_get_clean(); // Возвращает данные из буфера. Очищает буфер




//echo $str;