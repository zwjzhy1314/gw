<?php
require '../common.inc.php';
$data = array("code"=>200,'status'=>500,'message'=>false);
$flag = checkcaptcha($captcha, 1, true);
if(!$flag)
	$data = array("code"=>200,'status'=>200,'message'=>true);
else
	$data = array("code"=>200,'status'=>500,'message'=>$flag);
exit(json_encode($data));	
?>