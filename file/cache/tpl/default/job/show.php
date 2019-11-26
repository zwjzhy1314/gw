<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content',img_max_width=<?php echo $MOD['max_width'];?>;</script>
<div class="m">
<div class="nav"><div><img src="<?php echo DT_SKIN;?>image/ico-share.png" class="share" title="分享好友" onclick="Dshare(<?php echo $moduleid;?>, <?php echo $itemid;?>);"/></div><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>&gt;</i> <?php echo cat_pos($CAT, ' <i>&gt;</i> ');?></div>
<div class="b20 bd-t"></div>
</div>
<div class="m m3">
<div class="m3l">
<h1 class="title" id="title"><?php echo $title;?></h1>
<div class="info"><span class="f_r"><img src="<?php echo DT_SKIN;?>image/ico-zoomin.png" width="16" height="16" alt="放大字体" class="c_p" onclick="fontZoom('+');"/>&nbsp;&nbsp;<img src="<?php echo DT_SKIN;?>image/ico-zoomout.png" width="16" height="16"  alt="缩小字体" class="c_p" onclick="fontZoom('-');"/></span>
日期：<?php echo $adddate;?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($MOD['hits']) { ?>浏览：<span id="hits"><?php echo $hits;?></span>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
</div>
<div class="b20"></div>
<table cellpadding="8" cellspacing="1" width="100%" bgcolor="#DDDDDD">
<tr bgcolor="#FFFFFF">
<td width="80">行业</td>
<td width="230"><?php echo $CATEGORY[$parentid]['catname'];?></td>
<td width="80">职位</td>
<td width="230"><?php echo $CATEGORY[$catid]['catname'];?></td>
</tr>
<tr bgcolor="#FFFFFF">
<td>招聘部门</td>
<td><?php echo $department;?></td>
<td>招聘人数</td>
<td><?php if($total) { ?><?php echo $total;?>人<?php } else { ?>若干<?php } ?></td>
</tr>
<tr bgcolor="#FFFFFF">
<td>工作地区</td>
<td><?php echo area_pos($areaid, '');?></td>
<td>工作性质</td>
<td><?php echo $TYPE[$type];?></td>
</tr>
<tr bgcolor="#FFFFFF">
<td>性别要求</td>
<td><?php echo $GENDER[$gender];?></td>
<td>婚姻要求</td>
<td><?php echo $MARRIAGE[$marriage];?></td>
</tr>
<tr bgcolor="#FFFFFF">
<td>学历要求</td>
<td><?php echo $EDUCATION[$education];?></td>
<td>工作经验</td>
<td><?php if($experience) { ?><?php echo $experience;?>年以上<?php } else { ?>不限<?php } ?></td>
</tr>
<tr bgcolor="#FFFFFF">
<td>年龄要求</td>
<td><?php if($minage && $maxage) { ?><?php echo $minage;?>-<?php echo $maxage;?>岁<?php } else if($minage) { ?><?php echo $minage;?>岁以上<?php } else if($maxage) { ?><?php echo $maxage;?>岁以内<?php } else { ?>不限年龄<?php } ?></td>
<td>待遇水平</td>
<td><?php if($minsalary && $maxsalary) { ?><?php echo $minsalary;?>-<?php echo $maxsalary;?><?php echo $DT['money_unit'];?>/月<?php } else if($minsalary) { ?><?php echo $minsalary;?><?php echo $DT['money_unit'];?>/月以上<?php } else if($maxsalary) { ?><?php echo $maxsalary;?><?php echo $DT['money_unit'];?>/月以内<?php } else { ?>面议<?php } ?></td>
</tr>
<tr bgcolor="#FFFFFF">
<td>更新日期</td>
<td><?php echo $editdate;?></td>
<td>有效期至</td>
<td><?php echo $todate;?><?php if($expired) { ?><span class="f_red">[已过期]</span><?php } ?></td>
</tr>
</table>
<div class="b20"></div>
<?php if($content) { ?>
<div class="head-txt"><span><a href="javascript:;" onclick="SendFav(<?php echo $moduleid;?>, <?php echo $itemid;?>);">收藏<i>&gt;</i></a></span><strong>职位描述</strong></div>
<div class="content" id="content"><?php echo $content;?></div>
<?php } ?>
<?php if($CP) { ?><?php include template('property_show', 'chip');?><?php } ?>
<?php if($username) { ?>
<center><input type="button" value="职位申请" class="btn-green" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('apply.php?itemid='.$itemid);?>');"/></center>
<?php } ?>
<?php if($com_intro) { ?>
<div class="head-txt"><span><a href="<?php echo userurl($username);?>" target="_blank">更多<i>&gt;</i></a></span><strong>公司介绍</strong></div>
<div class="content"><?php echo $com_intro;?></div>
<?php } ?>
<?php if($MOD['fee_award']) { ?>
<div class="award"><div onclick="Go('<?php echo $MODULE['2']['linkurl'];?>award.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');">打赏</div></div>
<?php } ?>
<?php include template('comment', 'chip');?>
</div>
<div class="m3r">
<div class="contact_head">联系方式</div>
<div class="contact_body" id="contact"><?php include template('contact', 'chip');?></div>
<?php if($username) { ?>
<div class="head-sub"><div><strong>该企业其他招聘</strong></div></div>
<div class="list-txt">
<?php echo tag("moduleid=$moduleid&condition=status=3 and username='$username'&pagesize=10&order=addtime desc", -2);?>
</div>
<?php } ?>
</div>
<div class="c_b"></div>
</div>
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?>
<?php include template('footer');?>