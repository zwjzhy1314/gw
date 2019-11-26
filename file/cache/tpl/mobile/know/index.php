<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>频道</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<a href=&#34;<?php echo DT_MOB;?>api/search.php?mid=<?php echo $moduleid;?>&#34;><span><?php echo $MOD['name'];?>搜索</span></a>|<a href=&#34;<?php echo DT_MOB;?>api/category.php?moduleid=<?php echo $moduleid;?>&#34;><span>按分类浏览</span></a>|<a href=&#34;<?php echo DT_MOB;?>api/area.php?moduleid=<?php echo $moduleid;?>&#34;><span>按地区浏览</span></a>|<a href=&#34;<?php echo $MOD['mobile'];?><?php echo rewrite('expert.php?page=1');?>&#34;><span><?php echo $MOD['name'];?>专家</span></a>', '取消');"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<style type="text/css">
.list-ask {height:66px;padding:0 16px;}
.list-ask p {margin:6px 0 0 0;}
</style>
<div class="list-tab bd-b">
<ul>
<li<?php if($typeid==0) { ?> class="on"<?php } ?>><a href="<?php echo $MOD['mobile'];?>index.php?typeid=0" data-transition="flip"><span>全部问题</span></a></li>
<li<?php if($typeid==1) { ?> class="on"<?php } ?>><a href="<?php echo $MOD['mobile'];?>index.php?typeid=1" data-transition="flip"><span>等待解决</span></a></li>
<li<?php if($typeid==2) { ?> class="on"<?php } ?>><a href="<?php echo $MOD['mobile'];?>index.php?typeid=2" data-transition="flip"><span>已经解决</span></a></li>
</ul>
</div>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><em class="f_r"><?php echo $PROCESS[$v['process']];?></em><span><?php echo $v['date'];?></span></li>
</ul>
</div>
<?php } } ?>
<?php } else { ?>
<?php include template('empty', 'chip');?>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer');?>