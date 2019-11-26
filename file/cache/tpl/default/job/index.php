<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m m3">
<div class="m3l">
<?php if($MOD['page_ijob']) { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?typeid=4');?>">更多<i>&gt;</i></a></span><strong>推荐招聘</strong></div>
<div class="job-tb"><?php echo tag("moduleid=$moduleid&condition=status=3 and level>0&areaid=$cityid&pagesize=".$MOD['page_ijob']."&order=".$MOD['order']."&template=table-job");?></div>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?typeid=1');?>">更多<i>&gt;</i></a></span><strong>最新招聘</strong></div>
<div class="job-tb"><?php echo tag("moduleid=$moduleid&condition=status=3&areaid=$cityid&pagesize=".$MOD['page_ijob']."&order=".$MOD['order']."&template=table-job");?></div>
<?php } ?>
</div>
<div class="m3r">
<div class="user-info">
<script type="text/javascript">
var destoon_uname = get_cookie('username');
document.write('<a href="<?php echo $MODULE['2']['linkurl'];?>avatar.php"><img src="'+DTPath+'api/avatar/show.php?size=large&reload=<?php echo DT_TIME;?>&username='+destoon_uname+'"/></a>');
document.write('<ul>');
if(get_cookie('auth')) {
document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?>logout.php">退出</a></em><a href="<?php echo $MODULE['2']['linkurl'];?>"><strong>Hi,'+destoon_uname+'</strong></a></li>');
} else {
if(destoon_uname) {
document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>">登录</a></em><a href="<?php echo $MODULE['2']['linkurl'];?>"><strong>Hi,'+destoon_uname+'</strong></a></li>');
} else {
document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>">注册</a></em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>"><strong>Hi,请登录</strong></a></li>');
}
}
document.write('<li><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&action=add" class="b">发布招聘</a><i>|</i><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>" class="b">我的招聘</a><i>|</i><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&job=answer" class="b">完善简历</a></li>');
document.write('</ul>');
</script>
</div>
<div class="job-stats">
<ul>
<li><i><?php echo $db->count($table, 'status=3', 1800);?></i>职位</li>
<li><div><i><?php echo $db->count($table_resume, 'status=3', 1800);?></i>简历</div></li>
<li><i><?php echo $db->count($DT_PRE.'company', 'groupid>5', 1800);?></i>企业</li>
</ul>
</div>
<!--
<div class="head-sub"><span><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>">更多<i>&gt;</i></a></span><strong>企业招人才</strong></div>
<div class="job-for">
<a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?action=add&mid=<?php echo $moduleid;?>"><span>发布招聘</span></a>
<a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?action=add&mid=<?php echo $moduleid;?>"><span>搜索人才</span></a>
</div>
<div class="head-sub"><span><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&resume=1">更多<i>&gt;</i></a></span><strong>个人找工作</strong></div>
<div class="job-for">
<a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?action=add&mid=<?php echo $moduleid;?>"><span>完善简历</span></a>
<a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?action=add&mid=<?php echo $moduleid;?>"><span>搜索职位</span></a>
</div>
-->
<div class="head-sub"><strong>按行业浏览</strong></div>
<div class="list-cate2">
<ul>
<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
<li><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><?php echo set_style($v['catname'],$v['style']);?></a><i>(<?php echo $v['item'];?>)</i></li>
<?php } } ?>
</ul>
<div class="c_b"></div>
</div>
<div class="head-sub"><strong>按地区浏览</strong></div>
<div class="list-area4">
<?php $mainarea = get_mainarea(0)?>
<ul>
<?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?>
<li><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?areaid='.$v['areaid']);?>"><?php echo $v['areaname'];?></a></li>
<?php } } ?>
</ul>
<div class="c_b"></div>
</div>
</div>
<div class="c_b"></div>
</div>
<?php include template('footer');?>