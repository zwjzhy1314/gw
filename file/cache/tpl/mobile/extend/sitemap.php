<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php if($mid) { ?><?php echo $M['name'];?><?php } else { ?><?php echo $head_name;?><?php } ?></div>
<div class="head-bar-right">
<?php if($action=='module') { ?>
<a href="javascript:$('#letters').fadeToggle();"><span>索引</span></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<style type="text/css">
.map {background:#FFFFFF;padding:10px 16px;display:table;width:100%;}
.map div {width:50%;height:32px;line-height:32px;overflow:hidden;font-size:16px;float:left;}
.let {background:#FFFFFF;padding:16px 0 0 16px;display:table;width:100%;}
.let div {width:32px;height:32px;line-height:32px;overflow:hidden;font-size:18px;float:left;background:#EEEEEE;border-radius:50%;margin:0 16px 16px 0;text-align:center;}
</style>
<?php if($action=='letter') { ?>
<div class="let bd-b">
<?php if(is_array($LETTER)) { foreach($LETTER as $L) { ?>
<div<?php if($letter==$L) { ?> style="background:#007AFF;"<?php } ?>><a href="<?php echo rewrite('index.php?mid='.$M['moduleid'].'&letter='.$L);?>" data-transition="none"<?php if($letter==$L) { ?> style="color:#FFFFFF;"<?php } ?>><?php echo strtoupper($L);?></a></div>
<?php } } ?>
</div>
<div class="map bd-b">
<?php if($CATALOG) { ?>
<?php if(is_array($CATALOG)) { foreach($CATALOG as $i => $c) { ?>
<div><a href="<?php echo $M['mobile'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo $c['catname'];?></a></div>
<?php } } ?>
<?php } else { ?>
<br/><br/><br/><center>没有字母 <strong><?php echo $letter;?></strong> 开头的类目</center><br/><br/><br/>
<?php } ?>
</div>
<?php } else if($action=='module') { ?>
<div class="let bd-b" style="display:none;" id="letters">
<?php if(is_array($LETTER)) { foreach($LETTER as $L) { ?>
<div><a href="<?php echo rewrite('index.php?mid='.$M['moduleid'].'&letter='.$L);?>" data-transition="none"><?php echo strtoupper($L);?></a></div>
<?php } } ?>
</div>
<?php $main = get_maincat(0, $mid);?>
<?php if(is_array($main)) { foreach($main as $m) { ?>
<div class="blank-35">&nbsp;</div>
<div class="list-set">
<ul>
<li><div><a href="<?php echo $M['mobile'];?><?php echo $m['linkurl'];?>" target="_blank"><?php echo $m['catname'];?></a></div></li>
</ul>
</div>
<?php if($m['child']) { ?>
<div class="map bd-b">
<?php $child = get_maincat($m['catid'], $mid);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
<div><a href="<?php echo $M['mobile'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo set_style($c['catname'], $c['style']);?></a></div>
<?php } } ?>
</div>
<?php } ?>
<?php } } ?>
<?php } else { ?>
<?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?>
<?php if($m['moduleid'] > 3 && !$m['islink']) { ?>
<div class="blank-35"></div>
<div class="list-set">
<ul>
<li><div><span><a href="<?php echo rewrite('index.php?mid='.$m['moduleid']);?>">更多</a></span><a href="<?php echo $m['mobile'];?>" target="_blank"><?php echo $m['name'];?></a></div></li>
</ul>
</div>
<div class="map bd-b">
<?php $child = get_maincat(0, $m['moduleid']);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
<div><a href="<?php echo $m['mobile'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo set_style($c['catname'], $c['style']);?></a></div>
<?php } } ?>
</div>
<?php } ?>
<?php } } ?>
<?php } ?>
<?php include template('footer');?>