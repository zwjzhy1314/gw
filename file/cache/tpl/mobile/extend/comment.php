<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">评论列表</div>
<div class="head-bar-right">
<?php if($EXT['comment_api']) { ?>
<a href="javascript:window.location.reload();"><span>刷新</span></a>
<?php } else { ?>
<a href="javascript:window.scrollTo(0,0);$('#box-btn').slideUp(300);$('#c1').show();$('#c0,#emoji').hide();" id="c0" style="display:none;"><span>取消</span></a>
<a href="javascript:window.scrollTo(0,0);$('#box-btn').slideDown(300);$('#c0').show();$('#c1').hide();" id="c1"><span>发表</span></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($EXT['comment_api'] == 'changyan') { ?>
<div class="main">
<div id="SOHUCS" sid="<?php echo $mid;?>-<?php echo $itemid;?>"></div>
<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" 
src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=<?php echo $EXT['comment_api_id'];?>&conf=<?php echo $EXT['comment_api_key'];?>">
</script>
</div>
<?php } else if($EXT['comment_api'] == 'duoshuo') { ?>
<div class="main" style="padding:0 10px;">
<div class="ds-thread" data-thread-key="<?php echo $mid;?>-<?php echo $itemid;?>" data-title="<?php echo $title;?>" data-url="<?php echo $linkurl;?>" data-image="<?php if($thumb) { ?><?php echo str_replace('.thumb.'.file_ext($thumb), '', $thumb);?><?php } ?>"></div>
<script type="text/javascript">
var duoshuoQuery = {short_name:"<?php echo $EXT['comment_api_id'];?>"};
(function() {
var ds = document.createElement('script');
ds.type = 'text/javascript';ds.async = true;
ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
ds.charset = 'UTF-8';
(document.getElementsByTagName('head')[0] 
 || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
</div>
<?php } else { ?>
<style type="text/css">
.quote{border:1px solid #DCDCDC;background:#FFFFFF;padding:10px;margin-bottom:10px;}
.quote_title {font-size:12px;color:#007AFF;}
.quote_time {font-size:11px;color:#999999;}
.quote_floor {float:right;font-size:10px;color:#999999;}
.quote_content {clear:both;}
.star_a {display:inline-block;margin:12px 10px 12px 0;padding:2px 8px;height:20px;line-height:20px;background:#FF6600;color:#FFFFFF;font-size:12px;border-radius:6px;}
.star_b {display:inline-block;margin:12px 10px 12px 0;padding:2px 8px;height:20px;line-height:20px;background:#EEEEEE;color:#333333;font-size:12px;border-radius:6px;}
.star_e {display:inline-block;margin:10px 0;padding:2px 8px;height:24px;line-height:24px;width:24px;background:url('<?php echo DT_MOB;?>static/img/chat-emoji.png') no-repeat center center;background-size:24px 24px;float:right;}
.emoji {height:180px;width:100%;background:#FFFFFF;display:none;}
.emoji table {width:100%;}
.emoji td {height:44px;text-align:center;}
.emoji td:hover {background:#F5F5F6;}
</style>
<?php if($faces) { ?>
<div id="emoji" class="emoji bd-b">
<table cellspacing="0" cellpadding="0">
<?php if(is_array($faces)) { foreach($faces as $k => $v) { ?>
<?php if($k%10==0) { ?><tr><?php } ?>
<td onclick="$('#content').val($('#content').val()+':<?php echo $v;?>)');"><img src="<?php echo DT_STATIC;?>file/face/<?php echo $v;?>.gif"/></td>
<?php if($k%10==9) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>
<?php } ?>
<div class="main">
<div class="ui-form bd-b">
<form method="post" id="comment-post">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="items" value="<?php echo $items;?>"/>
<input type="hidden" name="page" value="<?php echo $page;?>"/>
<input type="hidden" name="qid" value="0" id="qid"/>
<input type="hidden" name="submit" value="1"/>
<input type="hidden" name="star" value="3" id="star"/>
<div><textarea name="content" id="content" placeholder="我来说两句" onblur="window.scrollTo(0,0);" style="margin:6px 0;height:48px;border:none;" onfocus="$('#box-btn').slideDown(300);$('#c0').show();$('#c1').hide();"></textarea></div>
<section id="box-btn" style="display:none;">
<div class="bd-t" id="box-star">
<span class="star_e" onclick="$('#emoji').slideToggle('fast');"></span>
<span id="star_3" class="star_a" onclick="Dstar(3);">好评</span>
<span id="star_2" class="star_b" onclick="Dstar(2);">中评</span>
<span id="star_1" class="star_b" onclick="Dstar(1);">差评</span>
</div>
<?php if($need_captcha) { ?>
<div class="bd-t"><?php include template('captcha', 'chip');?></div>
<?php } ?>
<div class="blank-16 bd-t"></div>
<input type="button" class="btn-blue" value="发表评论" onclick="Dcomment();"/>
<div class="blank-16"></div>
</section>
</form>
</div>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="list-user">
<img src="<?php echo useravatar($v['uname']);?>" width="32" height="32"/>
<ul>
<li><span><?php echo $v['floor'];?>楼</span><a href="<?php echo userurl($v['uname']);?>" class="b" rel="external"><?php echo $v['name'];?></a></li>
<li><em><?php if($v['star']==1) { ?>差评<?php } else if($v['star']==2) { ?>中评<?php } else { ?>好评<?php } ?> <?php echo $v['addtime'];?></em></li>
</ul>
</div>
<div class="content">
<?php if($v['quotation']) { ?><?php echo $v['quotation'];?><?php } else { ?><?php echo $v['content'];?><?php } ?>
<?php if($v['reply']) { ?>
<br/><span class="px12 f_gray"><?php if($v['editor']) { ?><span style="color:red;">管理员</span><?php } else { ?><span style="color:blue;"><?php echo $v['replyer'];?></span><?php } ?> <?php echo timetodate($v['replytime'], 5);?> 回复： </span>
<br/><?php echo nl2br($v['reply']);?>
<?php } ?>
</div>
<?php } } ?>
<?php } else { ?>
<div class="list-empty">暂无评论</div>
<?php } ?>
</div>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<script type="text/javascript">
function Dstar(v) {
for(var i = 1; i < 4; i++) {
if(v == i) {
$('#star').val(i);
$('#star_'+i).attr('class', 'star_a');
} else {
$('#star_'+i).attr('class', 'star_b');
}
}
}
function Dcomment() {
var len;
len = $('#content').val().length;
if(len < <?php echo $MOD['comment_min'];?>) {
Dtoast('正文最少个<?php echo $MOD['comment_min'];?>字，已填写'+len+'个字');
return false;
}
if(len > <?php echo $MOD['comment_max'];?>) {
Dtoast('正文最多个<?php echo $MOD['comment_max'];?>字，已填写'+len+'个字');
return false;
}
<?php if($need_captcha) { ?>
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dtoast('请填写验证码');
return false;
}
<?php } ?>
$.post('index.php', $('#comment-post').serialize(), function(data) {
if(data.indexOf('alert(') == -1) {
Dtoast('评论发表成功');
setTimeout(function() {
if($('#page-last').length > 0) {
Go($('#page-last').attr('href'));
} else {
window.location.reload();
}
}, 1000);
} else {
var t0 = data.split("alert('");
var t1 = t0[1].split("')");
var msg = t1[0];
Dtoast(msg);
if(msg.indexOf('审核') != -1) {
setTimeout(function() {
window.location.reload();
}, 1000);
} else {
reloadcaptcha();
}
}
});
}
<?php if($need_captcha) { ?>
$(function(){
$('#captcha').on('blur', function(){window.scrollTo(0,0);});
$('#captcha').css({'width':'100px','border':'none','padding':'0','font-size':'16px'});
});
<?php } ?>
</script>
<?php } ?>
<?php include template('footer');?>