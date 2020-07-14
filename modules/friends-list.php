<?php
$sql = "SELECT * FROM users WHERE id !=" . $user_id;
$result = mysqli_query($connect,$sql);

$numberUsers = mysqli_num_rows($result);

                     $i = 0;
                     while($i < $numberUsers) {
                         $user = mysqli_fetch_assoc($result);
                    ?>
                    <li>
                     <div class="avatar">
                        <img src="/img/user.png">
                     </div>
                     <h2><?php echo $user["name"]?></h2>
                     <?php

                     $sql = "SELECT * FROM friends WHERE user_1 = " . $user["id"] . " AND user_2=" . $user_id . "
                     OR user_1 =" . $user_id . " AND user_2 = " . $user["id"];

                     $friendsResult = (mysqli_query($connect, $sql));

                     $numberFriends = mysqli_num_rows($friendsResult);

                     if($numberFriends > 0) {
                         ?>
                        <div data-link="http://chat.local/delete_friends.php?user_id=<?php echo $user["id"]?>" onclick="addAjaxResponse(this)"> Удалить из друзей -</div>
                        <?php
                     } else {
                         ?>
                        <div data-link = "http://chat.local/add_friends.php?user_id=<?php echo $user["id"]?>" onclick="addAjaxResponse(this)"> Добавить в друзья +</div>
                        <?php
                     }
                     ?>

                    </li>
<?php




                        $i = $i + 1;
                     }
                    ?>