<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php if($action == 'sms') { ?>短信<?php } else { ?>会员<?php } ?>登录</div>
<div class="head-bar-right"><?php if($action == 'sms') { ?><a href="<?php echo $DT['file_login'];?>?action=login&forward=<?php echo $_forward;?>" data-direction="reverse"><span>取消</span></a><?php } else { ?><a href="<?php echo $DT['file_register'];?>" data-ajax="false"><span>注册</span></a><?php } ?></div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main">
<?php if($action == 'sms') { ?>
<form method="post" action="<?php echo $DT['file_login'];?>" onsubmit="return Scheck();">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="list-inp"><div class="bd-b"><input type="tel" name="mobile" id="mobile" placeholder="已认证手机号" onblur="window.scrollTo(0,0);"/></div></div>
<div class="list-inp"><div class="bd-b"><?php include template('captcha', 'chip');?></div></div>
<div class="list-inp"><div class="bd-b"><a href="javascript:;" class="b" onclick="Dsend();" id="send">发送短信</a></div></div>
<div class="list-inp"><div class="bd-b"><input type="tel" name="code" id="code" placeholder="短信验证码" onblur="window.scrollTo(0,0);"/></div></div>
<div class="blank-20"></div>
<div class="list-btn"><input type="submit" name="submit" value="登 录" class="btn-blue"/></div>
<div class="blank-20"></div>
</form>
<?php } else { ?>
<form method="post" action="<?php echo $DT['file_login'];?>" onsubmit="return Dcheck();">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="auth" value="<?php echo $auth;?>"/>
<div class="list-inp"><div class="bd-b"><input type="text" name="username" id="username" value="<?php echo $username;?>" placeholder="用户名/Email/已认证手机" onblur="window.scrollTo(0,0);"/></div></div>
<div class="list-inp"><div class="bd-b"><input type="password" name="password" id="password" placeholder="请填写密码" onblur="window.scrollTo(0,0);"/></div></div>
<?php if($MOD['captcha_login']) { ?>
<div class="list-inp"><div class="bd-b"><?php include template('captcha', 'chip');?></div></div>
<?php } ?>
<div class="blank-20"></div>
<div class="list-btn"><input type="submit" name="submit" value="登 录" class="btn-blue"/></div>
<div class="blank-20"></div>
<?php if($oa) { ?>
<center>
<?php if(is_array($OAUTH)) { foreach($OAUTH as $k => $v) { ?>
<?php if($v['enable']) { ?><a href="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/connect.php" rel="external"><img src="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/icon.png" alt="<?php echo $v['name'];?>" style="width:32px;height:32px;margin-right:16px;"/></a><?php } ?>
<?php } } ?>
</center>
<div class="blank-20"></div>
<?php } ?>
</form>
<?php } ?>
</div>
<div class="blank-20"></div>
<div class="list-set">
<ul>
<?php if($could_sms) { ?>
<?php if($action == 'sms') { ?>
<li><div><a href="<?php echo $DT['file_login'];?>?action=login&forward=<?php echo $_forward;?>" data-direction="reverse">帐号登录</a></div></li>
<?php } else { ?>
<li><div><a href="<?php echo $DT['file_login'];?>?action=sms&forward=<?php echo $_forward;?>">短信登录</a></div></li>
<?php } ?>
<?php } ?>
<li><div><a href="<?php echo $DT['file_register'];?>" data-ajax="false">会员注册</a></div></li>
<li><div><a href="send.php" data-ajax="false">忘记密码</a></div></li>
</ul>
</div>
<script type="text/javascript">
function Dcheck() {
if(Dd('username').value.length < 2) {
Dtoast('请输入登录名称');
return false;
}
if(Dd('password').value.length < 6) {
Dtoast('请输入密码');
return false;
}
<?php if($MOD['captcha_login']) { ?>
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dtoast('请填写验证码');
return false;
}
<?php } ?>
return true;
}
function Scheck() {
if(Dd('mobile').value.length < 11) {
Dtoast('请输入手机号码');
return false;
}
if(Dd('code').value.length < 6) {
Dtoast('请输入短信验证码');
return false;
}
return true;
}
function Dstop() {
var i = 180;
var interval=window.setInterval(
function() {
if(i == 0) {
$('#send').html('发送短信');
clearInterval(interval);
} else {
$('#send').html('重新发送('+i+'秒)');
i--;
}
},
1000);
}
function Dsend() {
if($('#send').html().indexOf('秒') != -1) {
Dtoast('请耐心等待');
return false;
}
if(Dd('mobile').value.length < 11) {
Dtoast('请输入手机号码');
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dtoast('验证码填写错误');
return false;
}
$.post('?', 'action=send&mobile='+Dd('mobile').value+'&captcha='+Dd('captcha').value, function(data) {
if(data == 'ok') {
Dtoast('短信发送成功');
Dstop();return;
} else if(data == 'mobile') {
Dtoast('手机格式错误');
} else if(data == 'captcha') {
Dtoast('验证码错误');
} else if(data == 'mob') {
Dtoast('号码不存在或未验证');
} else if(data == 'max') {
Dtoast('发送次数过多');
} else if(data == 'fast') {
Dtoast('发送频率过快');
} else {
Dtoast('发送失败'+data);
}
reloadcaptcha();
});
}
$(function(){
if($('#captcha')) $('#captcha').css({'width':'120px','border':'none','padding':'0','font-size':'16px','margin-top':'10px'});
if($('#username')) {
$('#username').bind('keyup blur', function() {
$(this).val(DTrim($(this).val()));
});
}
});
</script>
<?php include template('footer', 'member');?>