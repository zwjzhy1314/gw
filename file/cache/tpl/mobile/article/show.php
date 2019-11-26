<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<a href=&#34;<?php echo DT_MOB;?>api/share.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&#34; data-transition=&#34;slideup&#34;><span>分享好友</span></a>|<a href=&#34;<?php echo $MOD['mobile'];?>&#34; data-direction=&#34;reverse&#34;><span><?php echo $MOD['name'];?>首页</span></a>|<a href=&#34;<?php echo DT_MOB;?>channel.php&#34; data-direction=&#34;reverse&#34;><span>频道列表</span></a>', '取消');"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<?php if($islink) { ?>
<div class="info"><?php echo $editdate;?></div>
<div class="content"><a href="<?php echo $linkurl;?>" rel="external" class="b"><?php echo $linkurl;?></a><br/></div>
<?php } else { ?>
<div class="info"><?php echo $editdate;?><?php if($MOD['hits']) { ?>&nbsp;&nbsp;浏览:<span id="hits"><?php echo $hits;?></span><?php } ?></div>
<div class="content">
<?php if($user_status == 3) { ?>
<?php echo $content;?>
<?php } else { ?>
<?php include template('content', 'chip');?>
<?php } ?>
</div>
<?php if($MOD['fee_award']) { ?>
<div class="award"><a href="<?php echo $MODULE['2']['mobile'];?>award.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>" rel="external"><div>打赏</div></a></div>
<?php } ?>
<?php } ?>
</div>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('comment', 'chip');?>
<?php include template('footer');?>