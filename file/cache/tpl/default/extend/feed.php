<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m m1">
<div class="m1l">
<?php if($action == 'diy') { ?>
<table cellpadding="16" cellspacing="0" class="tb">
<tr>
<th align="left">定制订阅</th>
</tr>
<tr>
<td>
<form action="index.php">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<select name="mid">
<option value="0">模块</option>
<?php if(is_array($FD)) { foreach($FD as $k => $v) { ?>
<option value="<?php echo $v['moduleid'];?>"<?php if($mid==$v['moduleid']) { ?> selected<?php } ?>><?php echo $v['name'];?></option>
<?php } } ?>
</select>&nbsp;
<input type="text" name="kw" size="20" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>关键词<?php } ?>" onfocus="if(this.value=='关键词')this.value='';"/>&nbsp;
<?php if($category_select) { ?><?php echo $category_select;?>&nbsp;<?php } ?>
<?php if($area_select) { ?><?php echo $area_select;?>&nbsp;<?php } ?>
<input type="submit" value=" 提交 " class="btn-green" style="width:66px;"/>&nbsp;&nbsp;
<input type="button" value=" 重设 " class="btn" style="width:66px;" onclick="Go('?action=<?php echo $action;?>');"/>
</form>
</td>
</tr>
</table>
<?php if($feed_code) { ?>
<div class="b20">&nbsp;</div>
<table cellpadding="16" cellspacing="0" class="tb">
<tr>
<th width="80">频道</th>
<th>订阅地址</th>
<th width="60">订阅</th>
</tr>
<tr align="center">
<td class="f_red"><?php echo $MODULE[$mid]['name'];?></td>
<td><input type="text" style="width:96%;" value="<?php echo $feed_code;?>" onmouseover="this.select();"/></td>
<td><a href="<?php echo $feed_code;?>" target="_blank"><img src="<?php echo DT_STATIC;?>file/image/xml.gif" alt="订阅"/></a></td>
</tr>
</table>
<?php } ?>
<?php } else { ?>
<table cellpadding="16" cellspacing="0" class="tb">
<tr>
<th width="80">频道</th>
<th>订阅地址</th>
<th width="60">订阅</th>
</tr>
<?php if(is_array($FD)) { foreach($FD as $k => $v) { ?>
<tr align="center">
<td><a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo $v['name'];?></a></td>
<td><input type="text" style="width:96%;" value="<?php echo $v['rssurl'];?>" onmouseover="this.select();"/></td>
<td><a href="<?php echo $v['rssurl'];?>" target="_blank"><img src="<?php echo DT_STATIC;?>file/image/xml.gif" alt="订阅"/></a></td>
</tr>
<?php } } ?>
</table>
<?php } ?>
</div>
<div class="m1r side">
<ul>
<li class="side_li" id="type_all"><a href="./">RSS订阅</a></li>
<?php if($MOD['feed_enable']==2) { ?><li class="side_li" id="type_diy"><a href="index.php?action=diy">定制订阅</a></li><?php } ?>
</ul>
</div>
<div class="c_b"></div>
</div>
<script type="text/javascript">$(function(){$('#type_<?php if($action=='diy') { ?>diy<?php } else { ?>all<?php } ?>').attr('class', 'side_on');});</script>
<?php include template('footer');?>