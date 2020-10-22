<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<?php if($action == 'passport') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on" id="Tab0"><a href="?action=<?php echo $action;?>"><span>修改昵称</span></a></td>
</tr>
</table>
</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">当前昵称</td>
<td class="tr"><?php echo $_passport;?></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 新昵称</td>
<td class="tr"><input type="text" size="30" name="npassport" id="npassport" onblur="validator();" placeholder="支持中文，仅可修改一次"/> <span id="dnpassport" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="修 改" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function validator() {
if(Dd('npassport').value.length < 2) return;
$.post(AJPath, 'moduleid=2&action=member&job=passport&value='+Dd('npassport').value+'&userid=<?php echo $_userid;?>', function(data) {
$('#dnpassport').html('<img src="<?php echo DT_STATIC;?>file/image/check-'+(data ? 'ko' : 'ok')+'.png" align="absmiddle"/> '+data);
});
}
function check() {
if(Dd('npassport').value.length < 2) {
Dmsg('请填写新昵称', 'npassport');
return false;
}
if($('#dnpassport').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的昵称', 'npassport');
return false;
}
return true;
}
s('edit');
</script>
<?php } else if($action == 'email') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、修改邮箱</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、邮件验证</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">邮箱修改成功 <a href="edit.php" class="t">立即返回</a></div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span>邮件验证码</td>
<td class="tr"><input type="text" size="15" name="code" id="code" placeholder="已发送至邮箱"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="立即修改" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="重新发送" class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写邮件验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新邮箱</td>
<td class="tr"><input type="text" size="30" name="email" id="email" value="<?php echo $email;?>"/> <span id="demail" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="下一步" class="btn_g" id="send_code"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('email').value.length < 6) {
Dmsg('请填写新邮箱地址', 'email');
return false;
}
if(Dd('email').value == '<?php echo $_email;?>') {
Dmsg('新邮箱地址不能与当前邮箱地址相同', 'email');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">s('edit');m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'mobile') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、修改手机</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、验证手机</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">手机修改成功 <a href="edit.php" class="t">立即返回</a></div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 短信验证码</td>
<td class="tr"><input type="text" size="15" name="code" id="code" placeholder="已发送至手机"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" value="立即修改" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="重新发送" class="btn" onclick="Go('?action=<?php echo $action;?>&mobile=<?php echo $mobile;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写短信验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新手机号</td>
<td class="tr"><input type="text" size="30" name="mobile" id="mobile" value="<?php echo $mobile;?>" class="inp"/> <span id="dmobile" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="下一步" class="btn_g" id="send_code"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('mobile').value.length < 11) {
Dmsg('请填写新手机号码', 'mobile');
return false;
}
if(Dd('mobile').value == '<?php echo $_mobile;?>') {
Dmsg('新手机号码不能与当前号码相同', 'mobile');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">s('edit');m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'contact') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=index"><span>找回密码</span></a></td>
<td class="tab_on" id="Tab1"><a href="?action=index"><span>人工申诉</span></a></td>
</tr>
</table>
</div>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">提示信息</td>
<td class="tr">请联系网站客服，并提供相关信息，由客服人工协助找回</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="button" value="联系客服" class="btn_g" onclick="Go('<?php echo $url;?>');"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="Go('?action=index');"/></td>
</tr>
</table>
<script type="text/javascript">Dh('side');Dh('side_oh');</script>
<?php } else if($action == 'sms') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>找回密码</span></a></td>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、填写手机</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、验证短信</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">
<?php if($_userid) { ?>
支付密码修改成功 <a href="edit.php?tab=1" class="t">密码管理</a>
<?php } else { ?>
登录密码修改成功 <a href="<?php echo $DT['file_login'];?>?username=<?php echo $username;?>&forward=<?php echo urlencode($MOD['linkurl']);?>" class="t">立即登录</a>
<?php } ?>
</div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" autocomplete="off" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新<?php if($_userid) { ?>支付<?php } else { ?>登录<?php } ?>密码</td>
<td class="tr"><input type="password" size="30" name="password" id="password" placeholder="新<?php if($_userid) { ?>支付<?php } else { ?>登录<?php } ?>密码" onblur="validator();" autocomplete="off"/> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 重复新密码</td>
<td class="tr"><input type="password" size="30" name="cpassword" id="cpassword" placeholder="再输入一遍新密码" autocomplete="off"/> <span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 短信验证码</td>
<td class="tr"><input type="text" size="15" name="code" id="code" placeholder="已发送至手机"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="立即修改" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="重新发送" class="btn" onclick="Go('?action=<?php echo $action;?>&mobile=<?php echo $mobile;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function validator() {
if(Dd('password').value.length > <?php echo $MOD['maxpassword'];?> || Dd('password').value.length < <?php echo $MOD['minpassword'];?>) return;
$.post(AJPath, 'moduleid=2&action=member&job=password&value='+Dd('password').value, function(data) {
$('#dpassword').html('<img src="<?php echo DT_STATIC;?>file/image/check-'+(data ? 'ko' : 'ok')+'.png" align="absmiddle"/> '+data);
});
}
function check() {
if(Dd('password').value.length > <?php echo $MOD['maxpassword'];?> || Dd('password').value.length < <?php echo $MOD['minpassword'];?>) {
Dmsg('密码长度应为<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>字符', 'password');
return false;
}
if($('#dpassword').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的密码', 'password');
return false;
}
if(Dd('password').value != Dd('cpassword').value) {
Dmsg('两次输入的密码不一致', 'cpassword');
return false;
}
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的短信验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 手机号码</td>
<td class="tr"><input type="text" size="30" name="mobile" id="mobile" value="<?php echo $mobile;?>" placeholder="已经认证的手机号码"<?php if($_userid && $mobile) { ?> readonly<?php } ?>/> <span id="dmobile" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="下一步" class="btn_g" id="send_code"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="Go('?action=index');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('mobile').value.length < 11) {
Dmsg('请填写手机号码', 'mobile');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">Dh('side');Dh('side_oh');m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'mail') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>找回密码</span></a></td>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、填写邮箱</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、验证邮箱</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok"><?php if($_userid) { ?>
支付密码修改成功 <a href="edit.php?tab=1" class="t">密码管理</a>
<?php } else { ?>
登录密码修改成功 <a href="<?php echo $DT['file_login'];?>?username=<?php echo $username;?>&forward=<?php echo urlencode($MOD['linkurl']);?>" class="t">立即登录</a>
<?php } ?>
</div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新<?php if($_userid) { ?>支付<?php } else { ?>登录<?php } ?>密码</td>
<td class="tr"><input type="password" size="30" name="password" id="password" placeholder="新<?php if($_userid) { ?>支付<?php } else { ?>登录<?php } ?>密码" onblur="validator();" autocomplete="off"/> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 重复新密码</td>
<td class="tr"><input type="password" size="30" name="cpassword" id="cpassword" placeholder="再输入一遍新密码" autocomplete="off"/> <span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 邮件验证码</td>
<td class="tr"><input type="text" size="15" name="code" id="code" placeholder="已发送至邮箱"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="立即修改" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="重新发送" class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function validator() {
if(Dd('password').value.length > <?php echo $MOD['maxpassword'];?> || Dd('password').value.length < <?php echo $MOD['minpassword'];?>) return;
$.post(AJPath, 'moduleid=2&action=member&job=password&value='+Dd('password').value, function(data) {
$('#dpassword').html('<img src="<?php echo DT_STATIC;?>file/image/check-'+(data ? 'ko' : 'ok')+'.png" align="absmiddle"/> '+data);
});
}
function check() {
if(Dd('password').value.length > <?php echo $MOD['maxpassword'];?> || Dd('password').value.length < <?php echo $MOD['minpassword'];?>) {
Dmsg('密码长度应为<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>字符', 'password');
return false;
}
if($('#dpassword').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的密码', 'password');
return false;
}
if(Dd('password').value != Dd('cpassword').value) {
Dmsg('两次输入的密码不一致', 'cpassword');
return false;
}
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的邮件验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 邮箱地址</td>
<td class="tr"><input type="text" size="30" name="email" id="email" value="<?php echo $email;?>" placeholder="注册时填写的邮箱地址"<?php if($_userid && $email) { ?> readonly<?php } ?>/> <span id="demail" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value="下一步" class="btn_g" id="send_code"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="Go('?action=index');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('email').value.length < 6) {
Dmsg('请填写邮箱地址', 'email');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">Dh('side');Dh('side_oh');m('Tab<?php echo $step;?>');</script>
<?php } else { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on" id="Tab0"><a href="?action=index"><span>找回密码</span></a></td>
</tr>
</table>
</div>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">请选择找回方式</td>
<td class="tr">
<div style="line-height:40px;font-size:14px;padding-left:10px;">
<?php if($could_email) { ?>
<a href="?action=mail" class="t">通过电子邮箱找回</a><br/>
<?php } ?>
<?php if($could_mobile) { ?>
<a href="?action=sms" class="t">通过手机短信找回</a><br/>
<?php } ?>
<a href="?action=contact" class="t">联系客服人工申诉</a>
</div>
</td>
</tr>
</table>
<script type="text/javascript">
Dh('side');Dh('side_oh');
</script>
<?php } ?>
<?php if($seconds) { ?>
<script type="text/javascript">
Dd('send_code').disabled = true;
var i = <?php echo $seconds;?>;
var interval=window.setInterval(
function() {
if(i == 0) {
Dd('send_code').value = '下一步';
Dd('send_code').disabled = false;
clearInterval(interval);
} else {
Dd('send_code').value = '下一步('+i+'秒)';
i--;
}
},
1000);
</script>
<?php } ?>
<?php include template('footer', 'member');?>}