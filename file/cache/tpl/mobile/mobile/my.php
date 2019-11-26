<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-title">我的</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="blank-20"></div>
<div class="user-info">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<?php if($_userid) { ?>
<td style="width:100px;height:84px;"><a href="<?php echo $MODULE['2']['mobile'];?>avatar.php"><img src="<?php echo useravatar($_username, 'large');?>" style="width:64px;height:64px;margin:0 16px;"/></a></td>
<td><?php if($_truename) { ?><a href="<?php echo $MODULE['2']['mobile'];?>" style="width:100%;display:block;"><strong><?php echo $_truename;?></strong><?php } else { ?><a href="<?php echo $MODULE['2']['mobile'];?>edit.php" style="width:100%;display:block;"><strong>未填写姓名</strong><?php } ?><br/>
帐号：<?php echo $_username;?></a></td>
<?php } else { ?>
<td style="width:100px;height:84px;"><a href="<?php echo $MODULE['2']['mobile'];?><?php echo $DT['file_login'];?>" data-transition="slideup"><img src="<?php echo useravatar($_username, 'large');?>"  style="width:64px;height:64px;margin:0 16px;"/></a></td>
<td><a href="<?php echo $MODULE['2']['mobile'];?><?php echo $DT['file_login'];?>" style="width:100%;display:block;" data-transition="slideup"><strong>未登录</strong><br/>
按此登录或注册</a></td>
<?php } ?>
</tr>
</table>
</div>
<?php if($_userid) { ?>
<div class="blank-20"></div>
<div class="list-set list-set-img">
<ul>
<li><div><?php if($_message) { ?><em><?php echo $_message;?></em><?php } ?><img src="<?php echo DT_MOB;?>static/img/my-message.png" width="24" height="24"/><a href="<?php echo $MODULE['2']['mobile'];?>message.php" rel="external">站内信件</a></div></li>
<?php if($DT['im_web']) { ?>
<li><div><?php if($_chat) { ?><em><?php echo $_chat;?></em><?php } ?><img src="<?php echo DT_MOB;?>static/img/my-chat.png" width="24" height="24"/><a href="<?php echo $MODULE['2']['mobile'];?>im.php" rel="external">站内交谈</a></div></li>
<?php } ?>
<?php if($DT['max_cart']) { ?>
<li><div><?php if($_cart) { ?><em><?php echo $_cart;?></em><?php } ?><img src="<?php echo DT_MOB;?>static/img/my-cart.png" width="24" height="24"/><a href="<?php echo $MODULE['2']['mobile'];?>cart.php" rel="external">购物车</a></div></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<div class="blank-20"></div>
<div class="list-set list-set-img">
<ul>
<li><div><img src="<?php echo DT_MOB;?>static/img/my-member.png" width="24" height="24"/><a href="<?php echo $MODULE['2']['mobile'];?>">会员中心</a></div></li>
<li><div><img src="<?php echo DT_MOB;?>static/img/my-info.png" width="24" height="24"/><a href="<?php echo $MODULE['2']['mobile'];?><?php echo $DT['file_my'];?>">信息管理</a></div></li>
<li><div><img src="<?php echo DT_MOB;?>static/img/my-biz.png" width="24" height="24"/><a href="<?php echo $MODULE['2']['mobile'];?>biz.php">商户后台</a></div></li>
</ul>
</div>
<?php include template('footer');?>