<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m m3">
<div class="m3l"> 
<?php if($MOD['page_iexpert']) { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('expert.php?page=1');?>">更多<i>&gt;</i></a></span><strong><?php echo $MOD['name'];?>专家</strong></div>
<?php $tags=tag("table=know_expert_$moduleid&condition=1&pagesize=".$MOD['page_iexpert']."&order=addtime desc&template=null");?>
<div class="know-expert">
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<div>
<a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('expert.php?itemid='.$t['itemid']);?>" target="_blank"><img src="<?php echo useravatar($t['username'], 'large');?>"/></a>
<ul>
<li><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('expert.php?itemid='.$t['itemid']);?>" target="_blank" title="<?php echo $t['alt'];?>"><strong><?php echo $t['title'];?></strong></a></li>
<li title="<?php echo $t['major'];?>">擅长:<?php echo $t['major'];?></li>
<li><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&action=add&askto=<?php echo $t['username'];?>" target="_blank"><span>提问</span></a></li>
</ul>
</div>
<?php } } ?>
</div>
<div class="c_b"></div>
<?php } ?>
<?php if($MOD['page_irec']) { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?typeid=4');?>">更多<i>&gt;</i></a></span><strong>精彩推荐</strong></div>
<div class="know-list"><?php echo tag("moduleid=$moduleid&condition=status=3 and level>0&areaid=$cityid&order=".$MOD['order']."&pagesize=".$MOD['page_irec']."&datetype=4&template=list-know");?></div>
<?php } ?>
<?php if($MOD['page_isolve']) { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?typeid=1');?>">更多<i>&gt;</i></a></span><strong>待解决的问题</strong></div>
<div class="know-list"><?php echo tag("moduleid=$moduleid&condition=status=3 and process=1&areaid=$cityid&order=".$MOD['order']."&pagesize=".$MOD['page_isolve']."&datetype=4&template=list-know");?></div>
<?php } ?>
<?php if($MOD['page_iresolve']) { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?typeid=0');?>">更多<i>&gt;</i></a></span><strong>已解决的问题</strong></div>
<div class="know-list"><?php echo tag("moduleid=$moduleid&condition=status=3 and process=3&order=updatetime desc&areaid=$cityid&pagesize=".$MOD['page_iresolve']."&datetype=4&template=list-know");?></div>
<?php } ?>
<?php if($MOD['page_ivote']) { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?typeid=2');?>">更多<i>&gt;</i></a></span><strong>投票中的问题</strong></div>
<div class="know-list"><?php echo tag("moduleid=$moduleid&condition=status=3 and process=2&order=updatetime desc&areaid=$cityid&pagesize=".$MOD['page_ivote']."&datetype=4&template=list-know");?></div>
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
document.write('<li><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&action=add" class="b">我要提问</a><i>|</i><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>" class="b">我的提问</a><i>|</i><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&job=answer" class="b">我的回答</a></li>');
document.write('</ul>');
</script>
</div>
<div class="know-stats">
<ul>
<a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?typeid=0');?>"><li><i><?php echo $db->count($table, 'status=3 and process=3', 1800);?></i>已解决</li></a>
<a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?typeid=1');?>"><li><div><i><?php echo $db->count($table, 'status=3 and process=1', 1800);?></i>待解决</div></li></a>
<a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('expert.php?page=1');?>"><li><i><?php echo $db->count($table_expert, '1', 1800);?></i>专家</li></a>
</ul>
</div>
<div class="head-sub"><strong>问题分类</strong></div>
<div class="know-cate">
<?php $child = get_maincat(0, $moduleid, 1);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
<p><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>"><strong><?php echo set_style($c['catname'], $c['style']);?></strong></a> <em>(<?php echo $c['item'];?>)</em></p>
<?php if($c['child']) { ?>
<div>
<?php $sub = get_maincat($c['catid'], $moduleid, 1);?>
<?php if(is_array($sub)) { foreach($sub as $j => $s) { ?><a href="<?php echo $MOD['linkurl'];?><?php echo $s['linkurl'];?>"><?php echo set_style($s['catname'], $s['style']);?></a><i>|</i><?php } } ?>
</div>
<?php } ?>
<?php } } ?>
</div>
</div>
<div class="c_b"></div>
</div>
<?php include template('footer');?>