<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($lists) { ?>
<ul class="list-txt">
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<li><a href="<?php echo $v['linkurl'];?>" rel="external" target="_blank"><?php echo $v['title'];?></a></li>
<?php } } ?>
</ul>
<?php } else { ?>
<?php include template('chip-empty', 'mobile');?>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer', $template);?>