<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m o_h">
<?php if($MOD['page_irec']) { ?>
<div class="head-txt"><span><?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?><?php if($k<10) { ?><?php if($k) { ?> &nbsp;|&nbsp; <?php } ?><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><?php echo $v['catname'];?></a><?php } ?><?php } } ?></span><strong>推荐<?php echo $MOD['name'];?></strong></div>
<div class="list-img list0"><?php echo tag("moduleid=$moduleid&condition=status=3 and level>0&areaid=$cityid&order=".$MOD['order']."&width=180&height=135&datetype=3&lazy=$lazy&pagesize=".$MOD['page_irec']."&template=list-special");?></div>
<?php } ?>
<?php if($MOD['page_icat']) { ?>
<?php if(is_array($maincat)) { foreach($maincat as $i => $c) { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>">更多<i>&gt;</i></a></span><strong><?php echo $c['catname'];?></strong></div>
<div class="list-img list0"><?php echo tag("moduleid=$moduleid&condition=status=3&catid=".$c['catid']."&areaid=$cityid&order=".$MOD['order']."&width=180&height=135&datetype=3&lazy=$lazy&pagesize=".$MOD['page_icat']."&template=list-special");?></div>
<?php } } ?>
<?php } ?>
</div>
<?php include template('footer');?>