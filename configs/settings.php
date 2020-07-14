<?php
// Название сайта
$title = "Наш Чат";
// Проверяем и записываем в переменую id зарегистрированого пользователя
$user_id = null;
if(isset($_COOKIE['user_id']))
$user_id = $_COOKIE["user_id"];

?>
