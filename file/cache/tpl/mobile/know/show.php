<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<?php if($could_answer) { ?><a href=&#34;<?php echo $MODULE['2']['mobile'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&action=add&job=answer&itemid=<?php echo $itemid;?>&#34; rel=&#34;external&#34;><span>我来回答</span></a>|<?php } ?><a href=&#34;<?php echo $MURL;?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&action=add&cid=<?php echo $catid;?>&#34; rel=&#34;external&#34;><span>我要提问</span></a>|<a href=&#34;<?php echo DT_MOB;?>api/share.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&#34; data-transition=&#34;slideup&#34;><span>分享好友</span></a>|<a href=&#34;<?php echo $MOD['mobile'];?>&#34; data-direction=&#34;reverse&#34;><span><?php echo $MOD['name'];?>首页</span></a>|<a href=&#34;<?php echo DT_MOB;?>channel.php&#34; data-direction=&#34;reverse&#34;><span>频道列表</span></a>', '取消');"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info"><?php if($MOD['hits']) { ?>关注:<?php echo $hits;?>&nbsp;&nbsp;<?php } ?>答案:<?php echo $answer;?>&nbsp;&nbsp;悬赏:<?php echo $credit;?></div>
<?php if($process == 1 || $process == 2) { ?>
<div class="info" style="padding-top:16px;">离问题结束还有<?php echo secondstodate($totime-$DT_TIME);?></div>
<?php } else if($process == 3) { ?>
<div class="info" style="padding-top:16px;">解决时间 <?php echo timetodate($updatetime, 5);?></div>
<?php } ?>
<?php if($page == 1) { ?>
<div class="list-user">
<img src="<?php echo useravatar($hidden ? '' : $username);?>" width="32" height="32"/>
<ul>
<li><span><?php echo $PROCESS[$process];?></span><?php if($hidden) { ?>匿名<?php } else { ?><?php echo $passport;?><?php } ?></li>
<li><em><?php echo $editdate;?></em></li>
</ul>
</div>
<div class="content">
<?php echo $content;?>
<?php if($addition) { ?>
<strong>问题补充：</strong><br/>
<?php echo nl2br($addition);?>
<?php } ?>
</div>
<div class="head bd-b"><strong>最佳答案</strong></div>
<?php if($user_status == 3 && $best) { ?>
<div class="list-user">
<img src="<?php echo useravatar($best['hidden'] ? '' : $best['username']);?>" width="32" height="32"/>
<ul>
<li><span><?php if($expert) { ?>专家<?php } ?></span><?php if($best['hidden']) { ?>匿名<?php } else { ?><?php echo $best['passport'];?><?php } ?></li>
<li><em><?php echo timetodate($best['addtime'], 5);?></em></li>
</ul>
</div>
<?php } ?>
<div class="content">
<?php if($best) { ?>
<?php if($user_status == 3) { ?>
<?php echo nl2br($best['content']);?>
<?php } else { ?>
<?php include template('content', 'chip');?>
<?php } ?>
<?php if($MOD['fee_award']) { ?>
<div class="award"><a href="<?php echo $MODULE['2']['mobile'];?>award.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>" rel="external"><div>打赏</div></a></div>
<?php } ?>
<?php } else { ?>
暂无最佳答案<?php if($could_answer) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $MODULE['2']['mobile'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&action=add&job=answer&itemid=<?php echo $itemid;?>" rel="external" class="b">我来回答</a><?php } ?>
<?php } ?>
</div>
<?php } ?>
<?php if($answers) { ?>
<div class="head bd-b"><strong>全部回答</strong></div>
<?php if(is_array($answers)) { foreach($answers as $k => $v) { ?>
<div class="list-user">
<img src="<?php echo useravatar($v['hidden'] ? '' : $v['username']);?>" width="32" height="32"/>
<ul>
<li><span><?php echo $v['floor'];?>楼</span><?php if($v['hidden']) { ?>匿名<?php } else { ?><?php if($v['username']) { ?><?php echo $v['passport'];?><?php } else { ?><?php echo ip2area($item['ip']);?>访客<?php } ?><?php } ?></li>
<li><em><?php echo timetodate($v['addtime'], 5);?></em></li>
</ul>
</div>
<div class="content"><?php echo $v['content'];?></div>
<?php } } ?>
<?php } ?>
</div>
<?php include template('footer');?>