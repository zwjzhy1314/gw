<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
$data = array("code"=>200,'status'=>500,'message'=>false);
if(!$areaid && $cityid && strpos($DT_URL, 'areaid') === false) {
	$areaid = $cityid;
	$ARE = $AREA[$cityid];
}
$data['data'] = array();

$fds = $MOD['fields'];
$condition = "groupid>5 AND catids<>''";
if($catid) $condition .= " AND catids LIKE '%,".$catid.",%'";
if($areaid) $condition .= ($ARE['child']) ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
$pagesize = $_POST['pagesize'] ? intval($_POST['pagesize']) : $MOD['pagesize'];
$offset = ($page-1)*$pagesize;
$items = $db->count($table, $condition, $DT['cache_search']);
if($items) {
	$order = $MOD['order'] ? " ORDER BY ".$MOD['order'] : '';
	$result = $db->query("SELECT {$fds} FROM {$table} WHERE {$condition}{$order} LIMIT {$offset},{$pagesize}", $DT['cache_search'] && $page == 1 ? 'CACHE' : '', $DT['cache_search']);
	while($r = $db->fetch_array($result)) {
		if($lazy && isset($r['thumb']) && $r['thumb']) $r['thumb'] = DT_SKIN.'image/lazy.gif" original="'.$r['thumb'];
		$data['data'][] = $r;
	}
	$db->free_result($result);
}
$data['message'] = true;
$data['status'] = 200;
exit(json_encode($data));

?>