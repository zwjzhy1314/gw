<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php if($typeid) { ?><?php echo $TYPE[$typeid];?><?php } else { ?>广告中心<?php } ?></div>
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
<li><div><a href="<?php echo $MODULE['2']['mobile'];?>ad.php" rel="external">我的广告</a></div></li>
<?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<?php if($k) { ?><li<?php if($typeid==$k) { ?> style="background:#F6F6F6;"<?php } ?>><div><a href="<?php echo $mob;?><?php echo list_url($k);?>"><?php echo $v;?></a></div></li><?php } ?>
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
<img src="<?php echo $middle;?>"/><br/>
<?php echo $content;?>
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
<ul>
<li><span class="f_r"><?php echo $v['typename'];?></span><a href="<?php echo $mob;?><?php echo show_url($v['pid']);?>" rel="external"><strong><?php echo $v['name'];?></strong></a></li>
<li><span class="f_r"><?php if($MOD['ad_buy']) { ?><a href="<?php echo $MODULE['2']['mobile'];?>ad.php?action=add&pid=<?php echo $v['pid'];?>" class="b" rel="external">预定</a><?php } else { ?><?php echo $v['width'];?> x <?php echo $v['height'];?><?php } ?></span><span style="color:red;"><?php if($v['price']) { ?><?php echo $v['price'];?><?php echo $unit;?>/月<?php } else { ?>面议<?php } ?></span></li>
</ul>
</div>
<?php } } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } ?>
<?php } ?>
<?php include template('footer');?>