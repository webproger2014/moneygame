<?php
   //Проверка, вошёл ли пользователь в аккаунт
function infoAccountAction($smarty, $function) {
   //Загружаем страницу
    $function($smarty); 
}
 
   //Не виноват я не в чём
    function getAccountAction() {
       // global $payeer;
        
      //  $purse = isset($_POST['payeer']) ? trim($POST['payeer']) : null;
        $data['messages'] = 'охуеть';
     /*   if ($purse) {
            if ($payeer -> isAuth()) {
                if($payeer -> checkUser(['user' => $purse])) {
                    $data['messages']  = $purse;
                    $data['success'] = 1;
            } else {
                    $data['success'] = 0;
            }
        } else {
            $data['messages'] = $payeer -> getErrors();
          }
        }*/
        
        echo json_encode($data);
    }