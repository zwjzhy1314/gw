<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<?php if($TYPE) { ?>
<a href="javascript:window.scrollTo(0,0);$('#type-<?php echo $file;?>-<?php echo $moduleid;?>').slideToggle(300);"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($TYPE) { ?>
<div id="type-<?php echo $file;?>-<?php echo $moduleid;?>" style="display:none;">
<div class="list-set">
<ul>
<?php if(is_array($_TP['0'])) { foreach($_TP['0'] as $v0) { ?>
<li<?php if($typeid==$v0['typeid']) { ?> style="background:#F6F6F6;"<?php } ?>><div><a href="<?php echo userurl($username, 'file='.$file.'&typeid='.$v0['typeid'], $domain);?>"><?php echo $v0['typename'];?></a></div></li>
<?php if(isset($_TP['1'][$v0['typeid']])) { ?>
<?php if(is_array($_TP['1'][$v0['typeid']])) { foreach($_TP['1'][$v0['typeid']] as $v1) { ?>
<li<?php if($typeid==$v1['typeid']) { ?> style="background:#F6F6F6;"<?php } ?>><div><a href="<?php echo userurl($username, 'file='.$file.'&typeid='.$v1['typeid'], $domain);?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v1['typename'];?></a></div></li>
<?php } } ?>
<?php } ?>
<?php } } ?>
</ul>
</div>
<div class="blank-35 bd-b"></div>
</div>
<?php } ?>
<?php if($itemid) { ?>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info"><?php echo $editdate;?><?php if($MOD['hits']) { ?>&nbsp;&nbsp;浏览:<span id="hits"><?php echo $hits;?></span><?php } ?></div>
<?php if($thumb) { ?><?php include template('album', 'chip');?><?php } ?>
<div class="content">
价格:<?php if($price&&$unit) { ?><span class="f_red"><?php echo $DT['money_sign'];?><?php echo $price;?></span>/<?php echo $unit;?><?php } else { ?>未填<?php } ?><br/>
<?php if($brand) { ?>品牌:<?php echo $brand;?><br/><?php } ?>
<?php if($n1 && $v1) { ?><?php echo $n1;?>:<?php echo $v1;?><br/><?php } ?>
<?php if($n2 && $v2) { ?><?php echo $n2;?>:<?php echo $v2;?><br/><?php } ?>
<?php if($n3 && $v3) { ?><?php echo $n3;?>:<?php echo $v3;?><br/><?php } ?>
<?php if($minamount) { ?>起订:<?php echo $minamount;?><?php echo $unit;?><br/><?php } ?>
<?php if($amount) { ?>供应:<?php echo $amount;?><?php echo $unit;?><br/><?php } ?>
<?php if($days) { ?>发货:<?php echo $days;?>天内<br/><?php } ?>
<?php if($could_purchase) { ?>
<a href="<?php echo $MODULE['2']['mobile'];?>buy.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>"><div class="btn-green" style="margin:10px 0;">立即购买</div></a>
<?php } else if($could_inquiry) { ?>
<a href="<?php echo $MOD['mobile'];?><?php echo rewrite('inquiry.php?itemid='.$itemid);?>" data-transition="slideup"><div class="btn-blue" style="margin:10px 0;">发送询价</div></a>
<?php } ?>
<?php echo $content;?>
</div>
<div class="head bd-b"><strong>联系方式</strong></div>
<div class="contact"><?php include template('contact', 'chip');?></div>
</div>
<?php } else { ?>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo DT_MOB;?>static/img/60x60.png<?php } ?>" width="60" height="60" alt="" onerror="this.src='<?php echo DT_MOB;?>static/img/60x60.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><i><?php if($v['unit'] && $v['price']>0) { ?><?php echo $DT['money_sign'];?><?php echo $v['price'];?>/<?php echo $v['unit'];?><?php } else { ?>面议<?php } ?></i><span><?php echo timetodate($v['edittime'], 5);?></span></li>
</ul>
</div>
<?php } } ?>
<?php } else { ?>
<?php include template('empty', 'chip');?>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } ?>
<?php include template('footer', $template);?>