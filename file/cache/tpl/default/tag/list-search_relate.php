<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($tags) { ?>
<div class="head-sub"><strong>您是不是在找?</strong></div>
<div class="list-txt">
<ul>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li><span class="f_r">约<?php echo $t['items'];?>条</span><a href="<?php echo $MODULE[$moduleid]['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($t[word]));?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><?php echo $t['word'];?></a></li>
<?php } } ?>
</ul>
</div>
<?php } ?>