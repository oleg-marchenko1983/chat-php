<div id="header">
            <a href="index.php">
            <div id="logo">
                <img src="/img/minions.png" alt="logo"> <span>Our Chat</span>
            </div></a>

            <div id="menu">
                <a href="/">Главная</a>
                <a href="#" id="open-contacts">Контакты</a>
                <a href="#">Настройки</a>
            <?php
                if(isset($_COOKIE['user_id'])) {
                  $sql = "SELECT * FROM users WHERE id=" . $_COOKIE['user_id'];
                  $result = mysqli_query($connect, $sql);
                  $user = mysqli_fetch_assoc($result);
                  
            ?>
                <a href="exit.php" id="open-login-exit"><?php echo $user["name"]?></a>
            <?php
                }else {
            ?>    
                <a href="login.php" id="open-login">Войти</a>
            <?php   
                }
            ?>
            </div>
</div>
    
            