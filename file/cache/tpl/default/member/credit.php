<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="action_buy"><a href="?action=buy"><span><?php echo $DT['credit_name'];?>购买</span></a></td>
<?php if($MOD['credit_exchange']) { ?>
<td class="tab" id="action_exchange"><a href="?action=exchange"><span><?php echo $DT['credit_name'];?>兑换</span></a></td>
<?php } ?>
<td class="tab" id="action"><a href="?action=index"><span><?php echo $DT['credit_name'];?>记录</span></a></td>
<td class="tab" id="action_invite"><a href="?action=invite"><span><?php echo $DT['credit_name'];?>推广</span></a></td>
<?php if($action == 'less') { ?>
<td class="tab" id="action_less"><a href="?action=less"><span><?php echo $DT['credit_name'];?>不足</span></a></td>
<?php } ?>
<?php if($EXT['gift_enable']) { ?>
<td class="tab" id="action_gift"><a href="<?php echo $EXT['gift_url'];?>" target="_blank"><span>积分换礼</span></a></td>
<?php } ?>
</tr>
</table>
</div>
<?php if($action == 'exchange') { ?>
<form method="post" action="?" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="submit" value="1"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">可用<?php echo $MOD['ex_name'];?></td>
<td class="tr"><strong class="f_blue"><?php echo $num;?></strong></td>
</tr>
<tr>
<td class="tl">兑换比率</td>
<td class="tr"><span class="f_blue">1</span> <?php echo $MOD['ex_name'];?> 兑换 <span class="f_red"><?php echo $MOD['ex_rate'];?></span> <?php echo $DT['credit_name'];?></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 兑换额度</td>
<td class="tr"><input type="text" size="8`" name="amount"/> <span id="damount" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" value=" 确 定 " class="btn"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
m = parseInt(Dd('amount').value);
n = <?php echo $num;?>;
if(m > 0 && m < n) {
return confirm('确定要兑换'+m+'<?php echo $MOD['ex_name'];?>吗？ 可换取'+(m*<?php echo $MOD['ex_rate'];?>)+'<?php echo $DT['credit_name'];?>\n\n注意:兑换<?php echo $MOD['ex_name'];?>可能会降低您在论坛的会员级别');
} else {
Dd('amount').value = '';
Dmsg('请填写兑换额度', 'amount');
return false;
}
}
</script>
<script type="text/javascript">s('credit');m('action_exchange');</script>
<?php } else if($action == 'buy') { ?>
<form method="post" action="?" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 购买额度</td>
<td class="tr c_p">
<table cellpadding="5" cellspacing="3">
<tr align="center">
<td>选</td>
<td>&nbsp;&nbsp;<?php echo $DT['credit_name'];?>(<?php echo $DT['credit_unit'];?>)&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;<?php echo $DT['money_name'];?>(<?php echo $DT['money_unit'];?>)&nbsp;&nbsp;</td>
</tr>
<?php if(is_array($C)) { foreach($C as $k => $v) { ?>
<tr align="center" onclick="Dd('type_<?php echo $k;?>').checked=true;k=<?php echo $k;?>;">
<td><input type="radio" name="type" id="type_<?php echo $k;?>" value="<?php echo $k;?>" <?php if($k==$select) { ?>checked<?php } ?>/></td>
<td id="c_<?php echo $k;?>"><?php echo $v;?></td>
<td class="f_red" id="p_<?php echo $k;?>"><?php echo $P[$k];?></td>
</tr>
<?php } } ?>
</table>
</td>
</tr>
<tr>
<td class="tl">应付总额</td>
<td class="tr"><span class="f_price px16" id="money">0.00</span> <?php echo $DT['money_unit'];?></td>
</tr>
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
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 立即购买 " class="btn_g"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('credit');m('action_buy');</script>
<?php } else if($action == 'invite') { ?>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">引导至</td>
<td class="tr">
<input type="radio" name="goto" value="1" id="goto_1" onclick="Dd('codes').value='<?php echo $url;?>';" checked/><label for="goto_1"> 网站首页</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="goto" value="2" id="goto_2" onclick="Dd('codes').value='<?php echo $url;?>&goto=register';"/><label for="goto_2"> 会员注册</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="goto" value="3" id="goto_3" onclick="Dd('codes').value='<?php echo $url;?>&goto=homepage';"/><label for="goto_3"> 我的主页</label>
</td>
</tr>
<tr>
<td class="tl">推广网址</td>
<td class="tr"><input type="text" name="code" value="<?php echo $url;?>" size="80" id="codes" onmouseover="this.select();" style="padding:3px;"/></td>
</tr>
<tr>
<td class="tl">推广方法</td>
<td class="tr">
- 将上面的网址发给您QQ/微信/Email等好友<br/>
- 在论坛签名,博客链接,网站等加上上面的网址<br/>
</td>
</tr>
<tr>
<td class="tl">奖励规则</td>
<td class="tr">
- 每引导一个IP访问您可以获赠 <strong class="f_blue"><?php echo $MOD['credit_ip'];?></strong> <?php echo $DT['credit_name'];?> (24小时内最多积<?php echo $MOD['credit_maxip'];?><?php echo $DT['credit_name'];?>)<br/>
- 每引导一个用户注册您可以获赠 <strong class="f_blue"><?php echo $MOD['credit_user'];?></strong> <?php echo $DT['credit_name'];?><br/>
</td>
</tr>
<tr>
<td class="tl">备注事项</td>
<td class="tr">
- 无论引导至那个页面，系统均会自动记录您为用户注册推荐人<br/>
- 引导用户需注册成功完善资料后方可为您加分<br/>
- 同一IP 24小时内计算一次<br/>
</td>
</tr>
<tr>
<td class="tl">推广记录</td>
<td class="tr"><a href="?kw=<?php echo urlencode('推广');?>" class="t">点击查看&raquo;</a></td>
</tr>
</table>
<script type="text/javascript">s('credit');m('action_invite');</script>
<?php } else if($action == 'less') { ?>
<div class="warn">抱歉！由于您的<?php echo $DT['credit_name'];?>不足，无法进行此操作</div>
<table cellpadding="10" cellspacing="1" class="tb">
<td class="tl">可用<?php echo $DT['credit_name'];?></td>
<td class="tr"><strong class="f_blue"><?php echo $_credit;?></strong></td>
</tr>
<tr>
<td class="tl">您可以...</td>
<td class="tr">
<a href="?action=buy" class="t">购买<?php echo $DT['credit_name'];?></a> &nbsp;|&nbsp;
<?php if($MOD['credit_exchange']) { ?>
<a href="?action=exchange" class="t">兑换<?php echo $DT['credit_name'];?></a> &nbsp;|&nbsp; 
<?php } ?>
<a href="?action=invite" class="t">推广赚<?php echo $DT['credit_name'];?></a>
</td>
</tr>
</table>
<script type="text/javascript">s('credit');m('action_less');</script>
<?php } else { ?>
<form action="?">
<div class="tt">
<?php echo $fields_select;?>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<select name="type">
<option value="0">类型</option>
<option value="1" <?php if($type==1) { ?>selected<?php } ?>>收入</option>
<option value="2" <?php if($type==2) { ?>selected<?php } ?>>支出</option>
</select>
&nbsp;
<?php echo dcalendar('fromdate', $fromdate);?> 至 <?php echo dcalendar('todate', $todate);?>
&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="Go('?action=<?php echo $action;?>');"/>
</div>
</form>
<div class="bd">
<table cellpadding="10" cellspacing="0" class="tb">
<tr>
<th>流水号</th>
<th>收入</th>
<th>支出</th>
<th>余额</th>
<th width="130">发生时间</th>
<th width="150">事由</th>
<th width="150">备注</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center">
<td height="30"><?php echo $v['itemid'];?></td>
<td class="f_blue"><?php if($v['amount'] > 0) { ?><?php echo $v['amount'];?><?php } else { ?>&nbsp;<?php } ?></td>
<td class="f_red"><?php if($v['amount'] < 0) { ?><?php echo $v['amount'];?><?php } else { ?>&nbsp;<?php } ?></td>
<td><?php if($v['balance']) { ?><?php echo $v['balance'];?><?php } else { ?>&nbsp;<?php } ?></td>
<td class="f_gray"><?php echo $v['addtime'];?></td>
<td title="<?php echo $v['reason'];?>"><input type="text" size="20" value="<?php echo $v['reason'];?>"/></td>
<td title="<?php echo $v['note'];?>"><input type="text" size="20" value="<?php echo $v['note'];?>"/></td>
</tr>
<?php } } ?>
<tr align="center">
<td height="35"><strong>小计</strong></td>
<td class="f_blue"><?php echo $income;?></td>
<td class="f_red"><?php echo $expense;?></td>
<td colspan="4">&nbsp;</td>
</tr>
</table>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('credit');m('action');</script>
<?php } ?>
<?php if($action == 'buy') { ?>
<script type="text/javascript">
var k = <?php echo $select;?>;
function check() {
var money = $('#p_'+k).html();
if(money > <?php echo $_money;?>) {
Go('charge.php?action=pay&reason=credit|'+k+'&amount='+money+'&bank='+$('#bank').val());
return false;
}
if(money > <?php echo $DT['quick_pay'];?>){
if(Dd('password').value.length < 6) {
Dmsg('请填写支付密码', 'password');
return false;
}
}
return true;
}
window.setInterval(
function() {
var money = $('#p_'+k).html();
$('#money').html(money);
if(money > <?php echo $_money;?> || <?php echo $_money;?> < 0.01) {
$('#mymoney').hide();$('#paytype').show();$('#payword').hide();
} else {
$('#mymoney').show();$('#paytype').hide();if(money > <?php echo $DT['quick_pay'];?>){$('#payword').show();}
}
}, 
500);
</script>
<?php } ?>
<?php include template('footer', 'member');?>