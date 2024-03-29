<?php 
defined('IN_DESTOON') or exit('Access Denied');
login();
$EXT['weixin'] or dheader('./');
$WX = cache_read('weixin.php');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/include/post.func.php';
$W = array();
$i = 0;
$result = $db->query("SELECT * FROM {$DT_PRE}weixin_user WHERE username='$_username' ORDER BY visittime DESC");
while($r = $db->fetch_array($result)) {
	if($i++) {
		$db->query("UPDATE {$DT_PRE}weixin_user SET username='' WHERE itemid=$r[itemid]");
	} else {
		$W = $r;
	}
}
switch($action) {
	case 'ajax':
		exit($W ? 'ok' : 'ko');
	break;
	case 'unbind':
		$W or message();
		$db->query("UPDATE {$DT_PRE}weixin_user SET username='' WHERE itemid=$W[itemid]");
		dmsg($L['op_success'], '?action=index');
	break;
	case 'push':
		$W or message();
		$push = $W['push'] ? 0 : 1;
		$db->query("UPDATE {$DT_PRE}weixin_user SET push=$push WHERE itemid=$W[itemid]");
		dmsg($push ? $L['weixin_push_open'] : $L['weixin_push_close'], '?action=index');
	break;
	default:
		if($W) {
			$W['headimgurl'] or $W['headimgurl'] = DT_PATH.'api/weixin/image/headimg.jpg';
			$sign = ($W['credittime'] && timetodate($W['credittime'], 3) == timetodate($DT_TIME, 3)) ? 1 : 0;
			$timeout = $DT_TIME - $W['visittime'] > 172800 ? 1 : 0;
		}
		$auth = encrypt($_username.md5(DT_IP.$_SERVER['HTTP_USER_AGENT']), DT_KEY.'WXQR');
		$head_title = $L['weixin_title'];	
	break;
}
if($DT_PC) {
	//
} else {
	$foot = '';
	$back_link = 'index.php';
}
include template('weixin', $module);
?>