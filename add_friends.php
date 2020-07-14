
<?php
/*
1.Создаём таблицу friends в которую будем записывать друзей
2.Создаём отдельный файл contacts.php где будет модальное окно контактов
3.Создаём отдельный файл add_friends.php обработчик где добавляем в базу данных выбраного пользователя.
4. Перенаправляем юзера на главную страницу .
*/
include "configs/db.php";
include "configs/settings.php";

if (isset($_GET["user_id"]))
    $sql = "INSERT INTO friends (user_1, user_2) VALUES ('" . $user_id . "' , '" . $_GET["user_id"] . "')";
if (mysqli_query($connect, $sql)) {
    include "modules/friends-list.php";
} else {
    echo "<h2>Ошибка</h2>";
}

?>
