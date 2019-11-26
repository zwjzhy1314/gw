<?php 
defined('IN_DESTOON') or exit('Access Denied');
$moduleid = isset($moduleid) ? intval($moduleid) : 10;
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/include/post.func.php';
$post = isset($post) ? $post : array();
$data = array("code"=>206,'status'=>500,'message'=>false);
$mod_limit = intval($MOD['limit_'.$_groupid]);
$mod_free_limit = intval($MOD['free_limit_'.$_groupid]);
$data = array("code"=>201,'status'=>200,'message'=>'mod_limit');
//$mod_limit > -1 or exit(json_encode($data));
require DT_ROOT.'/module/'.$module.'/'.$module.'.class.php';
$do = new $module($moduleid);
if(in_array($action, array('add', 'edit'))) {
	$FD = cache_read('fields-'.substr($table, strlen($DT_PRE)).'.php');
	if($FD) require DT_ROOT.'/include/fields.func.php';
	isset($post_fields) or $post_fields = array();
}
$sql = $_userid ? "username='$_username'" : "ip='$DT_IP'";
$limit_used = $limit_free = $need_password = $need_captcha = $need_question = $fee_add = 0;
/*
if(in_array($action, array('', 'add'))) {
	$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $sql AND status>1");
	$limit_used = $r['num'];
	$limit_free = $mod_limit > $limit_used ? $mod_limit - $limit_used : 0;
}
if($mod_limit && $limit_used >= $mod_limit){
	$data = array("code"=>202,'status'=>200,'message'=>lang($L['info_limit']));	
	exit(json_encode($data));
}
if($MG['hour_limit']) {
	$today = $DT_TIME - 3600;
	$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $sql AND addtime>$today");
	if($r && $r['num'] >= $MG['hour_limit']){
		$data = array("code"=>200,'status'=>200,'message'=>lang($L['hour_limit']));
		exit(json_encode($data));
	}	
}
if($MG['day_limit']) {
	$today = $today_endtime - 86400;
	$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $sql AND addtime>$today");
	if($r && $r['num'] >= $MG['day_limit']){
		$data = array("code"=>203,'status'=>200,'message'=>lang($MG['day_limit']));
		exit(json_encode($data));
	}
}

if($mod_free_limit >= 0) {
	$fee_add = ($MOD['fee_add'] && (!$MOD['fee_mode'] || !$MG['fee_mode']) && $limit_used >= $mod_free_limit && $_userid) ? dround($MOD['fee_add']) : 0;
} else {
	$fee_add = 0;
}


$post['credit'] = abs(intval($post['credit']));

if($MG['add_limit']) {
	$last = $db->get_one("SELECT addtime FROM {$table} WHERE $sql ORDER BY itemid DESC");
	if($last && $DT_TIME - $last['addtime'] < $MG['add_limit']){
		$data = array("code"=>204,'status'=>200,'message'=>lang($MG['add_limit']));
		exit(json_encode($data));
	}	
}
*/
if(strlen($title) < 3){
	$data = array("code"=>207,'status'=>200,'message'=>'no_pass_title');
	exit(json_encode($data));
}
if(!$catid){
	$data = array("code"=>208,'status'=>200,'message'=>'no_pass_catid');
	exit(json_encode($data));	
}
$CAT = get_cat($catid);
//if(!$CAT || !check_group($_groupid, $CAT['group_add'])) dalert(lang($L['group_add'], array($CAT['catname'])));
//$need_check =  $MOD['check_add'] == 2 ? $MG['check'] : $MOD['check_add'];
//$post['status'] = get_status(3, $need_check);
$post['addtime'] = $post['level'] = $post['fee'] = 0;
$post['style'] = $post['template'] = $post['note'] = $post['thumb'] = $post['filepath'] = '';
$post['status'] = 3;
$post['catid'] = $catid;
$post['hits'] = 0;
$post['username'] = $_username;
$post['title'] = $title;
$post['content'] = $content;
$post['credit'] = 0;
$post['kcid'] = $kcid;
if(isset($hidden) && $hidden) $post['hidden'] = 1;
/*if($FD) fields_check($post_fields);
if($could_color && $color && $_credit > $MOD['credit_color']) {
	$post['style'] = $color;
	credit_add($_username, -$MOD['credit_color']);
	credit_record($_username, -$MOD['credit_color'], 'system', $L['title_color'], '['.$MOD['name'].']'.$post['title']);
}
*/
$myid = $do->add($post);
//if($FD) fields_update($post_fields, $table, $do->itemid);
//if($MOD['show_html'] && $post['status'] > 2) $do->tohtml($do->itemid);
/*if($fee_add) {
	if($fee_currency == 'money') {
		money_add($_username, -$fee_add);
		money_record($_username, -$fee_add, $L['in_site'], 'system', lang($L['credit_record_add'], array($MOD['name'])), 'ID:'.$do->itemid);
	} else {
		credit_add($_username, -$fee_add);
		credit_record($_username, -$fee_add, 'system', lang($L['credit_record_add'], array($MOD['name'])), 'ID:'.$do->itemid);
	}
}

if($post['credit']) {
	credit_add($_username, -$post['credit']);
	credit_record($_username, -$post['credit'], 'system', lang($L['credit_record_reward'], array($MOD['name'])), 'ID:'.$do->itemid);
}

if($post['ask'] && check_name($post['ask'])) {
	$db->query("UPDATE {$table_expert} SET ask=ask+1 WHERE username='$post[ask]'");
	$touser = $post['ask'];
	$title = lang($L['know_new_title'], array($post['title']));
	$question = $post['title'];
	$itemid = $do->itemid;
	$content = ob_template('ask', 'mail');
	send_message($touser, $title, $content);
}

$js = '';
if($post['status'] == 3) {
	$r = $db->get_one("SELECT linkurl FROM {$table} WHERE itemid=$do->itemid");
	$forward = ($DT_PC ? $MOD['linkurl'] : $MOD['mobile']).$r['linkurl'];
	$msg = '';
} else {
	if($_userid) {
		set_cookie('dmsg', $msg);
		$forward = '?mid='.$mid.'&status='.$post['status'];
		$msg = '';
	} else {
		$forward = '?mid='.$mid.'&action=add';
		$msg = $L['success_check'];
	}
}
*/
if($myid)
	$data = array("code"=>200,'status'=>200,'message'=>true,'data'=>$myid);	
else
	$data = array("code"=>208,'status'=>200,'message'=>'insert_false');	
exit(json_encode($data));
?>