<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="promo"><a href="?action=index"><span>领券中心</span></a></td>
<td class="tab" id="my"><a href="?action=my"><span>我的优惠券</span></a></td>
</tr>
</table>
</div>
<?php if($action=='my') { ?>
<style type="text/css">
.list-coupon {display:table;margin:20px 0;}
.list-coupon div {width:240px;height:260px;overflow:hidden;float:left;border:#CCCCCC 1px solid;margin:0 20px 20px 0;text-align:center;}
.list-coupon h6 {height:80px;line-height:80px;overflow:hidden;margin:0;padding:0;font-weight:normal;font-size:30px;color:#FFFFFF;background:#74D2D4;}
.list-coupon h6 span {font-size:16px;}
.list-coupon b {display:block;width:100%;height:40px;line-height:40px;font-weight:normal;color:#FF6600;}
.list-coupon i {display:block;width:100%;height:40px;line-height:40px;font-style:normal;color:#007AFF;}
.list-coupon p {height:40px;line-height:40px;margin:20px 0 0 0;background:#7EA7CE;color:#FFFFFF;font-size:14px;}
.list-coupon div:hover p {background:#74D2D4;}
</style>
<div class="list-coupon">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div>
<h6><span><?php echo $DT['money_sign'];?></span><?php echo $v['price'];?></h6>
<b><?php if($v['cost']) { ?>满<?php echo $v['cost'];?>可用<?php } else { ?>不限消费金额<?php } ?></b>
<?php if($v['seller']) { ?>
<a href="<?php echo userurl($v['seller'], 'file=mall');?>" target="_blank"><i>店铺：<?php echo $v['seller'];?></i></a>
<?php } else { ?>
<i style="color:#FF0000;">全站通用</i>
<?php } ?>
<i style="color:#666666;"><?php echo timetodate($v['fromtime'], 3);?> - <?php echo timetodate($v['totime'], 3);?></i>
<?php if($v['oid']) { ?>
<a href="order.php?action=update&step=detail&itemid=<?php echo $v['oid'];?>" target="_blank"><p>已使用</p></a>
<?php } else if($v['fromtime'] > $DT_TIME) { ?>
<p>未开始</p>
<?php } else if($v['totime'] < $DT_TIME) { ?>
<p>已过期</p>
<?php } else { ?>
<a href="<?php if($v['seller']) { ?><?php echo userurl($v['seller'], 'file=mall');?><?php } else { ?><?php echo DT_PATH;?><?php } ?>" target="_blank"><p>立即使用</p></a>
<?php } ?>
</div>
<?php } } ?>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('coupon');m('my');</script>
<?php } else { ?>
<style type="text/css">
.list-promo {display:table;margin:20px 0;}
.list-promo div {width:220px;height:260px;overflow:hidden;float:left;border:#CCCCCC 1px solid;margin:0 20px 20px 0;text-align:center;}
.list-promo h6 {height:80px;line-height:80px;overflow:hidden;margin:0;padding:0;font-weight:normal;font-size:30px;color:#F23030;}
.list-promo h6 span {font-size:16px;}
.list-promo b {display:block;width:100%;height:40px;line-height:40px;font-weight:normal;color:#FF6600;}
.list-promo i {display:block;width:100%;height:40px;line-height:40px;font-style:normal;color:#007AFF;}
.list-promo p {height:40px;line-height:40px;margin:20px 0 0 0;background:#F21F4F;color:#FFFFFF;font-size:14px;}
.list-promo em {display:block;height:40px;line-height:40px;margin:20px 0 0 0;background:#CCCCCC;color:#FFFFFF;font-size:14px;font-style:normal;}
.list-promo div:hover {border:#1AAD19 1px solid;}
.list-promo div:hover p {background:#1AAD19;}
</style>
<div class="list-promo">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div>
<h6><span><?php echo $DT['money_sign'];?></span><?php echo $v['price'];?></h6>
<b><?php if($v['cost']) { ?>满<?php echo $v['cost'];?>可用<?php } else { ?>不限消费金额<?php } ?></b>
<?php if($v['username']) { ?>
<a href="<?php echo userurl($v['username'], 'file=mall');?>" target="_blank"><i>店铺：<?php echo $v['username'];?></i></a>
<?php } else { ?>
<i style="color:#FF0000;">全站通用</i>
<?php } ?>
<i style="color:#999999;">剩余<?php echo $v['left'];?>张</i>
<?php if(isset($gets[$v['itemid']])) { ?>
<em>已领取</em>
<?php } else { ?>
<a href="?action=get&itemid=<?php echo $v['itemid'];?>"><p>立即领取</p></a>
<?php } ?>
</div>
<?php } } ?>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('coupon');m('promo');</script>
<?php } ?>
<?php include template('footer', 'member');?>