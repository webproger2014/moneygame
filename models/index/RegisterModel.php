<?php

function createAccount($infoUs) {
  $mysqli = createMysqli();
  $sql =  "INSERT INTO user_info(hash, STEAM_ID, PSW, EMAIL, NICK_NAME, payeer,
                                 avatars, dates, datesTime, time)
           VALUES('{$infoUs['hash']}', '{$infoUs['steam']}', '{$infoUs['psw']}',
                   '{$infoUs['email']}', '{$infoUs['nick']}', '{$infoUs['payeer']}',
                     'default.png', CURDATE(), NOW(), CURTIME())";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);   
}
