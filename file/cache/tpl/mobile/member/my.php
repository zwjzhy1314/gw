<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo DT_MOB;?>my.php" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>我的</span></a>
</div>
<div class="head-bar-title">信息管理</div>
<div class="head-bar-right">
<a href="<?php echo DT_MOB;?>channel.php" data-transition="slideup"><span>频道</span></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="list-set">
<ul>
<?php if(is_array($MYMODS)) { foreach($MYMODS as $k => $v) { ?>
<li><div><a href="<?php echo $DT['file_my'];?>?mid=<?php echo $v;?>" rel="external"><?php echo $MODULE[$v]['name'];?>管理</a></div></li>
<?php } } ?>
<?php if($MG['resume']) { ?>
<?php if(is_array($MODULE)) { foreach($MODULE as $k => $v) { ?>
<?php if($v['module'] == 'job') { ?><li><div><a href="<?php echo $DT['file_my'];?>?mid=<?php echo $k;?>&job=resume" rel="external"><?php echo $v['name'];?>简历</a></div></li><?php } ?>
<?php } } ?>
<?php } ?>
</ul>
</div>
<?php include template('footer');?>