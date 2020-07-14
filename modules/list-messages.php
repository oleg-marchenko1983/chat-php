<?php
/*
1. Сделать фунционал чтобы при клике на пользователя 
выбиралась его перписка с текущим пользователем - готово
2. Сделать фунционал, чтобы сообщения отправлялись от текущего , выбраному пользователю
и записывались в базу данных. - готово
3. Сделать скрол когда сообщения дошли до формы отпракви - готово
4. Сделать чтобы сообщения появлялись сразу в чате без обновления страницы - готово
*/  
?>

<!-- Список сообщений окно справа-->
<ul>

    <?php

// Проверяем или есть в запросе эти данные
    if (isset($_GET["user"]) || isset($otpravleno_polzovatel_id)) {
    // обьявляем переменую user 
        $user = null;
// Условие если присутсвует запрос в строке браузера , тогда записіваем его в user
        if (isset($_GET["user"])) {
            $user = $_GET["user"];
        } else {
            $user = $otpravleno_polzovatel_id;
        }

        // SQL строка выбирает с базы данных все поля которые созданы в messages с user_id_komu и user_id_ot_kogo
        $sql = "SELECT * FROM messages" . " WHERE (user_id_komu = " . $user .
            " AND user_id_ot_kogo = " . $user_id . " ) " .
            "OR (user_id_komu = " . $user_id .
            " AND user_id_ot_kogo = " . $user . " ) "; // ИЛИ наоборот
        // Выполнить sql запрос в базе данных

        $result = mysqli_query($connect, $sql);

        //Функция разрешает получить кол-во результатов строк
        $numberMessages = mysqli_num_rows($result);
        $i = 0;
        // Цикл выполняеться пока кол-во счётчика не будет больше кол-во сообщений в бд
        while ($i < $numberMessages) {
            //Возвращает наш запрос в виде масива
            $message = mysqli_fetch_assoc($result);
    ?>
            <li>
                <div class="avatar"><img src="/img/user.png" alt="icon user">
                </div>
                <?php

                // Выбираем строку чтобы показывалось имя пользователя от кого сообщение
                $sql = "SELECT name FROM users WHERE id=" . $message["user_id_ot_kogo"];
                //Выполняем запрос 
                $user = mysqli_query($connect, $sql);
                // Записываем в перемную масив с данными пользователя
                $user = mysqli_fetch_assoc($user);
                ?>
                <h2><?php echo $user["name"] ?></h2>
                <p><?php echo $message["text"] ?></p>
                <div class="time"><?php echo $message["time"] ?></div>
            </li>
    <?php
            // Увеличивает счётик на один при каждой итерации цикла
            $i = $i + 1;
        }
    } else {
        echo "<h2>Пользователь не выбран</h2>";
    }
    ?>
</ul>