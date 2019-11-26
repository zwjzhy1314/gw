<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m martop">
<div class="nav"><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>></i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>></i> <?php echo cat_pos($CAT, ' <i>></i> ');?></div>
<div class="b20 bd-t"></div>
</div>
<div class="m m1">
<div class="m1l o_h">
<?php if($CP) { ?><?php include template('property_list', 'chip');?><?php } ?>
<div class="list-img list1"><?php if($tags) { ?><?php include template('list-'.$module, 'tag');?><?php } ?></div>
</div>
<div class="m1r side">
<ul>
<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
<li class="<?php if($v['catid']==$catid) { ?>side_on<?php } else { ?>side_li<?php } ?>"><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><?php echo set_style($v['catname'],$v['style']);?><?php if(!$cityid) { ?> <em>(<?php echo $v['item'];?>)</em><?php } ?></a></li>
<?php } } ?>
</ul>
</div>
<div class="c_b"></div>
</div>
<?php include template('footer');?>