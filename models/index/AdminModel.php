<?php

 function getInfAccountUser($steam) {
   $mysqli = createMysqli();
   $sql =  "SELECT * FROM user_info WHERE `STEAM_ID`='{$steam}'";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsArray($rs);     
 }
 
 function unbannedUser($steam) {
    $mysqli = createMysqli();
        
    $sql = "UPDATE user_info SET `ban`=0,
           `startBanDateTime`='0000-00-00 00:00:00',
           `exitBanDateTime`='0000-00-00 00:00:00',
           `causeBan`=''
            WHERE `STEAM_ID`='{$steam}'";
        
    mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);     
 }
 
 function bannedUser($steam, $cause, $date) {
    $mysqli = createMysqli();
        
    $sql = "UPDATE user_info SET `ban`=1,
           `startBanDateTime`=NOW(),
           `exitBanDateTime`='{$date}',
           `causeBan`='{$cause}'
            WHERE `STEAM_ID`='{$steam}'";
        
    mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);      
 }
 
 //< Админ БД
 function getInfoUser($hash) {
   $mysqli = createMysqli();
   $sql =  "SELECT * FROM admin_info WHERE hash='{$hash}'";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsArray($rs);
}

function setAvatars($nameFile, $infoUser) {
    $mysqli = createMysqli();
        
    $sql = "UPDATE admin_info SET `avatars`='{$nameFile}' 
            WHERE `hash`='{$infoUser['hash']}'";
        
    mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);    
}

//Вернём список администраторов
function getListAdm() {
   $mysqli = createMysqli();
   $sql =  "SELECT * FROM admin_info WHERE `levels`=1";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsAllArr($rs);    
}

//Вернём список модераторв
function getListMod() {
   $mysqli = createMysqli();
   $sql =  "SELECT * FROM admin_info WHERE `levels`=2";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsAllArr($rs);    
}

function getEmailAdm($email) {
   $mysqli = createMysqli();
   $sql =  "SELECT id FROM admin_info WHERE `email`='{$email}'";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsArray($rs);    
}

function setAccount($email, $psw, $levels, $author) {
   $mysqli = createMysqli();
   $sql =  "INSERT INTO admin_info(email, psw, levels, 
                        dateReg, avatars, whoAccCreat)
            VALUES('{$email}', '{$psw}', '{$levels}',
                     NOW(), 'default.png', '{$author}')";
 
   mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);    
}

function getInfoAccount($email) {
   $mysqli = createMysqli();
   $sql =  "SELECT * FROM admin_info WHERE `email`='{$email}'";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsAllArr($rs);    
}

function delAccount($id) {
   $mysqli = createMysqli();
   $sql =  "DELETE FROM admin_info WHERE `id`='{$id}'";
   
   mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);    
}

function setRunkAdm($id) {
   $mysqli = createMysqli();
   $sql = "UPDATE admin_info SET `levels`='1' 
            WHERE `id`='{$id}'";
   
   mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);    
}

function setRunkMod($id) {
   $mysqli = createMysqli();
   $sql = "UPDATE admin_info SET `levels`='2' 
            WHERE `id`='{$id}'";
   
   mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);    
}

function setEmail($email, $infoUser) {
   $mysqli = createMysqli();
   $sql = "UPDATE admin_info SET `email`='{$email}' 
            WHERE `hash`='{$infoUser['hash']}'";
   
   mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);    
}

function setPsw($psw, $infoUser) {
   $mysqli = createMysqli();
   $sql = "UPDATE admin_info SET `psw`='{$psw}' 
            WHERE `hash`='{$infoUser['hash']}'";
   
   mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);    
}
//<
