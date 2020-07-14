
<?php

// Подключаем файл где прописано подключение к базе данных

include "configs/db.php";

// Выполняем проверку или присутвуют в запросе  данные строки )
if (
    isset($_POST["user_id_komu"]) && isset($_POST["user_id_ot_kogo"])
    && isset($_POST["text"])
) {

    // переменая SQL строка которая добавляет текст в таблицу messages введеный в textarea.
    $sql = "INSERT INTO messages ( `user_id_komu`, `user_id_ot_kogo`, `text` ) VALUES 
(' " . $_POST["user_id_komu"] . " ', ' " . $_POST["user_id_ot_kogo"] . " ',' " . $_POST["text"] . " ')";
    // Условие проверяет подключение к базе и строку sql запроса        
    mysqli_query($connect, $sql);
}
// Присваиваем в переменую запрос 
$otpravleno_polzovatel_id = $_POST["user_id_komu"];
// Присваиваем в переменую запрос 
$user_id = $_POST["user_id_ot_kogo"];
// Подключаем функционал показать сообщения
include "modules/list-messages.php";

?>