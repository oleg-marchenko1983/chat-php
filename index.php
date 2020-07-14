<?php
// Подключаем файл с подключением к базе данных
include "configs/db.php";
// Подключем файл с настройками
include "configs/settings.php";
// Проверка если пользователь не аторизирован , редирект на login.php 
if ($user_id == null) {
    header("Location: /login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title><?php echo $title ?></title>
</head>

<body>
    <!-- Прописоваем шапку сайта ---->
    <?php
    include "components/header.php"
    ?>
    <div id="content">
        <div id="users">

            <?php
            /*------ Подключаем файл со списоком контактов---------*/
            include "modules/list-users.php"
            ?>

        </div>
        <div id="message">
            <div id="list-message">
                <?php
                /*------ Подключаем файл со списоком сообщений---------*/
                include "modules/list-messages.php"
                ?>
            </div>
            <?php
            if (isset($_GET["user"])) {
            ?>
                <form id="form" action="http://chat.local/add_messages.php" method="POST">
                    <input type="hidden" name="user_id_ot_kogo" value="<?php echo $user_id ?>">
                    <input type="hidden" name="user_id_komu" value="<?php echo $_GET["user"] ?>">
                    <textarea name="text"></textarea>
                    <button type="submit" name="send_sms"><img src="/img/send.png" alt="send icon"></button>
                </form>
            <?php
            }
            ?>
        </div>
        <!----------------- Модальное окно Контакты --------------->
        <?php
        include "modules/contacts.php"
        ?>
    </div>
    <script src="/js/scripts.js"></script>
</body>

</html>