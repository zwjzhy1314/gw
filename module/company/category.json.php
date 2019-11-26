<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
$data = array("code"=>200,'status'=>500,'message'=>false);
$catid = $catid ? $catid : 0;
$moduleid = $moduleid ? $moduleid : 24;
$category = get_maincat($catid, $moduleid);
$data['message'] = true;
$data['status'] = 200;
$data['data'] = $category;
exit(json_encode($data));
?>