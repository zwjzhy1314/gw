<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php if($action=='add') { ?>提交留言<?php } else { ?>网站留言<?php } ?></div>
<div class="head-bar-right">
<?php if($action=='add') { ?>
<a href="<?php echo $mob;?>" data-transition="slideup" data-direction="reverse"><span>取消</span></a>
<?php } else { ?>
<a href="<?php echo $mob;?>index.php?action=add" data-transition="slideup"><span>留言</span></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($action == 'add') { ?>
<div class="ui-form">
<form action="<?php echo $mob;?>index.php" method="post" data-ajax="false" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<p>留言类型</p>
<div>
<select name="post[type]" id="type">
<option value="">请选择</option>
<?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<option value="<?php echo $v;?>"><?php echo $v;?></option>
<?php } } ?>
</select>
</div>
<p>留言内容<em>*</em><b id="dcontent"></b></p>
<div><textarea name="post[content]" id="content"><?php echo $content;?></textarea></div>
<p>与您联系</p>
<div>
<input type="radio" name="my" value="1" id="my_1" onclick="$('#gb_contact').show(300);"/><label for="my_1">需要</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="my" value="0" id="my_0" checked onclick="$('#gb_contact').hide(100);"/><label for="my_0">不需要</label>
</div>
<section id="gb_contact" style="display:none;">
<p>姓名</p>
<div><input type="text" name="post[truename]" id="truename" value="<?php echo $truename;?>" style="width:150px;"/></div>
<p>匿名</p>
<div>
<input type="radio" name="post[hidden]" value="1" id="hd_1" checked/><label for="hd_1">是</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="post[hidden]" value="0" id="hd_0"/><label for="hd_0">否</label>
</div>
<p>电话</p>
<div><input type="tel" name="post[telephone]" id="telephone" value="<?php echo $telephone;?>"/></div>
<p>邮箱</p>
<input type="email" name="post[email]" size="30" id="email" value="<?php echo $email;?>"/>
<?php if($DT['im_qq']) { ?>
<p>QQ</p>
<div><input type="tel" name="post[qq]" id="qq" value="<?php echo $qq;?>" style="width:50%;"/></div>
<?php } ?>
<?php if($DT['im_wx']) { ?>
<p>微信</p>
<div><input type="text" name="post[wx]" id="wx" value="<?php echo $wx;?>" style="width:50%;"/></div>
<?php } ?>
<?php if($DT['im_ali']) { ?>
<p>阿里旺旺</p>
<div><input type="text" name="post[ali]" id="ali" value="<?php echo $ali;?>" style="width:50%;"/></div>
<?php } ?>
<?php if($DT['im_skype']) { ?>
<p>Skype</p>
<div><input type="text" name="post[skype]" id="skype" value="<?php echo $skype;?>" style="width:50%;"/></div>
<?php } ?>
</section>
<?php if($MOD['guestbook_captcha']) { ?>
<p>验证码<em>*</em><b id="dcaptcha"></b></p>
<div><?php include template('captcha', 'chip');?></div>
<?php } ?>
<div class="blank-16"></div>
<input type="submit" name="submit" class="btn-green" value="提交留言"/>
<div class="blank-32"></div>
</div>
<?php } else { ?>
<?php if($lists) { ?>
<style type="text/css">.gcontent {background:#FFFFFF;padding:16px;font-size:16px;line-height:180%;}</style>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="blank-32"></div>
<div class="list-txt">
<ul>
<li onclick="$('#gc-<?php echo $v['itemid'];?>').slideToggle(300);"><div><span><?php echo $v['adddate'];?></span><strong><?php if($v['hidden']) { ?>匿名<?php } else { ?><?php echo $v['truename'];?><?php } ?></strong></div></li>
</div>
<div id="gc-<?php echo $v['itemid'];?>">
<div class="gcontent"><?php echo $v['content'];?></div>
<?php if($v['reply']) { ?>
<div class="list-txt">
<ul>
<li onclick="$('#gr-<?php echo $v['itemid'];?>').slideToggle(300);"><div><span><?php echo $v['editdate'];?></span><strong style="font-weight:normal;color:#D9251D;">网站回复</strong></div></li>
</div>
<div class="gcontent" id="gr-<?php echo $v['itemid'];?>"><?php echo $v['reply'];?></div>
<?php } ?>
</div>
<?php } } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } else { ?>
<div class="main content">
<br/><br/><br/><br/>
<center><?php if($kw) { ?>未找到与“<span class="f_red"><?php echo $kw;?></span>”相关的留言，请调整关键词<a href="<?php echo $mob;?>" class="b">重新搜索</a><?php } else { ?>暂时没有留言&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $mob;?>index.php?action=add" class="b">来抢个沙发吧</a><?php } ?></center>
<br/><br/><br/><br/>
</div>
<?php } ?>
<?php } ?>
<?php if($action == 'add') { ?>
<script type="text/javascript">
function check() {
var l;
var f;
f = 'content';
l = Dd(f).value.length;
if(l < 5 || l > 1000) {
Dmsg('内容应为5-1000字，当前已输入'+l+'字', f);
return false;
}
<?php if($MOD['guestbook_captcha']) { ?>
f = 'captcha';
if($('#c'+f).html().indexOf('ok.png') == -1) {
Dmsg('请填写验证码', f);
return false;
}
<?php } ?>
return true;
}
<?php if(isset($report)) { ?>
$(function(){
$('#type').val('不良信息');
Dd('content').value = Dd('content').value+"\n-------------------------------\n举报理由：\n";
});
<?php } ?>
</script>
<?php } ?>
<?php include template('footer');?>