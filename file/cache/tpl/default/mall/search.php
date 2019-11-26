<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="nav bd-b"><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>search.php">搜索</a></div>
</div>
<div class="m m2">
<div class="m2l">
<form action="<?php echo $MOD['linkurl'];?>search.php" id="fsearch">
<input type="hidden" name="list" id="list" value="<?php echo $list;?>"/>
<div class="sort">
<div class="sort-k">关键词</div>
<div class="sort-v">
<input type="text" size="50" name="kw" value="<?php echo $kw;?>"/> &nbsp;
<?php if(is_array($sfields)) { foreach($sfields as $k => $v) { ?>
<input type="radio" name="fields" value="<?php echo $k;?>" id="fd_<?php echo $k;?>"<?php if($fields==$k) { ?> checked<?php } ?>/><label for="fd_<?php echo $k;?>"> <?php echo $v;?></label> &nbsp;
<?php } } ?>
</div>
<div class="c_b"></div>
</div>
<div class="sort">
<div class="sort-k">行业</div>
<div class="sort-v">
<?php echo $category_select;?>
<b>日期</b>
<?php echo dcalendar('fromdate', $fromdate, '');?> 至 <?php echo dcalendar('todate', $todate, '');?> &nbsp;
<input type="checkbox" name="vip" id="vip" value="1"<?php if($vip) { ?> checked<?php } ?>/><?php echo VIP;?> &nbsp;
</div>
<div class="c_b"></div>
</div>
<div class="sort">
<div class="sort-k">地区</div>
<div class="sort-v">
<?php echo $area_select;?>
<b>价格</b>
<input type="text" size="10" name="minprice" value="<?php echo $minprice;?>"/> ~ <input type="text" size="10" name="maxprice" value="<?php echo $maxprice;?>"/>
<b>排序</b>
<?php echo $order_select;?>
</div>
<div class="c_b"></div>
</div>
<?php if($CP) { ?><?php include template('property_search', 'chip');?><?php } ?>
<div class="sort">
<div class="sort-k">&nbsp;</div>
<div class="sort-v">
<input type="submit" value="搜 索" class="btn-blue"/>
<input type="button" value="重 搜" class="btn" onclick="Go('<?php echo $MOD['linkurl'];?>search.php');"/>
</div>
<div class="c_b"></div>
</div>
</form>
<?php if($page==1 && $kw) { ?>
<?php echo ad($moduleid,$catid,$kw,6);?>
<?php echo load('m'.$moduleid.'_k'.urlencode($kw).'.htm');?>
<?php } ?>
<?php if($tags) { ?>
<form method="post">
<div class="sell_tip" id="sell_tip" style="display:none;" title="双击关闭" ondblclick="Dh(this.id);">
<div>
<p>您可以</p>
<input type="submit" value="对比选中" onclick="this.form.action='<?php echo $MOD['linkurl'];?>compare.php';" class="tool-btn"/> 或 
<input type="submit" value="批量购买" onclick="this.form.action='<?php echo $MOD['linkurl'];?>cart.php';" class="tool-btn"/>
</div>
</div>
<div class="img_tip" id="img_tip" style="display:none;">&nbsp;</div>
<div class="tool">
<table>
<tr>
<td width="25" align="center" title="全选/反选"><input type="checkbox" onclick="checkall(this.form);"/></td>
<td width="10"> </td>
<td>
<input type="submit" value="对比选中" onclick="this.form.action='<?php echo $MOD['linkurl'];?>compare.php';" class="tool-btn"/>&nbsp;
<input type="submit" value="批量购买" onclick="this.form.action='<?php echo $MOD['linkurl'];?>cart.php';" class="tool-btn"/>
</td>
<td align="right">
<?php if($list == 1) { ?>
<img src="<?php echo DT_SKIN;?>image/list_img_on.gif" width="16" height="16" alt="图片列表" align="absmiddle"/>&nbsp;
<?php } else { ?>
<img src="<?php echo DT_SKIN;?>image/list_img.gif" width="16" height="16" alt="图片列表" align="absmiddle" class="c_p" onclick="Dd('list').value=1;Dd('fsearch').submit();"/>&nbsp;
<?php } ?>
<?php if($list == 0) { ?>
<img src="<?php echo DT_SKIN;?>image/list_mix_on.gif" width="16" height="16" alt="图文列表" align="absmiddle"/>&nbsp;
<?php } else { ?>
<img src="<?php echo DT_SKIN;?>image/list_mix.gif" width="16" height="16" alt="图文列表" align="absmiddle" class="c_p" onclick="Dd('list').value=0;Dd('fsearch').submit();"/>&nbsp;
<?php } ?>
</td>
</tr>
</table>
</div>

<?php if($list==1) { ?>
<table cellpadding="5" cellspacing="5" width="100%">
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<?php if($k%5==0) { ?><tr><?php } ?>
<td valign="top" width="20%" id="item_<?php echo $t['itemid'];?>">
<table cellpadding="3" cellspacing="3" width="100%">
<tr align="center">
<td class="thumb"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo imgurl($t['thumb'], 160);?>" width="160" height="160" alt="" class="bd"/></a></td>
</tr>
<tr align="center">
<td class="thumb">
<ul>
<li><input type="checkbox" id="check_<?php echo $t['itemid'];?>" name="itemid[]" value="<?php echo $t['itemid'];?>" onclick="sell_tip(this, <?php echo $t['itemid'];?>);"/> <a href="<?php echo $t['linkurl'];?>" target="_blank" class="px14 f_n"><?php echo $t['title'];?></a></li>
</ul>
<div style="padding:6px 0;">
<span class="f_red"><?php echo $DT['money_sign'];?><strong class="px14"><?php echo $t['price'];?></strong></span><br/>
<a href="<?php echo $MODULE['2']['linkurl'];?>cart.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $t['itemid'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/addcart.gif" title="加入购物车" style="margin-top:10px;border:none;"/></a>
</div>
<ul>
<li><?php if($t['vip']) { ?><img src="<?php echo DT_SKIN;?>image/vip_<?php echo $t['vip'];?>.gif" alt="<?php echo VIP;?>" title="<?php echo VIP;?>:<?php echo $t['vip'];?>级" style="border:none;" align="absmiddle"/>&nbsp;<?php } ?><a href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo $t['company'];?></a></li>
</ul>
</td>
</tr>
<tr align="center">
<td>
<?php if($t['username'] && $DT['im_web']) { ?><?php echo im_web($t['username'].'&mid='.$moduleid.'&itemid='.$t['itemid']);?>&nbsp;<?php } ?>
<?php if($t['qq'] && $DT['im_qq']) { ?><?php echo im_qq($t['qq']);?>&nbsp;<?php } ?>
<?php if($t['wx'] && $DT['im_wx']) { ?><?php echo im_wx($t['wx'], $t['username']);?>&nbsp;<?php } ?>
<?php if($t['ali'] && $DT['im_ali']) { ?><?php echo im_ali($t['ali']);?>&nbsp;<?php } ?>
<?php if($t['skype'] && $DT['im_skype']) { ?><?php echo im_skype($t['skype']);?></a>&nbsp;<?php } ?>
</td>
</tr>
</table>
</td>
<?php if($k%5==4) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } else { ?>
<?php include template('list-'.$module, 'tag');?>
<?php } ?>
<div class="tool">
<table>
<tr height="30">
<td width="25"></td>
<td>
<input type="submit" value="对比选中" onclick="this.form.action='<?php echo $MOD['linkurl'];?>compare.php';" class="tool-btn"/>&nbsp;
<input type="submit" value="批量购买" onclick="this.form.action='<?php echo $MOD['linkurl'];?>cart.php';" class="tool-btn"/>
</td>
<td></td>
</tr>
</table>
</div>
</form>
<?php } else { ?>
<?php include template('empty', 'chip');?>
<?php } ?>
</div>
<div class="m2r">
<?php if($kw) { ?>
<div class="b10"></div>
<div class="head-sub"><strong>相关搜索</strong></div>
<div class="list-txt">
<ul>
<?php if(is_array($MODULE)) { foreach($MODULE as $mod) { ?><?php if($mod['moduleid']>3 && $mod['moduleid']!=$moduleid && !$mod['islink']) { ?><li><a href="<?php echo $mod['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($kw));?>">在 <span class="f_red"><?php echo $mod['name'];?></span> 找 <?php echo $kw;?></a></li><?php } ?><?php } } ?>
</ul>
</div>
<?php echo tag("moduleid=$moduleid&table=keyword&condition=moduleid=$moduleid and status=3 and word<>'$kw' and keyword like '%$keyword%'&pagesize=10&order=total_search desc&template=list-search_relate", -2);?>
<?php } ?>
<div class="sponsor"><?php echo ad($moduleid,$catid,$kw,7);?></div>
<div class="head-sub"><strong>今日排行</strong></div>
<div class="list-rank">
<?php echo tag("moduleid=$moduleid&table=keyword&condition=moduleid=$moduleid and status=3 and updatetime>$today_endtime-86400&pagesize=9&order=today_search desc&key=today_search&template=list-search_rank");?>
</div>
<div class="head-sub"><strong>本周排行</strong></div>
<div class="list-rank">
<?php echo tag("moduleid=$moduleid&table=keyword&condition=moduleid=$moduleid and status=3 and updatetime>$today_endtime-86400*7&pagesize=9&order=week_search desc&key=week_search&template=list-search_rank");?>
</div>
<div class="head-sub"><strong>本月排行</strong></div>
<div class="list-rank">
<?php echo tag("moduleid=$moduleid&table=keyword&condition=moduleid=$moduleid and status=3 and updatetime>$today_endtime-86400*30&pagesize=9&order=week_search desc&key=week_search&template=list-search_rank");?>
</div>
</div>
<div class="c_b"></div>
</div>
<?php include template('footer');?>