<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<style type="text/css">
.home-head {width:512px;height:84px;overflow:hidden;<?php if($background) { ?>background:#007AFF url('<?php echo $background;?>') no-repeat;<?php } else { ?>background:#007AFF url('<?php echo DT_MOB;?>static/img/home-background.png') no-repeat;background-size:512px 100px;<?php } ?>}
.home-head img {float:left;border:#FFFFFF 2px solid;border-radius:50%;margin:10px 10px 0 10px;}
.home-head ul {float:left;margin:16px 0 0 0;}
.home-head li {height:26px;line-height:26px;color:#FFFFFF;text-shadow:0 1px 1px #FAFAFA;}
.home-head strong {font-size:16px;font-weight:normal;}
.home-quick {height:70px;background:#FFFFFF;text-align:center;padding:15px 0;}
.home-quick li {width:25%;float:left;}
.home-quick img {width:46px;margin:0 0 6px 0;}
.home-quick span {display:block;font-size:12px;}
</style>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback('<?php echo $back_link;?>', '<?php echo $DT_REF;?>', '<?php echo $username;?>');" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<a href=&#34;<?php echo $MOD['mobile'];?>&#34; data-direction=&#34;reverse&#34;><span><?php echo $MOD['name'];?>首页</span></a>|<a href=&#34;<?php echo DT_MOB;?>channel.php&#34; data-direction=&#34;reverse&#34;><span>频道列表</span></a>', '取消');"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="home-head">
<?php if($logo) { ?><img src="<?php echo $logo;?>" width="60" height="60"/><?php } ?>
<ul>
<li><strong><?php echo $COM['company'];?></strong></li>
<li><?php if($COM['vip']) { ?><?php echo VIP;?><?php echo $COM['vip'];?> 第<?php echo $COM['year'];?>年<?php } else { ?>普通会员<?php } ?></li>
</ul>
</div>
<div class="home-quick">
<ul>
<li><a href="<?php echo userurl($username, 'file=introduce', $domain);?>"><img src="<?php echo DT_MOB;?>static/img/home-introduce.png" width="46" height="46"/><span><?php echo $_MENU['introduce'];?></span></a></li>
<li><a href="<?php echo userurl($username, 'file=news', $domain);?>"><img src="<?php echo DT_MOB;?>static/img/home-news.png" width="46" height="46"/><span><?php echo $_MENU['news'];?></span></a></li>
<li><a href="<?php echo userurl($username, 'file=credit', $domain);?>"><img src="<?php echo DT_MOB;?>static/img/home-credit.png" width="46" height="46"/><span><?php echo $_MENU['credit'];?></span></a></li>
<li><a href="<?php echo userurl($username, 'file=contact', $domain);?>"><img src="<?php echo DT_MOB;?>static/img/home-contact.png" width="46" height="46"/><span><?php echo $_MENU['contact'];?></span></a></li>
</ul>
</div>
<div class="list-set">
<ul>
<?php if(is_array($M)) { foreach($M as $i => $m) { ?>
<li><div<?php if($i==0) { ?> style="border:none;"<?php } ?>><a href="<?php echo $m['linkurl'];?>"><?php echo $m['name'];?></a></div></li>
<?php } } ?>
</ul>
</div>
<?php include template('footer', $template);?>