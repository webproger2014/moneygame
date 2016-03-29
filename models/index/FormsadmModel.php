<?php

 
 function getInfoUser($hash) {
   $mysqli = createMysqli();
   $sql =  "SELECT * FROM admin_info WHERE hash='{$hash}'";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsArray($rs);
}

