<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m m1">
<div class="m1l">
<?php if($action == 'add') { ?>
<form action="<?php echo $url;?>index.php" method="post" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="16" cellspacing="0" class="tf">
<tr>
<td class="tl">留言类型</td>
<td>
<select name="post[type]" id="type">
<option value="">请选择</option>
<?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<option value="<?php echo $v;?>"><?php echo $v;?></option>
<?php } } ?>
</select>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 留言内容</td>
<td title="留言内容不支持任何语法，仅限文字"><textarea name="post[content]" rows="6" cols="80" id="content"><?php echo $content;?></textarea><br/>
<span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">与您联系</td>
<td>
<input type="radio" name="my" value="1" id="my_1" onclick="$('#gb_contact').show(300);"/> <label for="my_1">需要</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="my" value="0" id="my_0" checked onclick="$('#gb_contact').hide(100);"/> <label for="my_0">不需要</label>
</td>
</tr>
<tbody id="gb_contact" style="display:none;">
<tr>
<td class="tl">姓名</td>
<td>
<input type="text" name="post[truename]" size="10" id="truename" value="<?php echo $truename;?>"/>&nbsp;
<input type="checkbox" name="post[hidden]" value="1" id="hidden" checked/><label for="hidden" title="选择匿名后，姓名仅网站工作人员可见"> 匿名留言</label>
<span id="dtruename" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">电话</td>
<td>
<input type="text" name="post[telephone]" size="30" id="telephone" value="<?php echo $telephone;?>"/>
<span id="dtelephone" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">邮箱</td>
<td>
<input type="text" name="post[email]" size="30" id="email" value="<?php echo $email;?>"/>
<span id="demail" class="f_red"></span>
</td>
</tr>
<?php if($DT['im_qq']) { ?>
<tr>
<td class="tl">QQ</td>
<td><input type="text" size="20" name="post[qq]" id="qq" value="<?php echo $qq;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_wx']) { ?>
<tr>
<td class="tl">微信</td>
<td><input type="text" size="20" name="post[wx]" id="wx" value="<?php echo $wx;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_ali']) { ?>
<tr>
<td class="tl">阿里旺旺</td>
<td><input type="text" size="20" name="post[ali]" id="ali" value="<?php echo $ali;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_skype']) { ?>
<tr>
<td class="tl">Skype</td>
<td><input type="text" size="20" name="post[skype]" id="skype" value="<?php echo $skype;?>"/></td>
</tr>
<?php } ?>
</tbody>
<?php if($MOD['guestbook_captcha']) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td>
<?php include template('captcha', 'chip');?>
<span id="dcaptcha" class="f_red"></span>
</td>
</tr>
<?php } ?>
<tr>
<td class="tl"></td>
<td><input type="submit" name="submit" value="提 交" class="btn-green"/></td>
</tr>
</table>
</form>
<?php echo load('guest.js');?>
<?php } else { ?>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<table width="100%" cellpadding="16" cellspacing="1" bgcolor="#DDDDDD">
<tr>
<td align="right" bgcolor="#EEEEEE" width="200"><?php if($v['hidden']) { ?>匿名<?php } else { ?><?php echo $v['truename'];?><?php } ?> <?php echo $v['adddate'];?> 留言：</td>
<td bgcolor="#FFFFFF" style="font-size:14px;line-height:180%;"><?php echo $v['content'];?></td>
</tr>
<?php if($v['reply']) { ?>
<tr>
<td align="right" bgcolor="#EEEEEE">网站 <?php echo $v['editdate'];?> 回复：</td>
<td bgcolor="#FFFFFF" style="color:#D9251D;line-height:180%;"><?php echo $v['reply'];?></td>
</tr>
<?php } ?>
</table>
<div class="b20"></div>
<?php } } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } else { ?>
<br/><br/><br/><br/>
<center class="px16"><?php if($kw) { ?>未找到与“<span class="f_red"><?php echo $kw;?></span>”相关的留言，请调整关键词<a href="<?php echo $url;?>" class="b">重新搜索</a><?php } else { ?>暂时没有留言&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $url;?>index.php?action=add" class="b">来抢个沙发吧</a><?php } ?></center>
<br/><br/><br/><br/>
<?php } ?>
<?php } ?>
</div>
<div class="m1r side">
<ul>
<li class="side_li" id="type_home"><a href="<?php echo $url;?>">网站留言</a></li>
<li class="side_li" id="type_add"><a href="<?php echo $url;?>index.php?action=add">提交留言</a></li>
</ul>
<form action="<?php echo $url;?>index.php"><input type="search" name="kw" value="<?php echo $kw;?>" ondblclick="if(this.value){Go('<?php echo $url;?>');}" placeholder="搜索" title="输入关键词，按回车搜索"/></form>
</div>
<div class="c_b"></div>
</div>
<script type="text/javascript">$(function(){$('#type_<?php if($action=='add') { ?>add<?php } else { ?>home<?php } ?>').attr('class', 'side_on');});</script>
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