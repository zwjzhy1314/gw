<?php 
defined('IN_DESTOON') or exit('Access Denied');
$moduleid = isset($moduleid) ? intval($moduleid) : 2;
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/include/post.func.php';
$post = isset($post) ? $post : array();
$data = array("code"=>206,'status'=>500,'message'=>false);
require DT_ROOT.'/module/'.$module.'/'.$module.'.class.php';
$do = new $module($moduleid);
switch($action){
	case 'add':		
		if(strlen($nikename) < 3){
			$data = array("code"=>207,'status'=>200,'message'=>'no_pass_title');
			exit(json_encode($data));
		}
		$post['gender'] = $gender;
		$post['birthday'] = $birthday;
		$post['userid'] = $userid;
		$post['nikename'] = $nikename;
		$post['scheduleids'] = $scheduleids;
		$post['recommendids'] = $recommendids;
		$myid = $do->addchild($post);
		if($myid)
			$data = array("code"=>200,'status'=>200,'message'=>true,'data'=>$myid);	
		else
			$data = array("code"=>208,'status'=>200,'message'=>'insert_false');	
	break;
	case 'update':
		if(strlen($nikename) < 3){
			$data = array("code"=>201,'status'=>200,'message'=>'no_pass_title');
			exit(json_encode($data));
		}
		$post['id'] = $id;
		$post['gender'] = $gender;
		$post['birthday'] = $birthday;
		$post['nikename'] = $nikename;
		$post['scheduleids'] = $scheduleids;
		$post['recommendids'] = $recommendids;
		if($do->updatechild($post))
			$data = array("code"=>200,'status'=>200,'message'=>true);	
		else
			$data = array("code"=>207,'status'=>200,'message'=>false);		
	break;
	case 'read':
		if(!$id){
			$data = array("code"=>202,'status'=>200,'message'=>'no_id');
			exit(json_encode($data));
		}
		$info = $do->get_one_child($id);
		if(empty($info))
			$data = array("code"=>203,'status'=>200,'message'=>'no_such_child_info');	
		else
			$data = array("code"=>200,'status'=>200,'message'=>true,'data'=>$info);	
	break;
	default:		
		$list = $do->get_list_child($userid);
		if(empty($list))
			$data = array("code"=>204,'status'=>200,'message'=>'no_anybody_child');	
		else
			$data = array("code"=>200,'status'=>200,'message'=>true,'data'=>$list);				
}
exit(json_encode($data));
?>