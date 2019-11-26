<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<div class="list">
<table>
<tr align="center">
<td width="10"> </td>
<td align="left">
<ul>
<li><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><strong class="px14"><?php echo $t['title'];?></strong></a></li>
<li><?php if($t['vip']) { ?><img src="<?php echo DT_SKIN;?>image/vip_<?php echo $t['vip'];?>.gif" alt="<?php echo VIP;?>" title="<?php echo VIP;?>:<?php echo $t['vip'];?>级" align="absmiddle"/> <?php } ?><a href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo $t['company'];?></a></li>
</ul>
</td>
<td width="120" class="f_orange">
<?php if($t['minsalary'] && $t['maxsalary']) { ?>
<?php echo $t['minsalary'];?>-<?php echo $t['maxsalary'];?>元/月
<?php } else if($t['minsalary']) { ?>
<?php echo $t['minsalary'];?>元/月以上
<?php } else if($t['maxsalary']) { ?>
<?php echo $t['maxsalary'];?>元/月以内
<?php } else { ?>
面议
<?php } ?>
</td>
<td width="100"><?php echo area_pos($t['areaid'], '');?></td>
<td width="90" class="f_gray"><?php echo timetodate($t['edittime'], $datetype);?></td>
</tr>
</table>
</div>
<?php } } ?>
<?php if($showpage && $pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>