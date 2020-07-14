<?php 
//Подключение к базе данных - данные
$server = "localhost";
$username = "root";
$password = "";
$dbname = "chat";
// Подключаем базу даных вводим данные которые сверху
$connect = mysqli_connect($server, $username, $password, $dbname);
//функция подключает кодировку "utf8" к выводу нашей базы данных (для кирилицы) 
mysqli_set_charset( $connect, "utf8" );

// $sql = "SELECT * FROM users";// Прописал запрос SQL из phpAdmin для получения списка всех пользователей.
?>
<?php 
