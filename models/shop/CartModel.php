<?php

    function getProductById($id) {
       $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
       $sql = "SELECT * FROM products WHERE `id`='{$id}'";
       $rs = mysqli_query($mysqli, $sql);
   
       return createSmartyRsArray($rs);    
    }