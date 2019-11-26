<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<div>
<a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><img src="<?php echo $t['thumb'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt=""/></a>
<ul>
<li><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><?php echo $t['title'];?></a></li>
<li><?php if($datetype) { ?><i><?php echo timetodate($t['addtime'], $datetype);?></i><?php } ?><em><?php echo $t['items'];?>张图片</em></li>
</ul>
</div>
<?php } } ?>
<?php if($showpage && $pages) { ?></div><div class="pages"><?php echo $pages;?><?php } else { ?><span class="c_b"></span><?php } ?>