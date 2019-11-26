<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m m1">
<div class="m1l">
<?php if($itemid) { ?>
<h1 class="title"><?php echo $title;?></h1>
<div class="info f_gray"><span class="f_r c_p"><span onclick="Print();">[打印]</span></span>发布时间：<?php echo $adddate;?>&nbsp;&nbsp;&nbsp;&nbsp;有效期：<?php echo $fromdate;?> 至 <?php echo $todate;?>&nbsp;&nbsp;&nbsp;&nbsp;点击：<span id="hits"><?php echo $hits;?></span></div>
<div class="content" id="content"><?php echo $content;?></div>
<?php } else { ?>
<table cellpadding="16" cellspacing="0" class="tb">
<tr>
<?php if(!$typeid) { ?><th width="120">类别</th><?php } ?>
<th>标题</th>
<th width="120">点击</th>
<th width="120">发布时间</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center">
<?php if(!$typeid) { ?><td class="px14"><a href="<?php echo $url;?><?php echo list_url($v['typeid']);?>"><?php echo $v['typename'];?></a></td><?php } ?>
<td align="left" class="px14"><a href="<?php echo $v['linkurl'];?>"<?php if($v['islink']) { ?> target="_blank"<?php } ?>><?php echo $v['title'];?></a></td>
<td class="f_gray"><?php echo $v['hits'];?></td>
<td class="f_gray"><?php echo $v['adddate'];?></td>
</tr>
<?php } } ?>
</table>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } ?>
</div>
<div class="m1r side">
<ul>
<li class="side_li" id="type_0"><a href="<?php echo $url;?>">公告中心</a></li>
<?php if(is_array($_TP['0'])) { foreach($_TP['0'] as $v0) { ?>
<li class="side_li" id="type_<?php echo $v0['typeid'];?>"><a href="<?php echo $url;?><?php echo list_url($v0['typeid']);?>"><?php echo $v0['typename'];?></a></li>
<?php if(isset($_TP['1'][$v0['typeid']])) { ?>
<?php if(is_array($_TP['1'][$v0['typeid']])) { foreach($_TP['1'][$v0['typeid']] as $v1) { ?>
<li class="side_li" id="type_<?php echo $v1['typeid'];?>"><a href="<?php echo $url;?><?php echo list_url($v1['typeid']);?>">&nbsp;|-- <?php echo $v1['typename'];?></a></li>
<?php } } ?>
<?php } ?>
<?php } } ?>
</ul>
<form action="index.php"><input type="search" name="kw" value="<?php echo $kw;?>" ondblclick="if(this.value){Go('./');}" placeholder="搜索" title="输入关键词，按回车搜索"/></form>
</div>
<div class="c_b"></div>
</div>
<script type="text/javascript">$(function(){$('#type_<?php echo $typeid;?>').attr('class', 'side_on');});</script>
<?php include template('footer');?>