<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<br/>
<div class="reg-main">
<div class="reg-step">
<ul>
<li style="width:90px;">&nbsp;</li>
<li<?php if($stepid==1) { ?> class="on"<?php } ?>><i>1</i>注册验证</li>
<li<?php if($stepid==2) { ?> class="on"<?php } ?>><i>2</i>填写资料</li>
<li<?php if($stepid==3) { ?> class="on"<?php } ?>><b>&nbsp;</b>注册成功</li>
<li style="width:90px;">&nbsp;</li>
</ul>
</div>
</div>
<br/>
</div>
<div class="m">
<?php if($action == 'success') { ?>
<table cellspacing="0" class="reg-tb">
<tr>
<td class="tl"></td>
<td class="tr"><div style="background:url('image/okay.gif') no-repeat 0 center;font-size:16px;font-weight:bold;color:#4FA800;padding:6px 32px;">恭喜您！会员注册成功</div></td>
<td class="tt"></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr"><div style="padding:0 32px;color:#666666;"><span id="send" class="f_red">9</span>秒后自动登录系统...</div></td>
<td class="tt"></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr"><input type="button" value="立即登录" class="btn-green reg-btn" onclick="Go('<?php echo $url;?>');"/></td>
<td class="tt"></td>
</tr>
</table>
<meta http-equiv="refresh" content="9;URL=<?php echo $url;?>"/>
<script type="text/javascript">
var i = 9;
var interval=window.setInterval(
function() {
if(i == 0) {
clearInterval(interval);
} else {
$('#send').html(i);
i--;
}
},
1000);
</script>
<?php } else if($action == 'verify') { ?>
<form method="post" action="?" onsubmit="return Vcheck();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="sid" value="<?php echo $_sid;?>"/>
<table cellspacing="0" class="reg-tb">
<?php if($MOD['question_register']) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证问题</td>
<td class="tr"><?php include template('question', 'chip');?></td>
<td class="tt"><span id="danswer" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($MOD['captcha_register']) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?></td>
<td class="tt"><span id="dcaptcha" class="f_red"></span></td>
</tr>
<?php } ?>
<tr>
<td class="tl"></td>
<td class="tr"><input type="checkbox" checked="checked" name="read" id="read" value="1" onclick="if(this.checked){Ds('sbm');}else{Dh('sbm');}"/> <a href="?action=read" target="_blank">我已阅读并同意服务条款</a></td>
<td class="tt"><span id="dread" class="f_red"></span></td>
</tr>
<tr id="sbm">
<td class="tl"></td>
<td class="tr"><input type="submit" name="submit" value="下一步" class="btn-blue reg-btn"/></td>
<td class="tt"></td>
</tr>
</table>
</form>
<script type="text/javascript">
function Vcheck() {
<?php if($MOD['question_register']) { ?>
if($('#canswer').html().indexOf('ok.png') == -1) {
Dmsg('请回答验证问题', 'answer');
return false;
}
<?php } ?>
<?php if($MOD['captcha_register']) { ?>
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写验证码', 'captcha');
return false;
}
<?php } ?>
if(!Dd('read').checked) {
Dmsg('请阅读并同意服务条款', 'read');
return false;
}
return true;
}
</script>
<?php } else if($action == 'sms') { ?>
<form method="post" action="?" onsubmit="return Scheck();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="sid" value="<?php echo $_sid;?>"/>
<table cellspacing="0" class="reg-tb">
<?php if($MOD['checkuser'] == 4) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证方式</td>
<td class="tr">&nbsp;&nbsp;<strong>短信验证</strong><span class="f_r"><a href="?action=mail&sid=<?php echo $_sid;?>" class="b">切换为邮件验证</a></span></td>
<td class="tt"></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 手机号码</td>
<td class="tr"><input name="mobile" type="text" id="mobile" placeholder="手机号码" class="input-mob" autocomplete="off"/></td>
<td class="tt"><span id="dmobile" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?></td>
<td class="tt"><span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">&nbsp;&nbsp;<a href="javascript:;" class="b" onclick="Ssend();" id="send">发送短信</a><span id="sendok" class="f_r f_green px12"></span></td>
<td class="tt"><span id="dsend" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 短信验证码</td>
<td class="tr"><input name="code" type="text" id="code" placeholder="短信验证码" class="input-code"/></td>
<td class="tt"><span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr"><input type="checkbox" checked="checked" name="read" id="read" value="1" onclick="if(this.checked){Ds('sbm');}else{Dh('sbm');}"/> <a href="?action=read" target="_blank">我已阅读并同意服务条款</a></td>
<td class="tt"><span id="dread" class="f_red"></span></td>
</tr>
<tr id="sbm">
<td class="tl"></td>
<td class="tr"><input type="submit" name="submit" value="下一步" class="btn-blue reg-btn"/></td>
<td class="tt"></td>
</tr>
</table>
</form>
<script type="text/javascript">
function Scheck() {
if(Dd('mobile').value.length < 11) {
Dmsg('请输入手机号码', 'mobile');
return false;
}
if(Dd('code').value.length < 4) {
Dmsg('请输入短信验证码', 'code');
return false;
}
if(!Dd('read').checked) {
Dmsg('请阅读并同意服务条款', 'read');
return false;
}
return true;
}
function Sstop() {
var i = <?php echo $timeout;?>;
var interval=window.setInterval(
function() {
if(i == 0) {
$('#send').html('发送短信');
$('#sendok').html('');
clearInterval(interval);
} else {
$('#send').html('重新发送('+i+'秒)');
i--;
}
},
1000);
}
function Ssend() {
if($('#send').html().indexOf('秒') != -1) {
Dmsg('请耐心等待', 'send');
return false;
}
if(Dd('mobile').value.length < 11) {
Dmsg('请输入手机号码', 'mobile');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写验证码', 'captcha');
return false;
}
$.post('?', 'action=sendsms&sid=<?php echo $_sid;?>&mobile='+Dd('mobile').value+'&captcha='+Dd('captcha').value, function(data) {
if(data == 'ok') {
$('#sendok').html('短信发送成功');
Sstop();return;
} else if(data == 'format') {
Dmsg('手机格式错误', 'mobile');
} else if(data == 'captcha') {
Dmsg('验证码错误', 'captcha');
} else if(data == 'exist') {
Dmsg('手机号码已经被注册', 'mobile');
} else if(data == 'max') {
Dmsg('发送次数过多', 'send');
} else if(data == 'fast') {
Dmsg('发送频率过快', 'send');
} else {
Dmsg('发送失败'+data, 'send');
}
reloadcaptcha();
});
}
</script>
<?php } else if($action == 'mail') { ?>
<form method="post" action="?" onsubmit="return Mcheck();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="sid" value="<?php echo $_sid;?>"/>
<table cellspacing="0" class="reg-tb">
<?php if($MOD['checkuser'] == 4) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证方式</td>
<td class="tr">&nbsp;&nbsp;<strong>邮件验证</strong><span class="f_r"><a href="?action=sms&sid=<?php echo $_sid;?>" class="b">切换为短信验证</a></span></td>
<td class="tt"></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 电子邮箱</td>
<td class="tr"><input name="email" type="text" id="email" placeholder="电子邮箱" class="input-mail" autocomplete="off"/></td>
<td class="tt"><span id="demail" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?></td>
<td class="tt"><span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">&nbsp;&nbsp;<a href="javascript:;" class="b" onclick="Msend();" id="send">发送邮件</a><span id="sendok" class="f_r f_green"></span></td>
<td class="tt"><span id="dsend" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 邮件验证码</td>
<td class="tr"><input name="code" type="text" id="code" placeholder="邮件验证码" class="input-code"/></td>
<td class="tt"><span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr"><input type="checkbox" checked="checked" name="read" id="read" value="1" onclick="if(this.checked){Ds('sbm');}else{Dh('sbm');}"/> <a href="?action=read" target="_blank">我已阅读并同意服务条款</a></td>
<td class="tt"><span id="dread" class="f_red"></span></td>
</tr>
<tr id="sbm">
<td class="tl"></td>
<td class="tr"><input type="submit" name="submit" value="下一步" class="btn-blue reg-btn"/></td>
<td class="tt"></td>
</tr>
</table>
</form>
<script type="text/javascript">
function Mcheck() {
if(Dd('email').value.length < 6) {
Dmsg('请输入电子邮箱', 'email');
return false;
}
if(Dd('code').value.length < 6) {
Dmsg('请输入邮件验证码', 'code');
return false;
}
if(!Dd('read').checked) {
Dmsg('请阅读并同意服务条款', 'read');
return false;
}
return true;
}
function Mstop() {
var i = <?php echo $timeout;?>;
var interval=window.setInterval(
function() {
if(i == 0) {
$('#send').html('发送邮件');
$('#sendok').html('');
clearInterval(interval);
} else {
$('#send').html('重新发送('+i+'秒)');
i--;
}
},
1000);
}
function Msend() {
if($('#send').html().indexOf('秒') != -1) {
Dmsg('请耐心等待', 'send');
return false;
}
if(Dd('email').value.length < 6) {
Dmsg('请输入电子邮箱', 'email');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写验证码', 'captcha');
return false;
}
$.post('?', 'action=sendmail&sid=<?php echo $_sid;?>&email='+Dd('email').value+'&captcha='+Dd('captcha').value, function(data) {
if(data == 'ok') {
$('#sendok').html('邮箱发送成功');
Mstop();return;
} else if(data == 'format') {
Dmsg('邮箱格式错误', 'email');
} else if(data == 'captcha') {
Dmsg('验证码错误', 'captcha');
} else if(data == 'exist') {
Dmsg('电子邮箱已经被注册', 'email');
} else if(data == 'max') {
Dmsg('发送次数过多', 'send');
} else if(data == 'fast') {
Dmsg('发送频率过快', 'send');
} else {
Dmsg('发送失败'+data, 'send');
}
reloadcaptcha();
});
}
</script>
<?php } else { ?>
<form action="?" method="post" onsubmit="return Rcheck();">
<input type="hidden" name="sid" value="<?php echo $_sid;?>"/>
<table cellspacing="0" class="reg-tb" id="reg-box">
<tr>
<td class="tl"><span class="f_red">*</span> 会员类型</td>
<td class="tr">
<input type="radio" name="post[regid]" value="6" id="g_6" onclick="Dreg(1);" checked/><label for="g_6"> <?php echo $GROUP['6']['groupname'];?></label>&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(is_array($GROUP)) { foreach($GROUP as $k => $v) { ?>
<?php if($k>6 && $v['vip']==0 && $v['reg']==1) { ?><input type="radio" name="post[regid]" value="<?php echo $k;?>" id="g_<?php echo $k;?>" onclick="Dreg(<?php if($v['type']) { ?>1<?php } else { ?>0<?php } ?>);"/><label for="g_<?php echo $k;?>"> <?php echo $GROUP[$k]['groupname'];?></label>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?><?php } } ?>
<?php if($GROUP['5']['reg']) { ?><input type="radio" name="post[regid]" value="5" id="g_5" onclick="Dreg(0);"/><label for="g_5"> <?php echo $GROUP['5']['groupname'];?></label><?php } ?>
</span>
</td>
<td class="tt"></td>
</tr>
<tbody id="iscom" style="display:;">
<tr onmouseover="Ds('tcompany');" onmouseout="Dh('tcompany');">
<td class="tl"><span class="f_red">*</span> 公司名称</td>
<td class="tr"><input type="text" class="input-text" name="post[company]" id="company" placeholder="公司全称，注册后不可更改" onblur="Dvalidator('company');"/></td>
<td class="tt">
<div class="tips" id="tcompany" style="display:none;">
<div>请填写公司全称，与营业执照保持一致，注册之后将不可更改</div>
</div>
<span id="dcompany" class="f_red px12"></span>&nbsp;
</td>
</tr>
</tbody>
<tr onmouseover="Ds('tusername');" onmouseout="Dh('tusername');">
<td class="tl"><span class="f_red">*</span> 会员名称</td>
<td class="tr"><input type="text" class="input-user" name="post[username]" id="username" placeholder="会员名称，不支持中文" onblur="Dvalidator('username');" autocomplete="off" <?php if($username) { ?> value="<?php echo $username;?>" readonly<?php } ?>/>
</td>
<td class="tt">
<div class="tips" id="tusername" style="display:none;">
<div><?php echo $MOD['minusername'];?>-<?php echo $MOD['maxusername'];?>个字符，只能使用小写字母(a-z)、数字(0-9)、下划线(_)、中划线(-)，且以字母或数字开头和结尾</div>
</div>
<span id="dusername" class="f_red px12"></span>&nbsp;
</td>
</tr>
<?php if($MOD['passport'] && $passport) { ?>
<tr onmouseover="Ds('tpassport');" onmouseout="Dh('tpassport');">
<td class="tl"><span class="f_red">*</span> 会员昵称</td>
<td class="tr"><input type="text" class="input-user" name="post[passport]" id="passport" placeholder="会员昵称，支持中文" onblur="Dvalidator('passport');" autocomplete="off"<?php if($passport) { ?> value="<?php echo $passport;?>" readonly<?php } ?>/></td>
<td class="tt">
<div class="tips" id="tpassport" style="display:none;">
<div>支持中文名，可用于论坛等系统用户名<br/>如果不填写，则和会员名一致</div>
</div>
<span id="dpassport" class="f_red px12"></span>&nbsp;
</td>
</tr>
<?php } ?>
<tr onmouseover="Ds('tpassword');" onmouseout="Dh('tpassword');">
<td class="tl"><span class="f_red">*</span> 登录密码</td>
<td class="tr"><input type="password" class="input-pass" name="post[password]" id="password" placeholder="登录密码" onblur="Dvalidator('password');" autocomplete="off"<?php if($password) { ?> value="<?php echo $password;?>" readonly<?php } ?>/></td>
<td class="tt">
<div class="tips" id="tpassword" style="display:none;">
<div><?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>个字符，区分大小写，推荐使用数字、字母和特殊符号组合</div>
</div>
<span id="dpassword" class="f_red px12"></span>&nbsp;
</td>
</tr>
<tr onmouseover="Ds('tcpassword');" onmouseout="Dh('tcpassword');">
<td class="tl"><span class="f_red">*</span> 重复输入</td>
<td class="tr"><input type="password" class="input-pass" name="post[cpassword]" id="cpassword" placeholder="再输入一遍登录密码" onblur="Dvalidator('cpassword');" autocomplete="off"<?php if($password) { ?> value="<?php echo $password;?>" readonly<?php } ?>/></td>
<td class="tt">
<div class="tips" id="tcpassword" style="display:none;">
<div>请再输入一遍上面填写的密码</div>
</div>
<span id="dcpassword" class="f_red px12"></span>&nbsp;
</td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr"><input type="submit" name="submit" value="立即注册" class="btn-blue reg-btn"/></td>
<td class="tt"></td>
</tr>
</table>
</form>
<script type="text/javascript">
var vid = '';
function Dtrim(id) {
var str = $.trim(Dd(id).value);
if(Dd(id).value != str) Dd(id).value = str;
}
function Dmsgs(str, id) {
Dd('d'+id).innerHTML = '<img src="<?php echo DT_STATIC;?>file/image/check-'+(str ? 'ko' : 'ok')+'.png" align="absmiddle"/> '+str;
}
function Dvalidator(id) {
vid = id;Dtrim(id);
if(id == 'cpassword') {
Dmsgs((Dd('cpassword').value == Dd('password').value && Dd('password').value.length > 5) ? '' : '两次输入的密码不一致', id);
return;
}
$.post(AJPath, 'moduleid=<?php echo $moduleid;?>&action=member&job='+id+'&value='+Dd(id).value, function(data) {
Dmsgs(data, vid);
});
}
function Dreg(type) {
if(type) {
Ds('iscom');
} else {
Dh('iscom');
$('#dcompany').html('');
}
}
function Rcheck() {
var f;
if(Dd('iscom').style.display != 'none') {
f = 'company';
if(Dd(f).value.length < 3) {
Dmsgs('请填写公司名称', f);
return false;
}
}
f = 'username';
if(Dd(f).value.length < 3) {
Dmsgs('请填写会员名称', f);
return false;
}
f = 'password';
if(Dd(f).value.length < 6) {
Dmsgs('请填写登录密码', f);
return false;
}
f = 'cpassword';
if(Dd(f).value.length < 6) {
Dmsgs('请重复输入密码', f);
return false;
}
if(Dd('password').value != Dd(f).value) {
Dmsgs('两次输入的密码不一致', f);
return false;
}
if($('#reg-box').html().indexOf('ko') != -1) {
return false;
}
return true;
}
</script>
<?php } ?>
<br/><br/>
</div>
<?php include template('footer');?>