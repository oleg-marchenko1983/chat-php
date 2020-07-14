<?php
/*
3.Создаём отдельный файл delete_friends.php обработчик где добавляем в базу данных выбраного пользователя.
4. Перенаправляем юзера на главную страницу
5. Делаем удаление друзей , создаём страницу delete_friends.php  в котрой будет функционал удаления
*/
include "configs/db.php";
include "configs/settings.php";

if(isset($_GET["user_id"]))
// $sql = "INSERT INTO friends (user_1, user_2) VALUES ('" . $user_id . "' , '" . $_GET["user_id"] . "')";
$sql = "DELETE FROM `friends` WHERE `friends`.`user_1` = '" . $user_id . "' AND `friends`.`user_2` = '" . $_GET["user_id"] . "'";

if(mysqli_query($connect, $sql)) {
    include "modules/friends-list.php";
} else {
    echo "<h2>Ошибка</h2>";
}
