<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>Регистрация</title>
</head>

<body>
    <?php
    include "components/header.php"
    ?>
    <?php
    /* План
1. Стилизировать форму регистрации - готово
2. Сделать отправку формы - готово
3. Проверить существует ли такой email - не готово
3. Проверить заполнено поле email и пароль - готово
5. Добавить пользователя в базу данных - готово
6. Добавить подтверждение пароля - не готово
7. После успешной регистрации переадресовыать на логин
*/
    include "configs/db.php";

    // Выполняем проверку или присутвуют в строке данные запросы
    if (
        isset($_POST["email"]) && isset($_POST["password"])
        && $_POST["email"] != "" && $_POST["password"] != ""
    ) {
        // переменая sql строка которая добавляет введёный email и пароль в таблицу users.
        $sql = "INSERT INTO users ( email, password, name ) VALUES ('" . $_POST["email"] . "' ,  '" . $_POST["password"] . "', '" . $_POST["name"] . "')";
        // Условие проверяет подключение к базе и строку sql запроса  
        if (mysqli_query($connect, $sql)) {
            echo "<h2>Пользователь добавлен</h2>";
            // Перенаправляет на другую страницу в нашем случае на логин
            header("Location: /login.php");
        } else {
            echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
        }
    }
    ?>
    <div class="modal" id="reg-modal1">

        <form action="register.php" method="POST" id="form-reg">
            <h3>Ваше имя:</h3>
            <input id="email" type="text" name="name" placeholder="Введите Ваше Имя">
            <h3>Ваша почта:</h3>
            <input id="email" type="e-mail" name="email" placeholder="Введите Вашу почту">
            <h3>Введите Ваш пароль:</h3>
            <input id="password-reg" type="password" name="password" placeholder="Введите Ваш пароль">

            <div>
                <button type="submit" id="reg-button-submit">Регистрация</button>
            </div>
        </form>
    </div>
    </div>


</body>

</html>