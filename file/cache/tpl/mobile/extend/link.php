<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php if($action=='reg') { ?>申请链接<?php } else { ?><?php if($typeid) { ?><?php echo $TYPE[$typeid]['typename'];?><?php } else { ?>友情链接<?php } ?><?php } ?></div>
<div class="head-bar-right">
<?php if($action=='reg') { ?>
<a href="<?php echo $mob;?>" data-transition="slideup" data-direction="reverse"><span>取消</span></a>
<?php } else { ?>
<a href="javascript:window.scrollTo(0,0);$('#<?php echo $ext;?>-<?php echo $typeid;?>-<?php echo $page;?>-<?php echo $itemid;?>').slideToggle(300);"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div id="<?php echo $ext;?>-<?php echo $typeid;?>-<?php echo $page;?>-<?php echo $itemid;?>" style="display:none;">
<div class="blank-35"></div>
<div class="list-set">
<ul>
<li><div><a href="<?php echo $mob;?>index.php?action=reg" data-transition="slideup">申请链接</a></div></li>
<?php if(is_array($_TP['0'])) { foreach($_TP['0'] as $v0) { ?>
<li<?php if($typeid==$v0['typeid']) { ?> style="background:#F6F6F6;"<?php } ?>><div><a href="<?php echo $mob;?><?php echo list_url($v0['typeid']);?>"><?php echo $v0['typename'];?></a></div></li>
<?php if(isset($_TP['1'][$v0['typeid']])) { ?>
<?php if(is_array($_TP['1'][$v0['typeid']])) { foreach($_TP['1'][$v0['typeid']] as $v1) { ?>
<li<?php if($typeid==$v1['typeid']) { ?> style="background:#F6F6F6;"<?php } ?>><div><a href="<?php echo $mob;?><?php echo list_url($v1['typeid']);?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v1['typename'];?></a></div></li>
<?php } } ?>
<?php } ?>
<?php } } ?>
</ul>
</div>
<div class="blank-35 bd-b"></div>
</div>
<?php if($action == 'reg') { ?>
<div class="ui-form">
<form action="<?php echo $mob;?>index.php" method="post" data-ajax="false" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<?php if($MOD['link_request']) { ?>
<p>链接说明</p>
<div><?php echo $MOD['link_request'];?></div>
<?php } ?>
<p>网站分类<em>*</em><b id="dtypeid"></b></p>
<div><?php echo $type_select;?></div>
<p>网站名称<em>*</em><b id="dtitle"></b></p>
<div><input type="text" name="post[title]" id="title"/></div>
<p>网站地址<em>*</em><b id="dlinkurl"></b></p>
<div><input type="url" name="post[linkurl]" id="linkurl"/></div>
<p>网站LOGO</p>
<div><input type="url" name="post[thumb]" id="thumb"/></div>
<p>网站介绍</p>
<div><textarea name="post[introduce]" id="introduce"></textarea></div>
<p>验证码<em>*</em><b id="dcaptcha"></b></p>
<div><?php include template('captcha', 'chip');?></div>
<div class="blank-16"></div>
<input type="submit" name="submit" class="btn-green" value="提交申请"/>
<div class="blank-32"></div>
</form>
</div>
<?php } else { ?>
<?php if($typeid) { ?>
<?php $lists=tag("table=link&condition=thumb!='' and status=3 and username='' and typeid IN (".type_child($typeid, $TYPE).")&areaid=$cityid&pagesize=140&order=listorder desc,itemid desc&template=null");?>
<?php $tags=tag("table=link&condition=thumb='' and status=3 and username='' and typeid IN (".type_child($typeid, $TYPE).")&areaid=$cityid&pagesize=140&order=listorder desc,itemid desc&template=null");?>
<?php } else { ?>
<?php $lists=tag("table=link&condition=status=3 and thumb!='' and username=''&pagesize=140&order=listorder desc,itemid desc&areaid=$cityid&template=null");?>
<?php $tags=tag("table=link&condition=status=3 and thumb='' and username=''&pagesize=140&order=listorder desc,itemid desc&areaid=$cityid&template=null");?>
<?php } ?>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>" rel="external" target="_blank"><img src="<?php echo $v['thumb'];?>" width="88" height="31" alt="" style="float:right;margin:24px 0 0 0;"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>" rel="external" target="_blank"><strong><?php echo $v['title'];?></strong></a></li>
<li><span><?php echo $v['linkurl'];?></span></li>
</ul>
</div>
<?php } } ?>
<?php } ?>
<?php if($tags) { ?>
<?php if(is_array($tags)) { foreach($tags as $v) { ?>
<div class="list-img">
<ul>
<li><a href="<?php echo $v['linkurl'];?>" rel="external" target="_blank"><strong><?php echo $v['title'];?></strong></a></li>
<li><span><?php echo $v['linkurl'];?></span></li>
</ul>
</div>
<?php } } ?>
<?php } ?>
<?php } ?>
<?php if($action == 'reg') { ?>
<script type="text/javascript">
function check() {
var l;
var f;
f = 'typeid';
l = Dd(f).value;
if(l == 0) {
Dmsg('请选择分类', f);
return false;
}
f = 'title';
l = Dd(f).value.length;
if(l < 2) {
Dmsg('请输入网站名称', f);
return false;
}
f = 'linkurl';
l = Dd(f).value.length;
if(l < 12) {
Dmsg('请输入网站地址', f);
return false;
}
f = 'captcha';
if($('#c'+f).html().indexOf('ok.png') == -1) {
Dmsg('请填写验证码', f);
return false;
}
}
</script>
<?php } ?>
<?php include template('footer');?>