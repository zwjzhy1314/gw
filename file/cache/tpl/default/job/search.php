<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="nav bd-b"><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>search.php">搜索</a></div>
</div>
<div class="m m2">
<div class="m2l">
<form action="<?php echo $MOD['linkurl'];?>search.php" id="fsearch">
<div class="sort">
<div class="sort-k">关键词</div>
<div class="sort-v">
<input type="text" size="60" name="kw" value="<?php echo $kw;?>"/> &nbsp;
<input type="checkbox" name="level" id="level" value="1"<?php if($level) { ?> checked<?php } ?>/> 推荐 &nbsp;
<input type="checkbox" name="vip" id="vip" value="1"<?php if($vip) { ?> checked<?php } ?>/> <?php echo VIP;?> &nbsp;
</div>
<div class="c_b"></div>
</div>
<div class="sort">
<div class="sort-k">行业</div>
<div class="sort-v">
<?php echo $category_select;?>
<b>地区</b>
<?php echo $area_select;?>
<b>日期</b>
<?php echo dcalendar('fromdate', $fromdate, '');?> 至 <?php echo dcalendar('todate', $todate, '');?>
</div>
<div class="c_b"></div>
</div>
<div class="sort">
<div class="sort-k">待遇</div>
<div class="sort-v">
<input type="text" size="10" name="minsalary" value="<?php echo $minsalary;?>"/> ~ <input type="text" size="10" name="maxsalary" value="<?php echo $maxsalary;?>"/> &nbsp;
<select name="type">
<?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<option value="<?php echo $k;?>"<?php if($type==$k) { ?> selected<?php } ?>><?php echo $v;?></option>
<?php } } ?>
</select> &nbsp;
<select name="gender">
<?php if(is_array($GENDER)) { foreach($GENDER as $k => $v) { ?>
<option value="<?php echo $k;?>"<?php if($gender==$k) { ?> selected<?php } ?>><?php echo $v;?></option>
<?php } } ?>
</select> &nbsp;
<select name="marriage">
<?php if(is_array($MARRIAGE)) { foreach($MARRIAGE as $k => $v) { ?>
<option value="<?php echo $k;?>"<?php if($marriage==$k) { ?> selected<?php } ?>><?php echo $v;?></option>
<?php } } ?>
</select> &nbsp;
<select name="education">
<?php if(is_array($EDUCATION)) { foreach($EDUCATION as $k => $v) { ?>
<option value="<?php echo $k;?>"<?php if($education==$k) { ?> selected<?php } ?>><?php echo $v;?></option>
<?php } } ?>
</select> &nbsp;
<select name="experience">
<option value="0"<?php if($experience==0) { ?> selected<?php } ?>>工作经验</option>
<script type="text/javascript">
for(i=1;i<21;i++) {
document.write('<option value="'+i+'"'+(i==<?php echo $experience;?> ? ' selected' : '')+'>'+i+'年以上</option>');
}
</script>
</select>
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
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<div class="list">
<table>
<tr align="center">
<td width="10"> </td>
<td align="left"><h3><span class="f_r"><?php if($t['vip']) { ?><img src="<?php echo DT_SKIN;?>image/vip_<?php echo $t['vip'];?>.gif" alt="<?php echo VIP;?>" title="<?php echo VIP;?>:<?php echo $t['vip'];?>级"/><?php } ?></span><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></h3><a href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo $t['company'];?></a></td>
<td width="150"><?php echo $CATEGORY[$t['parentid']]['catname'];?></td>
<td width="150" class="f_orange">
<?php if($t['minsalary'] && $t['maxsalary']) { ?>
<?php echo $t['minsalary'];?>-<?php echo $t['maxsalary'];?><?php echo $DT['money_unit'];?>/月
<?php } else if($t['minsalary']) { ?>
<?php echo $t['minsalary'];?><?php echo $DT['money_unit'];?>/月以上
<?php } else if($t['maxsalary']) { ?>
<?php echo $t['maxsalary'];?><?php echo $DT['money_unit'];?>/月以内
<?php } else { ?>
面议
<?php } ?>
</td>
<td width="120"><?php echo area_pos($t['areaid'], '');?></td>
<td width="100">
<?php if($t['minage'] && $t['maxage']) { ?>
<?php echo $t['minage'];?>-<?php echo $t['maxage'];?>岁
<?php } else if($t['minage']) { ?>
<?php echo $t['minage'];?>岁以上
<?php } else if($t['maxage']) { ?>
<?php echo $t['maxage'];?>岁以内
<?php } else { ?>
不限年龄
<?php } ?>
</td>
<td width="50"><?php if($t['total']) { ?><?php echo $t['total'];?>人<?php } else { ?>若干<?php } ?></td>
<td width="150" class="f_gray"><?php echo timetodate($t['edittime'], 5);?></td>
</tr>
</table>
</div>
<?php } } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
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