<?php defined('IN_DESTOON') or exit('Access Denied');?><ul class="am-list">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li class="am-g am-list-item-dated"><a href="<?php echo $t['linkurl'];?>" class="am-list-item-hd "><i class="am-icon-genderless"></i><?php echo $t['title'];?></a><?php if($datetype) { ?><span class="am-list-date"> <?php echo timetodate($t['addtime'], $datetype);?></span><?php } ?></li>
<?php } } ?>
</ul>
<?php if($showpage && $pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>