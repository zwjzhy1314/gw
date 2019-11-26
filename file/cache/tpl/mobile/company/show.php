<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $member['company'];?></div>
<div class="head-bar-right">
<a href="<?php echo DT_MOB;?>"><img src="<?php echo DT_MOB;?>static/img/icon-index.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($content) { ?>
<div class="main">
<div class="content"><?php echo $content;?></div>
</div>
<?php } ?>
<div class="main">
<div class="content">
公司名称：<?php echo $member['company'];?><br/>
公司地址：<a href="<?php echo DT_MOB;?>api/address.php?auth=<?php echo encrypt($member['address'].'|'.$member['company'], DT_KEY.'MAP');?>" rel="external" target="_blank"><?php echo $member['address'];?></a><br/>
<?php if($member['postcode']) { ?>
邮政编码：<?php echo $member['postcode'];?><br/>
<?php } ?>
公司电话：<a href="tel:<?php echo $member['telephone'];?>"><?php echo $member['telephone'];?></a><br/>
<?php if($member['fax']) { ?>
公司传真：<?php echo $member['fax'];?><br/>
<?php } ?>
<?php if($member['mail']) { ?>
电子邮件：<a href="mailto:<?php echo $member['mail'];?>"><?php echo $member['mail'];?></a><br/>
<?php } ?>
<?php if($member['homepage']) { ?>
公司网址：<a href="<?php echo $member['homepage'];?>" rel="external" target="_blank"><?php echo $member['homepage'];?></a><br/>
<?php } ?>
<?php if($member['truename']) { ?>
联 系 人：<?php echo $member['truename'];?> （<?php if($member['gender']==1) { ?>先生<?php } else { ?>女士<?php } ?>）<br/>
<?php } ?>
<?php if($member['department']) { ?>
部门(职位)：<?php echo $member['department'];?><?php if($member['career']) { ?> （<?php echo $member['career'];?>）<?php } ?><br/>
<?php } ?>
<?php if($member['mobile']) { ?>
手机号码：<a href="tel:<?php echo $member['mobile'];?>"><?php echo $member['mobile'];?></a><br/>
<?php } ?>
在线状态：<?php if(online($member['userid'])==1) { ?><span class="f_red">在线</span><?php } else { ?><span class="f_gray">离线</span><?php } ?> <a href="<?php echo $MODULE['2']['mobile'];?>message.php?action=send&touser=<?php echo $member['username'];?>" class="b">发送消息</a><?php if($DT['im_web']) { ?> <a href="<?php echo $MODULE['2']['mobile'];?>chat.php?touser=<?php echo $member['username'];?>" class="b">在线交谈</a><?php } ?><br/>
<?php if($member['qq'] && $DT['im_qq']) { ?>QQ:<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $member['qq'];?>&site=qq&menu=yes" target="_blank" rel="external"><?php echo $member['qq'];?></a><br/><?php } ?>
<?php if($member['wx'] && $DT['im_wx']) { ?>微信:<a href="<?php echo DT_MOB;?>api/wx.php?wid=<?php echo $member['wx'];?>&username=<?php echo $member['username'];?>" target="_blank" rel="external"><?php echo $member['wx'];?></a><br/><?php } ?>
<?php if($member['ali'] && $DT['im_ali']) { ?>阿里旺旺:<a href="http://amos.alicdn.com/msg.aw?v=2&uid=<?php echo $member['ali'];?>&site=cnalichn&s=6&charset=UTF-8" target="_blank" rel="external"><?php echo $member['ali'];?></a><br/><?php } ?>
<?php if($member['skype'] && $DT['im_skype']) { ?>Skype:<?php echo $member['skype'];?><br/><?php } ?>
<?php if($member['type']) { ?>公司类型：<?php echo $member['type'];?><br/><?php } ?>
<?php if($member['mode']) { ?>经营模式：<?php echo $member['mode'];?><br/><?php } ?>
<?php if($member['size']) { ?>公司规模：<?php echo $member['size'];?><br/><?php } ?>
<?php if($member['capital']) { ?>注册资本：<?php echo $member['capital'];?>万<?php echo $member['regunit'];?><br/><?php } ?>
<?php if($member['regyear']) { ?>注册年份：<?php echo $member['regyear'];?><br/><?php } ?>
<?php if($member['sell']) { ?>销售产品：<?php echo $member['sell'];?><br/><?php } ?>
<?php if($member['buy']) { ?>采购产品：<?php echo $member['buy'];?><br/><?php } ?>
</div>
</div>
<?php include template('footer');?>