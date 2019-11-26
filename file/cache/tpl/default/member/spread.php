<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?action=list"><span>购买排名</span></a></td>
<td class="tab" id="s3"><a href="?action=index"><span>已通过(<?php echo $nums['3'];?>)</span></a></td>
<td class="tab" id="s2"><a href="?status=2"><span>审核中(<?php echo $nums['2'];?>)</span></a></td>
<td class="tab"><a href="<?php echo $EXT['spread_url'];?>"><span>推广中心</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'add') { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="word" value="<?php echo $word;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">关键词</td>
<td class="tr"><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($word));?>" class="b" target="_blank"><?php echo $word;?></a></td>
</tr>
<tr>
<td class="tl">所属频道</td>
<td class="tr"><a href="<?php echo $MODULE[$mid]['linkurl'];?>" class="b" target="_blank"><?php echo $MODULE[$mid]['name'];?></a></td>
</tr>
<tr>
<td class="tl">最低出价</td>
<td class="tr f_red"><?php echo $price;?><?php echo $unit;?></td>
</tr>
<tr>
<td class="tl">加价幅度</td>
<td class="tr"><?php if($step) { ?><?php echo $step;?><?php echo $unit;?><?php } else { ?>不限<?php } ?></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 我的出价</td>
<td class="tr"><input type="text" name="buy_price" value="<?php echo $price;?>" size="10" id="price" onkeyup="CA();"/> <span id="dprice" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 购买时长</td>
<td class="tr">
<select name="buy_month" id="month" onchange="CA();">
<?php for($i=1;$i<=$month;$i++){?>
<option value="<?php echo $i;?>"><?php echo $i;?>月</option>
<?php }?>
</select>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 信息ID</td>
<td class="tr">
<input type="text" name="buy_tid" value="<?php if($mid==4) { ?><?php echo $_userid;?><?php } ?>" size="10" id="key_id" onfocus="select_item(<?php echo $mid;?>, 'member');"/> <span id="dkey_id" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">应付总额</td>
<td class="tr"><span id="money" class="f_price px16"><?php echo $price;?></span><?php echo $unit;?></td>
</tr>
<?php if($currency == 'money') { ?>
<tr id="mymoney" style="display:none;">
<td class="tl">账户余额</td>
<td class="tr"><span class="f_blue"><?php echo $_money;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr id="payword" style="display:none;">
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?>&nbsp;<span id="dpassword" class="f_red"></span></td>
</tr>
<tr id="paytype" style="display:none;">
<td class="tl"><span class="f_red">*</span> 支付方式</td>
<td class="tr">
<table cellspacing="5" cellpadding="5">
<?php $PAYLIST = get_paylist();?>
<input type="hidden" name="bank" id="bank" value="<?php echo $PAYLIST['0']['bank'];?>"/>
<?php if(is_array($PAYLIST)) { foreach($PAYLIST as $k => $v) { ?>
<tr onclick="$('#bank').val($('#paytype :checked').val());">
<td><input type="radio" name="bank" value="<?php echo $v['bank'];?>" id="bank-<?php echo $v['bank'];?>"<?php if($k==0) { ?> checked<?php } ?>/></td>
<td><label for="bank-<?php echo $v['bank'];?>" class="c_p"><img src="<?php echo DT_PATH;?>api/pay/<?php echo $v['bank'];?>/logo.gif" alt=""/></label></td>
<td><?php if($v['percent']>0) { ?>手续费 <?php echo $v['percent'];?>%<?php } ?></td>
</tr>
<?php } } ?>
</table>
</td>
</tr>
<?php } else { ?>
<tr>
<td class="tl"><?php echo $DT['credit_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_credit;?><?php echo $unit;?></span>&nbsp;&nbsp;<a href="credit.php?action=buy" target="_blank" class="t">[购买]</a></td>
</tr>
<?php } ?>
<tr>
<td class="tl"> </td>
<td class="tr"><input type="submit" name="submit" value="确定购买" class="btn_g"/>&nbsp;
<input type="button" value="重新选择" class="btn" onclick="Go('?action=list&mid=<?php echo $mid;?>&kw=<?php echo urlencode($word);?>');"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">s('spread');m('add');</script>
<?php } else if($action == 'list') { ?>
<form action="?" onsubmit="return check();">
<input type="hidden" name="action" value="add"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 关键词：</td>
<td class="tr"><input type="text" name="kw" size="20" id="kw" value="<?php echo $kw;?>"/> <span id="dkw" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 频道：</td>
<td class="tr">
<select name="mid">
<?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?>
<?php if($m['moduleid'] > 3 && !$m['islink']) { ?><option value="<?php echo $m['moduleid'];?>"<?php if($mid==$m['moduleid']) { ?> selected<?php } ?>><?php echo $m['name'];?></option><?php } ?>
<?php } } ?>
</select>
</td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr"><input type="submit" value="下一步" class="btn_g"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('kw').value.length < 2) {
Dmsg('请填写关键词', 'kw');
return false;
}
return true;
}
</script>
<script type="text/javascript">s('spread');m('add');</script>
<?php } else { ?>
<div class="ls">
<table cellpadding="10" cellspacing="0" class="tb">
<tr>
<th>关键词</th>
<th>模块</th>
<th>出价</th>
<th>单位</th>
<th>开始日期</th>
<th>结束日期</th>
<th>剩余(天)</th>
<th>投放状态</th>
<th>申请时间</th>
<th>信息</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center">
<td><a href="<?php echo $EXT['spread_url'];?><?php echo rewrite('index.php?kw='.urlencode($v['word']));?>" target="_blank" class="b"><?php echo $v['word'];?></a></td>
<td><a href="<?php echo $MODULE[$v['mid']]['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($v['word']));?>" target="_blank" class="b"><?php echo $MODULE[$v['mid']]['name'];?></a></td>
<td><?php echo $v['price'];?></td>
<td><?php if($v['currency']=='money') { ?><?php echo $DT['money_unit'];?><?php } else { ?><?php echo $DT['credit_unit'];?><?php } ?></td>
<td><?php echo timetodate($v['fromtime'], 3);?></td>
<td><?php echo timetodate($v['totime'], 3);?></td>
<td<?php if($v['days']<5) { ?> class="f_red"<?php } ?>><?php echo $v['days'];?></td>
<td><?php echo $v['process'];?></td>
<td class="f_gray"><?php echo timetodate($v['addtime'], 5);?></td>
<td><a href="<?php echo DT_PATH;?>api/redirect.php?mid=<?php echo $v['mid'];?>&itemid=<?php echo $v['tid'];?>" target="_blank" class="b">直达</a></td>
</tr>
<?php } } ?>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('spread');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php if($action == 'add') { ?>
<script type="text/javascript">
function CA() {
if(Dd('price').value.match(/^[0-9]{1,}$/)) {
Dd('money').innerHTML = Dd('price').value*Dd('month').value;
} else {
Dd('price').value = '<?php echo $price;?>';
}
}
function check() {
var p = Dd('price').value;
if(p < <?php echo $price;?>) {
Dmsg('出价不能低于起价', 'price');
return false;
}
if((p-<?php echo $price;?>)%<?php echo $step;?> != 0) {
Dmsg('请按加价幅度加价', 'price');
return false;
}
if(Dd('key_id').value.length < 1) {
Dmsg('请填写信息ID', 'key_id');
return false;
}
<?php if($currency == 'money') { ?>
var money = p*Dd('month').value;
if(p*Dd('month').value > <?php echo $_money;?>) {
Go('charge.php?action=pay&reason=spread|<?php echo $mid;?>|<?php echo $_word;?>|'+p+'|'+Dd('month').value+'|'+Dd('key_id').value+'&amount='+money+'&bank='+$('#bank').val());
return false;
}
if(money > <?php echo $DT['quick_pay'];?>){
if(Dd('password').value.length < 6) {
Dmsg('请填写支付密码', 'password');
return false;
}
}
<?php } else { ?>
if(p*Dd('month').value > <?php echo $_credit;?>) {
alert('您的<?php echo $DT['credit_name'];?>不足，请先购买');
return false;
}
<?php } ?>
}
<?php if($currency == 'money') { ?>
window.setInterval(
function() {
var money = Dd('price').value*Dd('month').value;
if(money > <?php echo $_money;?> || <?php echo $_money;?> < 0.01) {
$('#mymoney').hide();$('#paytype').show();$('#payword').hide();
} else {
$('#mymoney').show();$('#paytype').hide();if(money > <?php echo $DT['quick_pay'];?>){$('#payword').show();}
}
}, 
500);
<?php } ?>
</script>
<?php } ?>
<?php include template('footer', 'member');?>