<?php

function getStatisticsPlayers() {
   $mysqli = createMysqli('localhost', 'stats', 'Omw2565Moe1029sgeF2!', 'hlstats');
   $sql =  "SELECT * FROM hlstats_livestats";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsAllArr($rs);
}