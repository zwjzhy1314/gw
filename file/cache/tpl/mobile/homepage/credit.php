<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main">
<div class="content">
公司名称：<?php echo $COM['company'];?><br/>
公司类型：<?php echo $COM['type'];?> (<?php echo $COM['mode'];?>)<br/>
所在地区：<?php echo area_pos($COM['areaid'], '/');?><br/>
公司规模：<?php echo $COM['size'];?><br/>
注册资本：<?php if($COM['capital']) { ?><?php echo $COM['capital'];?>万<?php echo $COM['regunit'];?><?php } else { ?>未填写<?php } ?><br/>
注册年份：<?php echo $COM['regyear'];?><br/>
资料认证：<?php if($COM['validated']) { ?>企业资料<span class="f_green">通过<?php echo $COM['validator'];?></span>认证<?php } ?><br/>
<?php if($COM['vcompany']) { ?>工商认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['vtruename']) { ?>实名认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['vbank']) { ?>银行帐号认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['vmobile']) { ?>手机认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['vemail']) { ?>邮件认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['deposit']) { ?>
保&nbsp;&nbsp;证&nbsp;&nbsp;金：已缴纳 <strong class="f_green"><?php echo $DT['money_sign'];?><?php echo $COM['deposit'];?></strong> <?php echo $DT['money_unit'];?><br/>
<?php } ?>
<?php if($COM['mode']) { ?>
经营模式：<?php echo $COM['mode'];?><br/>
<?php } ?>
<?php if($COM['business']) { ?>
经营范围：<?php echo $COM['business'];?><br/>
<?php } ?>
<?php if($COM['sell']) { ?>
销售产品：<?php echo $COM['sell'];?><br/>
<?php } ?>
<?php if($COM['buy']) { ?>
采购产品：<?php echo $COM['buy'];?>
<?php } ?>
</div>
</div>
<?php include template('footer', $template);?>