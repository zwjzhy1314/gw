<?php defined('IN_DESTOON') or exit('Access Denied');?><?php global $PROCESS;?>
<table cellpadding="0" cellspacing="0" width="100%">
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<tr>
<td class="kl-avatar"><a href="<?php echo $MODULE[$moduleid]['linkurl'];?><?php echo rewrite('search.php?username='.$t['username']);?>"><img src="<?php echo useravatar($t['username'], 'small');?>" width="20" height="20" title="<?php echo $t['passport'];?>" alt=""/></a></td>
<td class="kl-title"><div><?php if($t['credit']) { ?><span class="know_credit"><?php echo $t['credit'];?></span> <?php } ?><a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?> title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></div></td>
<td class="kl-answer"><?php echo $t['answer'];?>回答</td>
<td class="kl-process" width="50" align="center"><img src="<?php echo DT_SKIN;?>image/know_<?php echo $t['process'];?>.gif" title="<?php echo $PROCESS[$t['process']];?>"/></td>
<td class="kl-date"><?php echo timetodate($t['edittime'], $datetype);?></td>
</tr>
<?php } } ?>
</table>
<?php if($showpage && $pages) { ?></div><div class="pages"><?php echo $pages;?><?php } ?>