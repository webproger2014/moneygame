<?php

function getInfoUser($hash) {
   $mysqli = createMysqli();
   $sql =  "SELECT * FROM user_info WHERE hash='{$hash}'";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsArray($rs);
}


function getInfoPlayer($steam) {
   $mysqli = createMysqli('localhost', 'stats', 'Omw2565Moe1029sgeF2!', 'hlstats');
   $sql =  "SELECT * FROM hlstats_livestats WHERE steam_id='{$steam}'";
   
   $rs = mysqli_query($mysqli, $sql);
   mysqli_close($mysqli);
   
   return createSmartyRsArray($rs);    
}

function getSteams($steam) {
    $mysqli = createMysqli();
        
    $sql = "SELECT `id` FROM user_info WHERE `STEAM_ID`='{$steam}'";
        
    $rs = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);
        
    return createSmartyRsArray($rs);
}


function setSteam($steam, $infoUser) {
    $mysqli = createMysqli();
        
    $sql = "UPDATE user_info SET `STEAM_ID`='{$steam}' 
            WHERE `hash`='{$infoUser['hash']}'";
        
    $rs = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);   
}

function getEmails($email) {
    $mysqli = createMysqli();
        
    $sql = "SELECT `id` FROM user_info WHERE `email`='{$email}'";
        
    $rs = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);
        
    return createSmartyRsArray($rs);  
}

function setEmails($email, $infoUser) {
    $mysqli = createMysqli();
        
    $sql = "UPDATE user_info SET `email`='{$email}' 
            WHERE `hash`='{$infoUser['hash']}'";
        
    $rs = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);   
}

function setPassword($psw, $infoUser) {
    $mysqli = createMysqli();
        
    $sql = "UPDATE user_info SET `PSW`='{$psw}' 
            WHERE `hash`='{$infoUser['hash']}'";
        
   $rs = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);   
}

function getNickName($nick) {
    $mysqli = createMysqli();
        
    $sql = "SELECT `id` FROM user_info WHERE `NICK_NAME`='{$nick}'";
        
    $rs = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);
        
    return createSmartyRsArray($rs);  
}

function setNickName($nick, $infoUser) {
    $mysqli = createMysqli();
        
    $sql = "UPDATE user_info SET `NICK_NAME`='{$nick}' 
            WHERE `hash`='{$infoUser['hash']}'";
        
    $rs = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);   
}

function setAvatars($nameFile, $infoUser) {
    $mysqli = createMysqli();
        
    $sql = "UPDATE user_info SET `avatars`='{$nameFile}' 
            WHERE `hash`='{$infoUser['hash']}'";
        
    $rs = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);    
}

function delUser($infoUser) {
    $mysqli = createMysqli();
        
    $sql = "DELETE FROM user_info  
            WHERE `hash`='{$infoUser['hash']}'";
        
    $rs = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);    
}


