<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/include/post.func.php';
require DT_ROOT.'/module/'.$module.'/member.class.php';
$data = array("code"=>208,'status'=>200,'message'=>false);

$do = new member;
$LOCK = cache_read($DT_IP.'.php', 'ban');
if($LOCK && $DT_TIME - $LOCK['time'] < 3600 && $LOCK['times'] >= 2) $MOD['captcha_login'] = 1;

captcha($captcha, $MOD['captcha_login']);
$username = trim($username);
$password = trim($password);
$mobile = trim($mobile);
if(!$mobile){
	if(strlen($username) < 3) {
		$data = array("code"=>203,'status'=>200,'message'=>$L['login_msg_username']);
		exit(json_encode($data));
	}
	if(strlen($password) < 5){
		$data = array("code"=>204,'status'=>200,'message'=>$L['login_msg_password']);
		exit(json_encode($data));
	}
}
$option = 'username';
if(is_email($username)) {
	$option = 'email';
} else if(is_mobile($username)) {
	$option = 'mobile';
} else if(!check_name($username)) {
	$option = 'passport';
}
in_array($option, array('username', 'passport', 'email', 'mobile', 'company', 'userid')) or $option = 'username';
$r = $db->get_one("SELECT username,passport FROM {$DT_PRE}member WHERE `$option`='$username'");
if($r) {
	$username = $r['username'];
	$passport = $r['passport'];
} else {
	if($option == 'username' || $option == 'passport') {
		$passport = $username;
		if($option == 'username' && $MOD['passport']) {
			$r = $db->get_one("SELECT username FROM {$DT_PRE}member WHERE `passport`='$username'");
			if($r) $username = $r['username'];
		}
	} else {
		$data = array("code"=>201,'status'=>200,'message'=>$L['login_msg_not_member']);
		exit(json_encode($data));
	}
}
if($password){
	$user = $do->login($username, $password);
	if($user) {
		if($MOD['passport'] && $MOD['passport'] != 'uc') {
			$user['password'] = is_md5($password) ? $password : md5($password);
			if(strtoupper($MOD['passport_charset']) != DT_CHARSET) $user = convert($user, DT_CHARSET, $MOD['passport_charset']);
			include DT_ROOT.'/api/'.$MOD['passport'].'.inc.php';
		}
		if($DT['login_log'] == 2) $do->login_log($username, $password, $user['passsalt'], 0);
		unset($user['password'],$user['passsalt'],$user['payword'],$user['paysalt'],$user['sound'],$user['online'],$user['address'],$user['postcode'],$user['skin'],$user['regunit'],$user['vtrade'],$user['note'],$user['bank'],$user['black']);
		unset($user['avatar'],$user['ali'],$user['skype'],$user['admin'],$user['vemail'],$user['vmobile'],$user['homepage'],$user['fromtime'],$user['domain'],$user['size'],$user['trade'],$user['banktype'],$user['branch'],$user['mode']);
		unset($user['vtruename'],$user['vbank'],$user['vcompany'],$user['validated'],$user['validator'],$user['validtime'],$user['totime'],$user['styletime'],$user['icp'],$user['regyear'],$user['support'],$user['account'],$user['gzhqr']);
		unset($user['vipt'],$user['vipr'],$user['type'],$user['fax'],$user['gzh'],$user['introduce'],$user['hits'],$user['comments'],$user['template'],$user['capital'],$user['regcity'],$user['reply']);
		$data = array("code"=>200,'status'=>200,'message'=>true,'data'=>$user);
		exit(json_encode($data));
	} else {
		$data = array("code"=>202,'status'=>200,'message'=>false);
		exit(json_encode($data));	
	}
}
if($captcha){
	$result = $db->query("SELECT * FROM `{$DT_PRE}sms` WHERE mobile='$mobile' ORDER BY itemid desc LIMIT 0,10");
	$lists = array();
	while($r = $db->fetch_array($result)) {
		if($r['code']=='ok' || $r['code']=='OK') $lists[] = $r['message'];
	}
	if(in_array($captcha,$lists)){
		$user = $db->get_one("SELECT * FROM {$DT_PRE}member WHERE mobile='$mobile'");		
		if($user) {
			unset($user['password'],$user['passsalt'],$user['payword'],$user['paysalt'],$user['sound'],$user['online'],$user['address'],$user['postcode'],$user['skin'],$user['regunit'],$user['vtrade'],$user['note'],$user['bank'],$user['black']);
			unset($user['avatar'],$user['ali'],$user['skype'],$user['admin'],$user['vemail'],$user['vmobile'],$user['homepage'],$user['fromtime'],$user['domain'],$user['size'],$user['trade'],$user['banktype'],$user['branch'],$user['mode']);
			unset($user['vtruename'],$user['vbank'],$user['vcompany'],$user['validated'],$user['validator'],$user['validtime'],$user['totime'],$user['styletime'],$user['icp'],$user['regyear'],$user['support'],$user['account'],$user['gzhqr']);
			unset($user['vipt'],$user['vipr'],$user['type'],$user['fax'],$user['gzh'],$user['introduce'],$user['hits'],$user['comments'],$user['template'],$user['capital'],$user['regcity'],$user['reply']);
			$data = array("code"=>200,'status'=>200,'message'=>true,'data'=>$user);	
			exit(json_encode($data));
		} else {
			$data = array("code"=>202,'status'=>200,'message'=>false);
			exit(json_encode($data));	
		}		
	}else{
		$data = array("code"=>209,'status'=>200,'message'=>false);
		exit(json_encode($data));
	}
}
exit(json_encode($data));
?>