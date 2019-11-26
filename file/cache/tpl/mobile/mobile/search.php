<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback('<?php echo DT_MOB;?>');" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="<?php echo DT_MOB;?>channel.php" data-transition="slideup"><span>频道</span></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div style="background:#FFFFFF;padding:16px;">
<form action="<?php echo DT_MOB;?>api/search.php" id="dform" data-ajax="false">
<select name="mid" style="width:100%;height:34px;border:#D8D8D8 1px solid;font-size:16px;background:#FFFFFF;">
<?php if(is_array($MOB_MODULE)) { foreach($MOB_MODULE as $i => $m) { ?>
<option value="<?php echo $m['moduleid'];?>"<?php if($mid == $m['moduleid']) { ?> selected<?php } ?>><?php echo $m['name'];?></option>
<?php } } ?>
</select>
<div style="border:#D8D8D8 1px solid;margin:16px 0;padding:4px 6px;border-radius:4px;"><input name="kw" id="kw" value="<?php echo $kw;?>" type="search" style="width:100%;height:28px;line-height:28px;border:none;font-size:14px;padding:0;" placeholder="请输入关键词" onblur="window.scrollTo(0,0);" autofocus="autofocus"/></div>
<div style="padding:0;" onclick="Dsearch();">
<div class="btn-blue">搜 索</div>
</div>
</form>
</div>
<?php if($lists) { ?>
<div class="list-set">
<ul>
<li><div><span><a href="javascript:Dsheet('<a href=&#34;javascript:Dclear();Dsheet(0);&#34;><span style=&#34;color:red;&#34;>清空</span></a>', '取消', '确定要清空所有搜索记录吗？');">清空</a></span>搜索记录</div></li>
</ul>
</div>
<div class="main content">
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<a href="<?php echo $MODULE[$v['mid']]['mobile'];?><?php echo rewrite('search.php?kw='.urlencode($v['kw']));?>"><?php echo $v['kw'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<?php } } ?>
</div>
<?php } ?>
<script type="text/javascript">
function Dsearch() {
if(Dd('kw').value.length < 2) {
Dtoast('请输入关键词');
return false;
}
Dd('dform').submit();
}
function Dclear() {
$.post('?', {'action':'clear'}, function(data) {
if(data == 'ok') {
Dtoast('清理成功');
setTimeout(function() {
window.location.reload();
}, 1000);
} else {
Dtoast('操作失败');
}
});
}
</script>
<?php include template('footer');?>