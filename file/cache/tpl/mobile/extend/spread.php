<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">排名推广</div>
<div class="head-bar-right">
<a href="<?php echo $MODULE['2']['mobile'];?>spread.php" rel="external"><span>我的</span></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($action=='list') { ?>
<div class="blank-35"></div>
<div class="list-set">
<ul>
<li><div><span><a href="./" class="b">重新选词</a></span><b class="f_red"><?php echo $kw;?></b><?php if($mid) { ?>在<b class="f_red"><?php echo $MODULE[$mid]['name'];?></b>频道<?php } ?>推广记录</div></li>
</ul>
</div>
<div class="blank-35 bd-b"></div>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($v['bg']) { ?>
<div class="blank-35 bd-b"></div>
<?php } ?>
<div class="list-img">
<ul>
<li><span class="f_r"><?php echo $v['price'];?><?php if($v['currency']=='money') { ?><?php echo $DT['money_unit'];?><?php } else { ?><?php echo $DT['credit_unit'];?><?php } ?></span><a href="<?php echo userurl($v['username']);?>" rel="external"><strong><?php echo $v['company'];?></strong></a></li>
<li><span class="f_r"><a href="<?php echo $MODULE['2']['mobile'];?>spread.php?action=list&mid=<?php echo $v['mid'];?>&kw=<?php echo urlencode($kw);?>" rel="external" class="b">立即推广</a></span><span>[<?php echo $MODULE[$v['mid']]['name'];?>] <?php echo timetodate($v['fromtime'], 3);?>/<?php echo timetodate($v['totime'], 3);?> <?php echo strip_tags($v['process']);?></span></li>
</ul>
</div>
<?php } } ?>
<?php } else { ?>
<div class="main content">
<br/><br/><center>暂无推广记录<br/><br/><br/><br/><a href="<?php echo $MODULE['2']['mobile'];?>spread.php?action=list&mid=<?php echo $mid;?>&kw=<?php echo urlencode($kw);?>" rel="external"><div class="btn-green">我要推广</div></a></center><br/><br/><br/><br/>
</div>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } else { ?>
<div class="ui-form">
<form action="<?php echo $mob;?>index.php">
<div class="blank-20"></div>
<div><input type="search" name="kw" value="<?php echo $kw;?>" placeholder="输入关键词开始推广"/></div>
<div class="blank-20"></div>
</form>
</div>
<?php $tags=tag("table=spread&condition=status=3 and company<>''&pagesize=20&order=addtime desc&template=null");?>
<?php if($tags) { ?>
<div class="list-set">
<ul>
<li onclick="$('#spreads').slideToggle(300);"><div>最新推广</div></li>
</ul>
</div>
<div id="spreads">
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<div class="list-img">
<ul>
<li><span class="f_r" style="color:red;"><?php echo $t['price'];?><?php echo $unit;?></span><a href="<?php echo rewrite('list.php?kw='.urlencode($t['word']));?>"><strong><?php echo $t['word'];?></strong></a></li>
<li><span class="f_r"><?php echo timetodate($t['addtime'], 5);?></span><span><?php echo $t['company'];?></span></li>
</ul>
</div>
<?php } } ?>
</div>
<?php } ?>
<?php } ?>
<?php include template('footer');?>