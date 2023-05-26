<?php
session_start();
require_once('vendor\facebook\graph-sdk\src\Facebook\autoload.php');

$FBObject = new \Facebook\Facebook([
	'app_id' => '166952356305059',
	'app_secret' => '1dee58f6b87085415ef40ab2f23b3b66',
	'default_graph_version' => 'v2.10'
]);

$handler = $FBObject -> getRedirectLoginHelper();
?>