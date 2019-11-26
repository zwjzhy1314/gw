<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/include/post.func.php';
require DT_ROOT.'/module/'.$module.'/member.class.php';
$data = array("code"=>200,'status'=>500,'message'=>false);
if($MOD['iptimeout']) {
	$timeout = $DT_TIME - $MOD['iptimeout']*3600;
	$r = $db->get_one("SELECT userid FROM {$DT_PRE}member WHERE regip='$DT_IP' AND regtime>'$timeout'");
	if($r) {
		$data = array("code"=>202,'status'=>500,'message'=>$L['register_msg_ip']);
		exit(json_encode($data));
	}
}

$do = new member;
$MOD['checkuser'] = 0;
$CFD = cache_read('fields-company.php');
isset($post_fields) or $post_fields = array();
if($MFD || $CFD) require DT_ROOT.'/include/fields.func.php';
$GROUP = cache_read('group.php');
$post['regid'] = $regid ? intval($regid) : 5;
$post['groupid'] = $post['regid'];
$post['edittime'] = 0;
$post['username'] = !empty($username) ? $username : (is_mobile($mobile)? random(4,'qwertyuiopasdfghjklzxcvbnm').'_'.substr($mobile,-4):'app_'.random(8));
$post['passport'] = $passport;
$post['password'] = $password;
$post['cpassword'] = $cpassword;
$post['truename'] = $truename;
$post['mobile'] = $mobile;
$post['inviter'] = $inviter;
$post['content'] = $post['introduce'] = $post['thumb'] = $post['banner'] = $post['catid'] = $post['catids'] = '';
$post['vmobile'] = 1;
if(isset($company) && !empty($company)) $post['company'] = $company;
$RG = array();
foreach($GROUP as $k=>$v) {
	if($k > 4 && $v['vip'] == 0) $RG[] = $k;
}
if(!in_array($post['regid'], $RG)){	
	$data = array("code"=>203,'status'=>500,'message'=>$L['register_pass_groupid']);
	exit(json_encode($data));
}
			
if($do->add($post)) {
	$userid = $do->userid;
	$username = $post['username'];
	$email = $post['email'];
	$mobile = $post['mobile'];
	if($MFD) fields_update($post_fields, $do->table_member, $userid, 'userid', $MFD);
	if($CFD) fields_update($post_fields, $do->table_company, $userid, 'userid', $CFD);
				
	//send sms
	if($MOD['welcome_sms'] && $DT['sms'] && is_mobile($post['mobile'])) {
		$message = lang('sms->wel_reg', array($post['truename'], $DT['sitename'], $post['username'], $post['password']));
		$message = strip_sms($message);
		send_sms($post['mobile'], $message);
	}
	//send sms
	if($MOD['checkuser'] != 1) {
		if($MOD['welcome_message'] || $MOD['welcome_email']) {
			$title = $L['register_msg_welcome'];
			$content = ob_template('welcome', 'mail');
			if($MOD['welcome_message']) send_message($username, $title, $content);
			if($MOD['welcome_email'] && $DT['mail_type'] != 'close') send_mail($email, $title, $content);
		}
	}	
	$data = array("code"=>200,'status'=>500,'message'=>true,'data'=>array('userid'=>$userid,'username'=>$username));
	exit(json_encode($data));
} else {
	$data = array("code"=>201,'status'=>500,'message'=>false);
	exit(json_encode($data));	
}
?>