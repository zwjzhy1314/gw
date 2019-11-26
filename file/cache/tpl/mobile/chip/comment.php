<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($could_comment) { ?>
<div class="foot-bar-fix"></div>
<div class="foot-bar">
<div class="foot-comment">
<div class="bd-t bd-r bd-b bd-l" onclick="Go($('#comment-count').attr('href'));">发表评论</div>
<a href="<?php echo $EXT['comment_mob'];?><?php echo rewrite('index.php?mid='.$moduleid.'&itemid='.$itemid);?>" class="b" id="comment-count"><?php echo $comments;?>评</a>
</div>
</div>
<?php } ?>