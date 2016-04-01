<?php
//require_once('cpayeer.php');
$accountNumber = $purse;
$apiId = '85939359';
$apiKey = '199417788f99F199417788f99F';
$payeer = new CPayeer($accountNumber, $apiId, $apiKey);
if ($payeer->isAuth()) {
    if($payeer->checkUser(array(
	'user' => $purse,
     ))) {
	return $purse;
     } else {
	return null;
    }
} else {
	echo '<pre>'.print_r($payeer->getErrors(), true).'</pre>';
}
