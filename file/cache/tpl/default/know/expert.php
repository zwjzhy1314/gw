<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="nav"><?php if($itemid) { ?><span class="f_r"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&action=add&askto=<?php echo $username;?>" target="_blank" class="b">向TA提问</a></span><?php } ?><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('expert.php?page=1');?>">专家</a><?php if($itemid) { ?> <i>&gt;</i> <?php echo $title;?><?php } ?></div>
</div>
<div class="m">
<?php if($itemid) { ?>
<table cellpadding="16" cellspacing="0" class="tb bd-t">
<tr>
<td rowspan="4" align="center">
<img src="<?php echo useravatar($username, 'large');?>" width="100" height="100" alt="" style="margin-bottom:16px;"/>
<?php if($DT['im_web']) { ?><?php echo im_web($username, 1);?><?php } ?>
</td>
<td align="center" width="100">姓名</td>
<td width="350"><?php echo $title;?> <span title="昵称">(<?php echo $passport;?>)</span></td>
<td align="center" width="100">被提问</td>
<td width="350"><?php echo $ask;?></td>
</tr>
<tr>
<td align="center">人气</td>
<td><?php echo $hits;?></td>
<td align="center">被采纳</td>
<td><?php echo $best;?></td>
</tr>
<tr>
<td align="center">回答</td>
<td><?php echo $answer;?></td>
<td align="center">采纳率</td>
<td><?php echo $rate;?></td>
</tr>
</table>
<div class="content"><?php if($major) { ?><strong>擅长领域</strong>：<?php echo $major;?><br/><?php } ?><?php echo $content;?></div>
<div class="head-txt"><strong>TA的回答</strong></div>
<div class="know-list"><?php echo tag("moduleid=$moduleid&condition=status=3 and process=3 and expert='$username'&order=updatetime desc&areaid=$cityid&pagesize=".$MOD['page_iresolve']."&datetype=4&template=list-know");?></div>
<?php } else { ?>
<?php if($lists) { ?>
<table cellpadding="16" cellspacing="0" class="tb">
<tr>
<th width="60">头像</th>
<th>姓名</th>
<th>擅长领域</th>
<th width="70">人气</th>
<th width="70">被提问</th>
<th width="70">回答</th>
<th width="70">被采纳</th>
<?php if($DT['im_web']) { ?><th width="40">交谈</th><?php } ?>
<th width="80">提问</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<tr bgcolor="#FFFFFF" align="center">
<td><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('expert.php?itemid='.$v['itemid']);?>" target="_blank"><img src="<?php echo useravatar($v['username']);?>" width="48" height="48"/></a></td>
<td><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('expert.php?itemid='.$v['itemid']);?>" target="_blank" class="b"><strong><?php echo $v['title'];?></strong></a></td>
<td><?php echo $v['major'];?></td>
<td><?php echo $v['hits'];?></td>
<td><?php echo $v['ask'];?></td>
<td><?php echo $v['answer'];?></td>
<td><?php echo $v['best'];?></td>
<?php if($DT['im_web']) { ?><td><?php echo im_web($v['username']);?></td><?php } ?>
<td><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&action=add&askto=<?php echo $v['username'];?>" target="_blank" class="b">提问</a></td>
</tr>
<?php } } ?>
</table>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } ?>
</div>
<?php include template('footer');?>