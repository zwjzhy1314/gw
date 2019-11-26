<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php if($typeid) { ?><?php echo $TYPE[$typeid]['typename'];?><?php } else { ?>公告中心<?php } ?></div>
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
<?php if($itemid) { ?>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info"><?php echo $adddate;?>&nbsp;&nbsp;有效期：<?php echo $fromdate;?> 至 <?php echo $todate;?>&nbsp;&nbsp;点击：<?php echo $hits;?></div>
<div class="content"><?php echo $content;?></div>
</div>
<?php } else { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<ul>
<li><a href="<?php echo str_replace($url, $mob, $v['linkurl']);?>"<?php if($v['islink']) { ?> rel="external" target="_blank"<?php } ?>><strong><?php echo $v['title'];?></strong></a></li>
<li><span class="f_r"><?php echo $v['hits'];?>点击</span><span><?php echo $v['adddate'];?></span></li>
</ul>
</div>
<?php } } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } ?>
<?php include template('footer');?>