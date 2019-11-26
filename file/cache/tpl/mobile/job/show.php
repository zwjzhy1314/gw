<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<?php if($username) { ?><a href=&#34;<?php echo $MOD['mobile'];?><?php echo rewrite('apply.php?itemid='.$itemid);?>&#34; data-transition=&#34;slideup&#34;><span>职位申请</span></a>|<?php } ?><a href=&#34;<?php echo DT_MOB;?>api/share.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&#34; data-transition=&#34;slideup&#34;><span>分享好友</span></a>|<a href=&#34;<?php echo $MOD['mobile'];?>&#34; data-direction=&#34;reverse&#34;><span><?php echo $MOD['name'];?>首页</span></a>|<a href=&#34;<?php echo DT_MOB;?>channel.php&#34; data-direction=&#34;reverse&#34;><span>频道列表</span></a>', '取消');"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info"><?php echo $editdate;?><?php if($MOD['hits']) { ?>&nbsp;&nbsp;浏览:<span id="hits"><?php echo $hits;?></span><?php } ?></div>
<div class="content">
<?php if(!$username) { ?><span style="color:red;">非会员信息</span><br/><?php } ?>
<?php if($vip) { ?><?php echo VIP;?>:<?php echo $vip;?>级<br/><?php } ?>
行业:<?php echo $CATEGORY[$parentid]['catname'];?><br/>
职位:<?php echo $CATEGORY[$catid]['catname'];?><br/>
部门:<?php echo $department;?><br/>
人数:<?php if($total) { ?><?php echo $total;?>人<?php } else { ?>若干<?php } ?><br/>
地区:<?php echo area_pos($areaid, '');?><br/>
性质:<?php echo $TYPE[$type];?><br/>
性别:<?php echo $GENDER[$gender];?><br/>
婚姻:<?php echo $MARRIAGE[$marriage];?><br/>
学历:<?php echo $EDUCATION[$education];?><br/>
经验:<?php if($experience) { ?><?php echo $experience;?>年以上<?php } else { ?>不限<?php } ?><br/>
年龄:<?php if($minage && $maxage) { ?><?php echo $minage;?>-<?php echo $maxage;?>岁<?php } else if($minage) { ?><?php echo $minage;?>岁以上<?php } else if($maxage) { ?><?php echo $maxage;?>岁以内<?php } else { ?>不限年龄<?php } ?><br/>
待遇:<?php if($minsalary && $maxsalary) { ?><?php echo $minsalary;?>-<?php echo $maxsalary;?><?php echo $DT['money_unit'];?>/月<?php } else if($minsalary) { ?><?php echo $minsalary;?><?php echo $DT['money_unit'];?>/月以上<?php } else if($maxsalary) { ?><?php echo $maxsalary;?><?php echo $DT['money_unit'];?>/月以内<?php } else { ?>面议<?php } ?><br/>
<?php echo $content;?>
<?php if($username) { ?>
<a href="<?php echo $MOD['mobile'];?><?php echo rewrite('apply.php?itemid='.$itemid);?>" data-transition="slideup"><div class="btn-blue" style="margin:10px 0;">职位申请</div></a>
<?php } ?>
</div>
<div class="head bd-b"><strong>联系方式</strong></div>
<div class="contact"><?php include template('contact', 'chip');?></div>
</div>
<?php include template('comment', 'chip');?>
<?php include template('footer');?>