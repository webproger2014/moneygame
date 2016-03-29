<?php


		//Возвращает объект mysqli - подключает к бд
    function createMysqli($host = 'localhost', $login = 'webproger2014', $psw = '199417788f99F', $bd = 'cs') {
        $mysqli = mysqli_connect($host, $login, $psw, $bd);
        if (!$mysqli) {
            exit('Ошибка mysqli ');
        }

        mysqli_set_charset($mysqli, 'utf8');

        if (!mysqli_select_db($mysqli, $bd)) {
            exit("Ошибка доступка бд {$bd}");
        }
        
        return $mysqli;
    }
?>