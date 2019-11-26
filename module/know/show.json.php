<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
$data = array("code"=>200,'status'=>500,'message'=>false);
$moduleid = isset($moduleid) ? intval($moduleid) : 10;
$itemid or exit(json_encode($data));
$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
if(empty($item) || $item['status'] != 3) {	
	exit(json_encode($data));
}else{
	extract($item);
}
$content_table = content_table($moduleid, $itemid, $MOD['split'], $table_data);
$t = $db->get_one("SELECT content FROM {$content_table} WHERE itemid=$itemid");
$item['content'] = $t['content'];
$item['adddate'] = timetodate($addtime, 3);
$item['editdate'] = timetodate($edittime, 3);
if($fromurl) $item['fromurl'] = fix_link($fromurl);
$item['linkurl'] = $MOD['linkurl'].$linkurl;
$item['titles'] = array();
if($subtitle) {
	$titles = explode("\n", $subtitle);
	$titles = array_map('trim', $titles);
}
$item['subtitle'] = isset($titles[$page-1]) ? $titles[$page-1] : '';
$item['keytags'] = $tag ? explode(' ', $tag) : array();
$fee = get_fee($item['fee'], $MOD['fee_view']);
if($fee) {
	$user_status = 4;
	$item['description'] = get_description($content, $MOD['pre_view']);
} else {
	$user_status = 3;
}
$item['content'] = parse_video($item['content']);
unset($item['template'],$item['filepath'],$item['titles'],$item['pptword']);
$page = isset($page) ? intval($page) : 1;
$item['answers'] = $item['best'] = $item['E'] = array();
if($page == 1) {
	if($aid) $item['data']['best'] = $db->get_one("SELECT * FROM {$table_answer} WHERE itemid=$aid");
	if($item['best'] && $item['best']['expert']) $item['E'] = $db->get_one("SELECT * FROM {$table_expert} WHERE username='$item[best][username]'");
}

//if($process == 0 || $process == 3) {
	if($MOD['answer_pagesize']) {
		$pagesize = $MOD['answer_pagesize'];
		$offset = ($page-1)*$pagesize;
	}
	$items = $answer;
	$item['items'] = $items;
	if($aid) $items--;	
	if($items > 0) {
		$result = $db->query("SELECT * FROM {$table_answer} WHERE qid=$itemid AND status=3 ORDER BY itemid ASC LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			if($r['itemid'] == $aid) continue;
			$item['answers'][] = $r;
		}
	}
//}
$data = array("code"=>200,'status'=>200,'message'=>true);
$data['data'] = $item;
exit(json_encode($data));
?>