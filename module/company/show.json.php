<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
$data = array("code"=>200,'status'=>500,'message'=>false);
$itemid or exit(json_encode($data));
$item = $db->get_one("SELECT * FROM {$table} WHERE userid=$itemid");
if(empty($item)) {	
	exit(json_encode($data));
}
unset($item['mode'],$item['icp'],$item['vipt'],$item['vipr']);
$data = array("code"=>200,'status'=>200,'message'=>true);
$data['data'] = $item;
exit(json_encode($data));
?>