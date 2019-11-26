<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<?php if($action == 'passport') { ?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">修改昵称</div>
<div class="head-bar-right"><a href="edit.php"><span>取消</span></a></div>
</div>
<div class="head-bar-fix"></div>
</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="ui-form">
<p>当前昵称<em>*</em><b id="dpassport"></b></p>
<div><?php echo $_passport;?></div>
<p>新昵称<em>*</em><b id="dnpassport"></b></p>
<div><input type="email" name="npassport" id="npassport" onblur="validator();" placeholder="支持中文，仅可修改一次"/></div>
<div class="blank-16"></div>
<input type="submit" name="submit" value="立即修改" class="btn-blue" id="send_code"/>
<div class="blank-32"></div>
</div>
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
</script>
<?php } else if($action == 'email') { ?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">修改邮箱</div>
<div class="head-bar-right"><a href="edit.php"><span>取消</span></a></div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($step == 2) { ?>
<div class="ui-ok">
<p>邮箱修改成功</p>
<input type="button" value="立即返回" class="btn-green" onclick="Go('edit.php');"/>
</div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<div class="ui-form">
<p>邮件验证码<em>*</em><b id="dcode"></b></p>
<div><input type="tel" name="code" id="code" placeholder="已发送至邮箱"/></div>
<div class="blank-16"></div>
<input type="submit" name="submit" value="立即修改" class="btn-blue"/>
<div class="blank-16"></div>
<input type="button" value="重新发送" class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/>
<div class="blank-32"></div>
</div>
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
<div class="ui-form">
<p>新邮箱<em>*</em><b id="demail"></b></p>
<div><input type="email" name="email" id="email" value="<?php echo $email;?>"/></div>
<p>验证码<em>*</em><b id="dcaptcha"></b></p>
<div><?php include template('captcha', 'chip');?></div>
<div class="blank-16"></div>
<input type="submit" name="submit" value="下一步" class="btn-blue" id="send_code"/>
<div class="blank-32"></div>
</div>
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
<?php } else if($action == 'mobile') { ?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">修改手机</div>
<div class="head-bar-right"><a href="edit.php"><span>取消</span></a></div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($step == 2) { ?>
<div class="ui-ok">
<p>手机修改成功</p>
<input type="button" value="立即返回" class="btn-green" onclick="Go('edit.php');"/>
</div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<div class="ui-form">
<p>短信验证码<em>*</em><b id="dcode"></b></p>
<div><input type="tel" name="code" id="code" placeholder="已发送至手机"/></div>
<div class="blank-16"></div>
<input type="submit" name="submit" value="立即修改" class="btn-blue"/>
<div class="blank-16"></div>
<input type="button" value="重新发送" class="btn" onclick="Go('?action=<?php echo $action;?>&mobile=<?php echo $mobile;?>');"/>
<div class="blank-32"></div>
</div>
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
<div class="ui-form">
<p>新手机号<em>*</em><b id="dmobile"></b></p>
<div><input type="tel" name="mobile" id="mobile" value="<?php echo $mobile;?>"/></div>
<p>验证码<em>*</em><b id="dcaptcha"></b></p>
<div><?php include template('captcha', 'chip');?></div>
<div class="blank-16"></div>
<input type="submit" name="submit" value="下一步" class="btn-blue" id="send_code"/>
<div class="blank-32"></div>
</div>
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
<?php } else if($action == 'contact') { ?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">人工申诉</div>
<div class="head-bar-right"><a href="?action=index"><span>取消</span></a></div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main content"><br/>
<center>请联系网站客服，并提供相关信息<br/>由客服人工协助找回</center>
<div class="blank-32"></div>
<input type="button" value="联系客服" class="btn-green" onclick="Go('<?php echo $url;?>');"/>
<div class="blank-16"></div>
<input type="button" value="返回" class="btn" onclick="Go('?action=index');"/>
<div class="blank-32"></div>
</div>
<?php } else if($action == 'sms') { ?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">短信找回</div>
<div class="head-bar-right"><a href="?action=index"><span>取消</span></a></div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($step == 2) { ?>
<div class="ui-ok">
<?php if($_userid) { ?>
<p>支付密码修改成功</p>
<input type="button" value="立即返回" class="btn-green" onclick="Go('<?php echo DT_MOB;?>my.php');"/>
<?php } else { ?>
<p>登录密码修改成功</p>
<input type="button" value="立即登录" class="btn-green" onclick="Go('<?php echo $DT['file_login'];?>?username=<?php echo $username;?>&forward=<?php echo urlencode(DT_MOB.'my.php');?>');"/>
<?php } ?>
</div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<div class="ui-form">
<p>新<?php if($_userid) { ?>支付<?php } else { ?>登录<?php } ?>密码<em>*</em><b id="dpassword"></b></p>
<div><input type="password" name="password" id="password" placeholder="新<?php if($_userid) { ?>支付<?php } else { ?>登录<?php } ?>密码" onblur="validator();" autocomplete="off"/></div>
<p>重复新密码<em>*</em><b id="dcpassword"></b></p>
<div><input type="password" name="cpassword" id="cpassword" placeholder="再输入一遍新密码" autocomplete="off"/></div>
<p>短信验证码<em>*</em><b id="dcode"></b></p>
<div><input type="tel" name="code" id="code" placeholder="已发送至手机"/></div>
<div class="blank-16"></div>
<input type="submit" name="submit" value="立即修改" class="btn-blue"/>
<div class="blank-16"></div>
<input type="button" value="重新发送" class="btn" onclick="Go('?action=sms');"/>
<div class="blank-32"></div>
</div>
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
<div class="ui-form">
<p>手机号码<em>*</em><b id="dmobile"></b></p>
<div><input type="tel" name="mobile" id="mobile" value="<?php echo $mobile;?>" placeholder="已经认证的手机号码"<?php if($_userid && $mobile) { ?> readonly<?php } ?>/></div>
<p>验证码<em>*</em><b id="dcaptcha"></b></p>
<div><?php include template('captcha', 'chip');?></div>
<div class="blank-16"></div>
<input type="submit" name="submit" value="下一步" class="btn-blue" id="send_code"/>
<div class="blank-32"></div>
</div>
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
<?php } else if($action == 'mail') { ?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">邮箱找回</div>
<div class="head-bar-right"><a href="?action=index"><span>取消</span></a></div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($step == 2) { ?>
<div class="ui-ok">
<?php if($_userid) { ?>
<p>支付密码修改成功</p>
<input type="button" value="立即返回" class="btn-green" onclick="Go('<?php echo DT_MOB;?>my.php');"/>
<?php } else { ?>
<p>登录密码修改成功</p>
<input type="button" value="立即登录" class="btn-green" onclick="Go('<?php echo $DT['file_login'];?>?username=<?php echo $username;?>&forward=<?php echo urlencode(DT_MOB.'my.php');?>');"/>
<?php } ?>
</div>
<?php } else if($step == 1) { ?>
<form method="post" action="?" autocomplete="off" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<div class="ui-form">
<p>新<?php if($_userid) { ?>支付<?php } else { ?>登录<?php } ?>密码<em>*</em><b id="dpassword"></b></p>
<div><input type="password" name="password" id="password" placeholder="新<?php if($_userid) { ?>支付<?php } else { ?>登录<?php } ?>密码" onblur="validator();" autocomplete="off"/></div>
<p>重复新密码<em>*</em><b id="dcpassword"></b></p>
<div><input type="password" name="cpassword" id="cpassword" placeholder="再输入一遍新密码" autocomplete="off"/></div>
<p>邮件验证码<em>*</em><b id="dcode"></b></p>
<div><input type="tel" name="code" id="code" placeholder="已发送至邮箱"/></div>
<div class="blank-16"></div>
<input type="submit" name="submit" value="立即修改" class="btn-blue"/>
<div class="blank-16"></div>
<input type="button" value="重新发送" class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/>
<div class="blank-32"></div>
</div>
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
<div class="ui-form">
<p>邮箱地址<em>*</em><b id="demail"></b></p>
<div><input type="email" name="email" id="email" value="<?php echo $email;?>" placeholder="注册时填写的邮箱地址"<?php if($_userid && $email) { ?> readonly<?php } ?>/></div>
<p>验证码<em>*</em><b id="dcaptcha"></b></p>
<div><?php include template('captcha', 'chip');?></div>
<div class="blank-16"></div>
<input type="submit" name="submit" value="下一步" class="btn-blue" id="send_code"/>
<div class="blank-32"></div>
</div>
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
<?php } else { ?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">找回密码</div>
<div class="head-bar-right"><a href="<?php echo DT_MOB;?>my.php"><span>取消</span></a></div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="blank-20"></div>
<div class="list-set">
<ul>
<?php if($could_email) { ?>
<li><div><a href="?action=mail">通过电子邮箱找回</a></div></li>
<?php } ?>
<?php if($could_mobile) { ?>
<li><div><a href="?action=sms">通过手机短信找回</a></div></li>
<?php } ?>
<li><div><a href="?action=contact">联系客服人工申诉</a></div></li>
</ul>
</div>
<div class="blank-20"></div>
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