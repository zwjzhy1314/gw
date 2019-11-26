<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($user_status == 3) { ?>
<?php if($member) { ?>
公司:<a href="<?php echo userurl($member['username']);?>" rel="external"><?php echo $member['company'];?></a><br/>
状态:<?php if(online($member['userid'])==1) { ?><span class="f_red">在线</span><?php } else { ?><span class="f_gray">离线</span><?php } ?> <a href="<?php echo $MODULE['2']['mobile'];?>message.php?action=send&touser=<?php echo $member['username'];?>" rel="external" class="b">发送信件</a><?php if($DT['im_web']) { ?> <a href="<?php echo $MODULE['2']['mobile'];?>chat.php?touser=<?php echo $member['username'];?>" rel="external" class="b">在线交谈</a><?php } ?><br/>
<?php if($member['truename']) { ?>姓名:<?php echo $member['truename'];?>(<?php echo gender($member['gender']);?>)<br/><?php } ?>
<?php if($member['career']) { ?>职位:<?php echo $member['career'];?><br/><?php } ?>
<?php if($member['telephone']) { ?>电话:<a href="tel:<?php echo $member['telephone'];?>"><?php echo $member['telephone'];?></a><br/><?php } ?>
<?php if($member['mobile']) { ?>手机:<a href="tel:<?php echo $member['mobile'];?>"><?php echo $member['mobile'];?></a><br/><?php } ?>
<?php if($member['fax']) { ?>传真:<?php echo $member['fax'];?><br/><?php } ?>
<?php if($member['areaid']) { ?>地区:<?php echo area_pos($member['areaid'], '-');?><br/><?php } ?>
<?php if($member['address']) { ?>地址:<a href="<?php echo DT_MOB;?>api/address.php?auth=<?php echo encrypt($member['address'].'|'.$member['company'], DT_KEY.'MAP');?>" rel="external" target="_blank"><?php echo $member['address'];?></a><br/><?php } ?>
<?php if($member['postcode']) { ?>邮编:<?php echo $member['postcode'];?><br/><?php } ?>
<?php if($member['mail']) { ?>邮件:<a href="mailto:<?php echo $member['mail'];?>"><?php echo $member['mail'];?></a><br/><?php } ?>
<?php if($member['qq'] && $DT['im_qq']) { ?>QQ:<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $member['qq'];?>&site=qq&menu=yes" target="_blank" rel="external"><?php echo $member['qq'];?></a><br/><?php } ?>
<?php if($member['wx'] && $DT['im_wx']) { ?>微信:<a href="<?php echo DT_MOB;?>api/wx.php?wid=<?php echo $member['wx'];?>&username=<?php echo $member['username'];?>" target="_blank" rel="external"><?php echo $member['wx'];?></a><br/><?php } ?>
<?php if($member['ali'] && $DT['im_ali']) { ?>阿里旺旺:<a href="http://amos.alicdn.com/msg.aw?v=2&uid=<?php echo $member['ali'];?>&site=cnalichn&s=6&charset=UTF-8" target="_blank" rel="external"><?php echo $member['ali'];?></a><br/><?php } ?>
<?php if($member['skype'] && $DT['im_skype']) { ?>Skype:<?php echo $member['skype'];?><?php } ?>
<?php } else { ?>
公司:<?php echo $item['company'];?> （未注册）<br/>
<?php if($item['truename']) { ?>姓名:<?php echo $item['truename'];?><br/><?php } ?>
<?php if($item['telephone']) { ?>电话:<a href="tel:<?php echo $item['telephone'];?>"><?php echo $item['telephone'];?></a><br/><?php } ?>
<?php if($item['mobile']) { ?>手机:<a href="tel:<?php echo $item['mobile'];?>"><?php echo $item['mobile'];?></a><br/><?php } ?>
<?php if($item['areaid']) { ?>地区:<?php echo area_pos($item['areaid'], '-');?><br/><?php } ?>
<?php if($item['address']) { ?>地址:<a href="<?php echo DT_MOB;?>api/address.php?auth=<?php echo encrypt($item['address'].'|'.$item['company'], DT_KEY.'MAP');?>" rel="external" target="_blank"><?php echo $item['address'];?></a><br/><?php } ?>
<?php if($item['email']) { ?>邮件:<a href="mailto:<?php echo $item['email'];?>"><?php echo $item['email'];?></a><br/><?php } ?>
<?php if($item['qq'] && $DT['im_qq']) { ?>QQ:<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $item['qq'];?>&site=qq&menu=yes" target="_blank" rel="external"><?php echo $item['qq'];?></a><br/><?php } ?>
<?php if($item['wx'] && $DT['im_wx']) { ?>微信:<a href="<?php echo DT_MOB;?>api/wx.php?wid=<?php echo $item['wx'];?>&username=<?php echo $item['username'];?>" target="_blank" rel="external"><?php echo $item['wx'];?></a><br/><?php } ?>
<?php if($item['ali'] && $DT['im_ali']) { ?>阿里旺旺:<a href="http://amos.alicdn.com/msg.aw?v=2&uid=<?php echo $item['ali'];?>&site=cnalichn&s=6&charset=UTF-8" target="_blank" rel="external"><?php echo $item['ali'];?></a><br/><?php } ?>
<?php if($item['skype'] && $DT['im_skype']) { ?>Skype:<?php echo $item['skype'];?><?php } ?>
<?php } ?>
<?php } else if($user_status == 2) { ?>
<div style="padding:16px;line-height:200%;">
查看联系方式需支付 <strong><?php echo $fee;?></strong> <?php echo $fee_unit;?><br/>
<?php echo $fee_name;?>余额:<?php if($currency == 'money') { ?><?php echo $_money;?><?php } else { ?><?php echo $_credit;?><?php } ?><?php echo $fee_unit;?> <a href="<?php echo $MODULE['2']['mobile'];?>" class="b">我的账户</a><br/>
<a href="<?php echo $MODULE['2']['mobile'];?>pay.php?mid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>" rel="external"><div class="btn-green">立即支付</div></a><br/><br/>
</div>
<?php } else if($user_status == 1) { ?>
<br/><br/><center>
无权查看，请升级会员级别<br/>
<?php if($DT['telephone']) { ?>咨询电话：<a href="tel:<?php echo $DT['telephone'];?>"><?php echo $DT['telephone'];?></a><br/><?php } ?>
</center><br/><br/>
<?php } else if($user_status == 0) { ?>
<br/><br/><center><a href="<?php echo $MODULE['2']['mobile'];?><?php echo $DT['file_login'];?>" class="b" data-transition="slideup">请登录查看</a></center><br/><br/>
<?php } else { ?>
<div id="contact"><div style="height:100px;background:#FFFFFF url('<?php echo DT_MOB;?>static/img/spinner.gif') no-repeat center center;background-size:16px 16px;" onclick="$.getScript('<?php echo DT_MOB;?>api/task.js.php?<?php echo $destoon_task;?>');"></div></div>
<script type="text/javascript">
$(function(){
$.getScript('<?php echo DT_MOB;?>api/task.js.php?<?php echo $destoon_task;?>');
});
</script>
<?php } ?>