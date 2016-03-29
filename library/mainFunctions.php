<?php

  /**
  * 
  * @param type $smarty
  * @param string $controllerName Имя контроллера
  * @param string $actionName Имя функции которую будем вызывать
  */
  function loadPage($smarty, $controllerName = 'Index', $actionName = 'IndexAction', $serviceName = null){
        //Инициализируем контролер
        $controller = PathPrefix.$controllerName.PathPostFix;
      
        if (!file_exists($controller)) {
            $controller = PathPrefix.'Index'.PathPostFix;
        }
        //Подключаем контроллер
        include $controller;
        
        //Проверка функции
        if (!function_exists($actionName)) {
            $actionName = 'indexAction';
        }
        
        //Проверяем зашёл ли user in account
        infoAccountAction($smarty, $actionName);
    }
    
  function loadTemplate($smarty, $templateName) {
        $smarty -> display($templateName.TemplatePostFix);
    }
    
  function createSmartyRsArray($rs) {
      if (!$rs) return false;
      
      $smartyRs = [];
      while ($row = mysqli_fetch_assoc($rs)) {
          $smartyRs = $row;
      }
      
      return $smartyRs;
  }
  
  function createSmartyRsAllArr($rs) {
     if (!$rs) return false; 
     
     $smartyRs = [];
     while ($row = mysqli_fetch_assoc($rs)) {
         $smartyRs[] = $row;
     }
     
     return $smartyRs;
  }
  
  /**
   * 
   * @param string $steam приходит steam_id
   */
  function validSteam($steam) {
    if (preg_match('/^STEAM_[0-1]:[0-1]:[0-9]{2,12}$/', $steam)) {
        return $steam;
     } else {
        return null;                   
    }      
  }
  
  function validDate($date) {
    if (preg_match('/^[\d]{4,4}-[\d][\d]-[\d][\d] [\d][\d]:[\d][\d]:[\d][\d]$/', $date)) {
        return $date;
     } else {
        return null;                   
    }      
  }  
  
  function filterEmail($email) {
    if (preg_match('/^[A-Z|a-z0-9]{2,20}@[a-z\d]{2,10}\.[a-z\d]{2,10}$/', $email)) {
	return true;
    } else {
	return false;               
    }
  }
  
  function filterNick($nick) {
	if (preg_match_all('/^[a-z0-9][-_a-z0-9]{4,30}$/i', $nick)) {
            return true;
	} else {
            return false;
	}	      
   }
    
  function generateHash($hash = 20) {
	$str = '1234567890qwertyuiopasdfghjklzxcvbnm';
	$result = '';
	for ($s = 0; $s < $hash; $s++) {
            $result .= $str[mt_rand(1, $hash)];		  
	}
		
	return $result;
    }   
  
  //Возвращаем hash пользователя
  function getHashUser() {
    if (isset($_COOKIE['userhash'])) {
        return (string)$_COOKIE['userhash'];
    } else {
        return null;
    }
}

  function getHashAdmin() {
    if (isset($_COOKIE['adminhash'])) {
        return (string)$_COOKIE['adminhash'];
    } else {
        return null;
    }
}


function filterImages($data) {
    //Проверяем существование файла
      if (!isset($_FILES['file']) || empty($_FILES['file'])) {
          $data['success'] = 0;
          $data['messages'] = 'Файл не пришёл';
      }
      
    //Проверяем формат файла
     if (!isset($data['success'])) {
         $type = $_FILES['file']['type'][0]; 
         if ($type === 'image/png' || $type === 'image/jpeg') {
             $data['messages'] = '';
        } else {
             $data['success']  = 0;
             $data['messages'] = 'Разрешён формат jpg,png';
        }
     }
     
    //Проверям размер файла
     if (!isset($data['success'])) {
         $size = $_FILES['file']['size'][0];
         if ($size > 2097152) {
            $data['success']  = 0;
            $data['messages'] = 'Размер файла не больше 2мб';        
         }
     }    
     
    //размер изображения в px
    if (!isset($data['success'])) {
        $nameFile = $_FILES['file']['tmp_name'][0];
        list($width, $height) = getimagesize($nameFile);
        if ($width < 150 && $height < 150) {
            $data['success']  = 0;
            $data['messages'] = 'Размер изображения не менее 150x150';            
        }   
    }
    return $data;
}

function truncateImages(){
    $images = [];
    list($images['width'], $images['height']) = getimagesize($_FILES['file']['tmp_name'][0]);
    //Определяем тип
    if ($_FILES['file']['type'][0] === 'image/png') {
       $images['image'] = imagecreatefrompng($_FILES['file']['tmp_name'][0]); 
    }
    
    if ($_FILES['file']['type'][0] === 'image/jpeg') {
        $images['image'] = imagecreatefromjpeg($_FILES['file']['tmp_name'][0]);
    }
    $images['proportion'] = $images['height'] / $images['width'] * 150; //Пропорции изображения
    $images['img'] = imageCreateTrueColor(150, $images['proportion']);
   
    return $images;
}

function saveImages($images) {
    imagecopyresampled($images['img'], $images['image'], 0, 0, 0, 0, 150, $images['proportion'], $images['width'], $images['height']);
    imagejpeg($images['img'], "www/images/avatars/".$images['name'], 100);
    imagedestroy($images['img']);
    imagedestroy($images['image']);  
}

function sendMail($email, $subject, $messages) {
    mail($email, $subject, $messages, "Content-type: text/html; charset=utf8' . '\r\n'");
}