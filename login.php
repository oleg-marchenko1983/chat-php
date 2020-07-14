<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>Авторизация</title>
</head>

<body>
    <!-- Прописоваем шапку сайта ---->
    <?php
    include "components/header.php"
    ?>
    <?php
    /* План
1. Стилизировать форму авторизации - готово
2. Сделать отправку формы - готово
3. Проверить существует ли такой email - не готово
4. Проверить заполнено поле email и пароль - готово
5. Стравнить авторизацию с базой данных
6. Записать пользователя в cookies
7. Если успешно авторизировался переадресовать на главную страницу
*/
    include "configs/db.php";

    // Выполняем проверку или присутвуют в строке данные запросы
    if (
        isset($_POST["email"]) && isset($_POST["password"])
        && $_POST["email"] != "" && $_POST["password"] != ""
    ) {
        //Обьявляем переменые для читоты кода
        $post_email = $_POST["email"];
        $post_password = $_POST["password"];

        // переменая sql строка которая добавляет введёный email и пароль в таблицу users.
        $sql = " SELECT * FROM `users` WHERE `email` LIKE  '$post_email' AND `password` LIKE '$post_password'  ";
        // Условие проверяет подключение к базе и строку sql запроса  
        $result = mysqli_query($connect, $sql);
        //Записывет в перемную кол-во полей
        $numberUsers = mysqli_num_rows($result);
        var_dump($numberUsers);

        if ($numberUsers == 1) {
            // Записывает в переменую весь наш запрос в виде масива
            $user = mysqli_fetch_assoc($result);
            // Записывает куки , где первый параметр имя , значение, время жизни куки
            setcookie("user_id", $user['id'], time() + 10000);
            // Перенаправляет на другую страницу в нашем случае на главную
            header("Location: /");
        } else {
            echo "<h2>Логин и пароль введены не верно</h2>";
        }
    }
    ?>
    <div class="modal" id="login-modal1">

        <form action="login.php" method="POST" id="form-login">
            <h3>Логин:</h3>
            <input id="login" type="text" name="email">
            <h3>Пароль:</h3>
            <input id="password" type="password" name="password">
            <div>
                <button type="submit" id="login-button">Войти</button>
            </div>
        </form>
        <a href="register.php" id="reg-button">Регистрация</a>
    </div>
</body>

</html>