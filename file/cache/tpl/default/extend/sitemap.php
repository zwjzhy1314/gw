<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style type="text/css">
.map p {margin:0px;line-height:28px;padding:0 0 0 20px;font-size:14px;}
.L1 {}
.L2 {background:#FF6600;color:#FFFFFF;}
</style>
<div class="m">
<div class="nav"><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="./">网站地图</a><?php if($mid) { ?> <i>&gt;</i> <?php echo $MODULE[$mid]['name'];?><?php } ?></div>
<?php if($action=='letter') { ?>
<div class="map">
<div class="box_head">
<span class="f_r px16">
<?php if(is_array($LETTER)) { foreach($LETTER as $L) { ?>
<a href="<?php echo rewrite('index.php?mid='.$M['moduleid'].'&letter='.$L);?>"><span class="<?php if($letter==$L) { ?>L2<?php } else { ?>L1<?php } ?>">&nbsp;<?php echo $L;?>&nbsp;</span></a>
<?php } } ?>
</span>
<a href="<?php echo rewrite('index.php?mid='.$M['moduleid']);?>"><strong><?php echo $M['name'];?></strong></a>
</div>
<div class="box_body">
<?php if($CATALOG) { ?>
<table cellspacing="0" cellpadding="0">
<?php if(is_array($CATALOG)) { foreach($CATALOG as $i => $c) { ?>
<?php if($i%8==0) { ?><tr><?php } ?>
<td valign="top" width="150">
<p><a href="<?php echo $M['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo set_style($c['catname'], $c['style']);?></a> <span class="f_gray">(<?php echo $c['item'];?>)</span></p>
</td>
<?php if($i%8==7) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php } else { ?>
<br/><br/><br/><center>没有字母 <strong><?php echo $letter;?></strong> 开头的类目</center><br/><br/><br/>
<?php } ?>
</div>
</div>
<?php } else if($action=='module') { ?>
<div class="box_head">
<span class="f_r px16">
<?php if(is_array($LETTER)) { foreach($LETTER as $L) { ?>
<a href="<?php echo rewrite('index.php?mid='.$M['moduleid'].'&letter='.$L);?>"><span class="L1">&nbsp;<?php echo $L;?>&nbsp;</span></a>
<?php } } ?>
</span>
<a href="<?php echo $M['linkurl'];?>" target="_blank"><strong><?php echo $M['name'];?></strong></a>
</div>
<div class="box_body">
<div class="catalog" style="border:none;padding:0;">
<?php include template('catalog', 'chip');?>
</div>
</div>
<?php } else { ?>
<?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?>
<?php if($m['moduleid'] > 3 && !$m['islink']) { ?>
<div class="map">
<div class="box_head"><span class="f_r f_gray c_p" onclick="Go('<?php echo rewrite('index.php?mid='.$m['moduleid']);?>');">更多</span><a href="<?php echo $m['linkurl'];?>" target="_blank"><strong><?php echo $m['name'];?></strong></a></div>
<div class="box_body">
<table cellspacing="0" cellpadding="0">
<?php $child = get_maincat(0, $m['moduleid']);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
<?php if($i%8==0) { ?><tr><?php } ?>
<td valign="top" width="150">
<p><a href="<?php echo $m['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo set_style($c['catname'], $c['style']);?></a></p>
</td>
<?php if($i%8==7) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>
</div>
<div class="b20">&nbsp;</div>
<?php } ?>
<?php } } ?>
<?php } ?>
</div>
<?php include template('footer');?>