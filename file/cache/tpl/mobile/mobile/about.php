<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="blank-35"></div>
<div class="list-set">
<ul>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<li><div><a href="<?php echo $v['linkurl'];?>"<?php if($v['islink']) { ?> rel="external"<?php } ?>><?php echo $v['title'];?></a></div></li>
<?php } } ?>
</ul>
</div>
<div class="blank-35"></div>
<?php include template('footer');?>