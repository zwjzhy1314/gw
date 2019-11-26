<?php defined('IN_DESTOON') or exit('Access Denied');?><table cellpadding="0" cellspacing="0" width="100%">
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<tr>
<td class="jt-title"><div><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></div></td>
<td class="jt-salary"><div>
<?php if($t['minsalary'] && $t['maxsalary']) { ?>
<?php echo $t['minsalary'];?>-<?php echo $t['maxsalary'];?>元/月
<?php } else if($t['minsalary']) { ?>
<?php echo $t['minsalary'];?>元/月以上
<?php } else if($t['maxsalary']) { ?>
<?php echo $t['maxsalary'];?>元/月以内
<?php } else { ?>
面议
<?php } ?>
</div>
</td>
<td class="jt-company"><div><?php if($t['vip']) { ?><img src="<?php echo DT_SKIN;?>image/vip_<?php echo $t['vip'];?>.gif" alt="<?php echo VIP;?>" title="<?php echo VIP;?>:<?php echo $t['vip'];?>级" align="absmiddle"/> <?php } ?><a href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo $t['company'];?></a></div></td>
<td class="jt-area"><div><?php echo area_pos($t['areaid'], '', 1);?></div></td>
</tr>
<?php } } ?>
</table>