<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php if($action == 'my') { ?>我的订单<?php } else { ?><?php if($typeid) { ?><?php echo $TYPE[$typeid]['typename'];?><?php } else { ?>积分换礼<?php } ?><?php } ?></div>
<div class="head-bar-right">
<a href="javascript:window.scrollTo(0,0);$('#<?php echo $ext;?>-<?php echo $typeid;?>-<?php echo $page;?>-<?php echo $itemid;?>').slideToggle(300);"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div id="<?php echo $ext;?>-<?php echo $typeid;?>-<?php echo $page;?>-<?php echo $itemid;?>" style="display:none;">
<div class="ui-form sch">
<form action="<?php echo $mob;?>index.php">
<div class="blank-20"></div>
<div><input type="search" name="kw" value="<?php echo $kw;?>" placeholder="输入关键词搜索"/></div>
<div class="blank-20"></div>
</form>
</div>
<div class="list-set">
<ul>
<li><div><a href="<?php echo $mob;?>index.php?action=my" data-transition="slideup">我的订单</a></div></li>
<?php if(is_array($_TP['0'])) { foreach($_TP['0'] as $v0) { ?>
<li<?php if($typeid==$v0['typeid']) { ?> style="background:#F6F6F6;"<?php } ?>><div><a href="<?php echo $mob;?><?php echo list_url($v0['typeid']);?>"><?php echo $v0['typename'];?></a></div></li>
<?php if(isset($_TP['1'][$v0['typeid']])) { ?>
<?php if(is_array($_TP['1'][$v0['typeid']])) { foreach($_TP['1'][$v0['typeid']] as $v1) { ?>
<li<?php if($typeid==$v1['typeid']) { ?> style="background:#F6F6F6;"<?php } ?>><div><a href="<?php echo $mob;?><?php echo list_url($v1['typeid']);?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v1['typename'];?></a></div></li>
<?php } } ?>
<?php } ?>
<?php } } ?>
</ul>
</div>
<div class="blank-35 bd-b"></div>
</div>
<?php if($action == 'my') { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<ul>
<li><span class="f_r" style="color:red;"><?php echo $v['credit'];?><?php echo $DT['credit_name'];?></span><a href="<?php echo str_replace($url, $mob, $v['linkurl']);?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><span class="f_r"><?php echo $v['status'];?></span><span><?php echo $v['adddate'];?></span></li>
</ul>
</div>
<?php } } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } else { ?>
<?php if($itemid) { ?>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info">有效期：<?php if($left) { ?><?php echo $fromdate;?> 至 <?php echo $todate;?><?php } else { ?><span class="f_red">已结束</span><?php } ?>&nbsp;&nbsp;点击：<?php echo $hits;?></div>
<div class="content">
会员权限：<?php if($gname) { ?><?php echo $gname;?><?php } else { ?>全部<?php } ?><br/>
所需<?php echo $DT['credit_name'];?>：<strong class="f_red"><?php echo $credit;?></strong><br/>
剩余名额：<strong><?php echo $left;?></strong><br/>
<div class="blank-16"></div>
<div class="btn-green" onclick="Order();">立即兑换</div>
<div class="blank-16"></div>
<?php if($large) { ?><img src="<?php echo $large;?>"/><br/><?php } ?><?php echo $content;?>
</div>
</div>
<script type="text/javascript">
<?php if(isset($success)) { ?>Dtoast('恭喜您，礼品兑换成功！');<?php } ?>
function Order() {
<?php if($process == 1) { ?>return confirm('抱歉，此兑换还没有开始');<?php } ?>
<?php if($process == 2) { ?>if(confirm('确定要兑换吗？系统将扣除您<?php echo $credit;?><?php echo $DT['credit_name'];?>')) Go('<?php echo $mob;?>index.php?action=order&itemid=<?php echo $itemid;?>')<?php } ?>
<?php if($process == 3) { ?>return confirm('抱歉，此兑换已经过期');<?php } ?>
<?php if($process == 4) { ?>return confirm('抱歉，此兑换名额用尽，已经结束');<?php } ?>
}
</script>
<?php } else { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<a href="<?php echo str_replace($url, $mob, $v['linkurl']);?>"><img src="<?php if($v['thumb']) { ?><?php echo str_replace('.thumb.', '.middle.', $v['thumb']);?><?php } else { ?><?php echo DT_MOB;?>static/img/80x60.png<?php } ?>" width="80" height="60" alt="" onerror="this.src='<?php echo DT_MOB;?>static/img/80x60.png';"/></a>
<ul>
<li><a href="<?php echo str_replace($url, $mob, $v['linkurl']);?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><span class="f_r"><?php echo $v['left'];?>库存</span><span style="color:red;"><?php echo $v['credit'];?><?php echo $DT['credit_name'];?></span></li>
</ul>
</div>
<?php } } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } ?>
<?php } ?>
<?php include template('footer');?>