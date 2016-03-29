<?php
    
    /**
     * 
     * @param string $steam приходит steam_id
     * @return array
     */
    function getSteam($steam) {
        $mysqli = createMysqli();
        
        $sql = "SELECT `id` FROM user_info WHERE `STEAM_ID`='{$steam}'";
        
        $rs = mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);
        
        return createSmartyRsArray($rs);
    }

    
    function getAccount($steam, $psw) {
        $mysqli = createMysqli();
        
        $sql = "SELECT `id` FROM user_info WHERE `STEAM_ID`='{$steam}' AND `psw`='{$psw}'";
        
        $rs = mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);
        
        return createSmartyRsArray($rs);
    }

   function getEmail($email) {
        $mysqli = createMysqli();
        
        $sql = "SELECT `id` FROM user_info WHERE `email`='{$email}'";
        
        $rs = mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);
        
        return createSmartyRsArray($rs);      
   }
   
   function getNick($nick) {
        $mysqli = createMysqli();
        
        $sql = "SELECT `id` FROM user_info WHERE `NICK_NAME`='{$nick}'";
        
        $rs = mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);
        
        return createSmartyRsArray($rs);      
   }
   
  function setHash($steam, $hash) {
        $mysqli = createMysqli();
        
        $sql = "UPDATE  user_info SET hash='{$hash}' WHERE `STEAM_ID`='{$steam}'";
        mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);         
  }
  
  //> Модель для работы с formsadmcontroller
    function getEmailAdm($email) {
        $mysqli = createMysqli();
        
        $sql = "SELECT `id` FROM admin_info WHERE `email`='{$email}'";
        $rs = mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);
        
        return createSmartyRsArray($rs);    
  }
  
     function getAccountAdm($email, $psw) {
        $mysqli = createMysqli();
        
        $sql = "SELECT `id` FROM admin_info WHERE `email`='{$email}' 
                AND `psw`='{$psw}'";
        $rs = mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);
        
        return createSmartyRsArray($rs);    
  }
  
    function setHashAdm($email, $hash) {
        $mysqli = createMysqli();
        
        $sql = "UPDATE  admin_info SET hash='{$hash}' WHERE `email`='{$email}'";
        mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);         
  }
  //<