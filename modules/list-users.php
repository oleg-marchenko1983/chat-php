<?php
if (isset($_GET["search-user"])) {
  // SQL строка выбирает с базы данных все поля которые совпадают с тем что ввели или частично ввели в поиск 
  $sql = "SELECT * FROM `users` WHERE `name` LIKE '%"  . $_GET["search-user"] .  "%' ";
  // Выполнить sql запрос в базе данных(проверяем подключение и правильность написания строки)
  $result = mysqli_query($connect, $sql);
  //Функция разрешает получить кол-во результатов строк
  $numberUsers = mysqli_num_rows($result);
?>
<!---- форма поиска пользователей---->
  <form action="index.php" method="GET" id="search">
    <input type="text" name="search-user" value="<?php echo $_GET["search-user"] ?>">
    <button>
      <img src="/img/icon-search.png" alt="icon search">
    </button>
  </form>
  <!--Список контактов слева-->
  <div id="list-users">
    <ul>
      <?php
      // Счётчик кол-во пользователей
      $i = 0;
      // Цикл перебирает имена с масива и сравнивает с кол-во пользавателей в базе
      while ($i < $numberUsers) {
        //Возвращает наш запрос в виде масива и записывает в переменную
        $user = mysqli_fetch_assoc($result);
        if ($user_id != $user["id"]) {
      ?>
          <!--Структура списка контактов имена беруться с базы данных-->
          <li>
            <a href="/index.php?user=<?php echo $user["id"]; ?>">
              <div class="avatar">
                <img src='<?php echo $user["photo"]; ?>'>
              </div>
              <h2><?php echo $user["name"]; ?></h2>
              <span><?php echo $user["phone"]; ?></span>
              <span><?php echo $user["email"]; ?></span>
            </a>
          </li>
      <?php
        }
        $i = $i + 1;
      }
    } else {
      // SQL строка выбирает с базы данных все поля которые созданы в users
      $sql = "SELECT * FROM `users` ";
      // Выполнить sql запрос в базе данных(проверяем подключение и правильность написания строки)
      $result = mysqli_query($connect, $sql);
      //Функция разрешает получить кол-во результатов строк
      $numberUsers = mysqli_num_rows($result);
      // var_dump($numberUsers)
      ?>
      <form action="index.php" method="GET" id="search">
        <input type="text" name="search-user">
        <button>
          <img src="/img/icon-search.png" alt="icon search">
        </button>

      </form>
      <!--Список контактов слева-->
      <div id="list-users">
        <ul>
          <?php
          // Счётчик кол-во пользователей
          $i = 0;
          // Цикл перебирает имена с масива и сравнивает с кол-во пользавателей в базе
          while ($i < $numberUsers) {
            //Возвращает наш запрос в виде масива и записывает в переменную
            $user = mysqli_fetch_assoc($result);
            if ($user_id != $user["id"]) {
          ?>
              <!--Структура списка контактов имена беруться с базы данных-->
              <li>
                <a href="/index.php?user=<?php echo $user["id"]; ?>">
                  <div class="avatar">
                    <img src='<?php echo $user["photo"]; ?>'>
                  </div>
                  <h2><?php echo $user["name"]; ?></h2>
                  <span><?php echo $user["phone"]; ?></span>
                  <span><?php echo $user["email"]; ?></span>
                </a>
              </li>
        <?php
            }
            $i = $i + 1;
          }
        }
        ?>
        </ul>
      </div>