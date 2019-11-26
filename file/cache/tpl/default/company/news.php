<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="nav bd-b">
<span class="f_r">
<form action="<?php echo $MOD['linkurl'];?>news.php">
<input type="text" size="40" name="kw" value="<?php echo $kw;?>"/>&nbsp;
<input type="submit" value="搜 索" class="btn-blue"/>&nbsp;
<input type="button" value="重 搜" class="btn" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('news.php?page=1');?>');"/>
</form>
</span>
<a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>&gt;</i> <?php echo $L['news_title'];?></div>
</div>
<div class="m">
<div class="catlist">
<ul>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<li><i><?php echo timetodate($v['addtime'], 5);?></i><a href="<?php echo $v['linkurl'];?>" target="_blank" title="<?php echo $v['alt'];?>"><?php echo $v['title'];?></a></li>
<?php if($k && $k%5==4) { ?><li class="sp">&nbsp;</li><?php } ?>
<?php } } ?>
</ul>
</div>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
</div>
<?php include template('footer');?>