<?php
require '../common.inc.php';
$data = array("code"=>200,'status'=>500,'message'=>false);
is_mobile($mobile) or exit(json_encode($data));
$result = $db->query("SELECT * FROM `{$DT_PRE}sms` WHERE mobile='$mobile' ORDER BY itemid desc LIMIT 0,10");
$lists = array();
while($r = $db->fetch_array($result)) {
	if($r['code']=='ok' || $r['code']=='OK') $lists[] = $r['message'];
}
if(in_array($captcha,$lists)){
	$data = array("code"=>200,'status'=>200,'message'=>true);
}
exit(json_encode($data));	
?>