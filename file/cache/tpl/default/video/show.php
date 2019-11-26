<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content',img_max_width=<?php echo $MOD['max_width'];?>;</script>
<div class="m martop">
<div class="nav"><span class="f_r"><img src="<?php echo DT_SKIN;?>image/ico-share.png" class="share" title="分享好友" onclick="Dshare(<?php echo $moduleid;?>, <?php echo $itemid;?>);"/></span><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>></i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>></i> <?php echo cat_pos($CAT, ' <i>></i> ');?> <i>></i> <?php echo $title;?></div>
</div>
<div class="m">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td bgcolor="#000000" align="center"><div id="player"><?php include template('content', 'chip');?></div></td>
<td bgcolor="#333333" width="348" valign="top">
<div class="play-list">
<?php $num = 2;?>
<?php if($album) { ?>
<?php $tags=tag("moduleid=$moduleid&condition=status=3 and album='$album' and addtime>$addtime&order=addtime asc&pagesize=$num&template=null");?>
<?php } else if($username) { ?>
<?php $tags=tag("moduleid=$moduleid&condition=status=3 and username='$username' and addtime>$addtime&order=addtime asc&pagesize=$num&template=null");?>
<?php } else { ?>
<?php $tags=tag("moduleid=$moduleid&condition=status=3 and addtime>$addtime&catid=$catid&order=addtime asc&pagesize=$num&template=null");?>
<?php } ?>
<?php if($tags) { ?>
<?php if(is_array(array_reverse($tags))) { foreach(array_reverse($tags) as $i => $t) { ?>
<div title="<?php echo $t['alt'];?>">
<a href="<?php echo $t['linkurl'];?>">
<img src="<?php echo $t['thumb'];?>" width="100" height="75" alt=""/>
<ul>
<li><p><?php echo $t['alt'];?></p></li>
<li><span><?php echo $t['hits'];?>次播放</span></li>
</ul>
</a>
</div>
<?php } } ?>
<?php } ?>
<div title="<?php echo $title;?>" style="background:#0072C6;">
<a href="<?php echo $linkurl;?>">
<img src="<?php echo $thumb;?>" width="100" height="75" alt=""/>
<ul>
<li><p><?php echo $title;?></p></li>
<li><span><?php echo $hits;?>次播放</span></li>
</ul>
</a>
</div>
<?php $num = $num + $num - count($tags);?>
<?php if($album) { ?>
<?php $tags=tag("moduleid=$moduleid&condition=status=3 and album='$album' and addtime<$addtime&order=addtime desc&pagesize=$num&template=null");?>
<?php } else if($username) { ?>
<?php $tags=tag("moduleid=$moduleid&condition=status=3 and username='$username' and addtime<$addtime&order=addtime desc&pagesize=$num&template=null");?>
<?php } else { ?>
<?php $tags=tag("moduleid=$moduleid&condition=status=3 and addtime<$addtime&catid=$catid&order=addtime desc&pagesize=$num&template=null");?>
<?php } ?>
<?php if($tags) { ?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<div title="<?php echo $t['alt'];?>">
<a href="<?php echo $t['linkurl'];?>">
<img src="<?php echo $t['thumb'];?>" width="100" height="75" alt=""/>
<ul>
<li><p><?php echo $t['alt'];?></p></li>
<li><span><?php echo $t['hits'];?>次播放</span></li>
</ul>
</a>
</div>
<?php } } ?>
<?php } ?>
</div>
</td>
</tr>
</table>
</div>
<div class="m">
<div class="info">
<span class="f_r">
<?php if($keytags) { ?>
标签：
<?php if(is_array($keytags)) { foreach($keytags as $t) { ?>
<a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($t));?>" target="_blank" class="b"><?php echo $t;?></a>   
<?php } } ?>
<?php } ?>
<?php if($album) { ?>
专辑：
<a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($album));?>" target="_blank" class="b"><?php echo $album;?></a>
<?php } ?>
</span>
日期：<?php echo $adddate;?>    
<?php if($MOD['hits']) { ?>播放：<span id="hits"><?php echo $hits;?></span>    <?php } ?>
<?php if($could_comment) { ?><a href="<?php echo $EXT['comment_url'];?><?php echo rewrite('index.php?mid='.$moduleid.'&itemid='.$itemid);?>">评论：<?php echo $comments;?></a>    <?php } ?>
</div>
</div>
<div class="m o_h">
<?php if($CP) { ?><?php include template('property_show', 'chip');?><?php } ?>
<?php if($content) { ?><div class="content" id="content"><?php echo $content;?></div><?php } ?>
<?php if($MOD['fee_award']) { ?><div class="award"><div onclick="Go('<?php echo $MODULE['2']['linkurl'];?>award.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');">打赏</div></div><?php } ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo $CAT['linkurl'];?>">更多<i>></i></a></span><strong>推荐<?php echo $MOD['name'];?></strong></div>
<div class="list-img list0"><?php echo tag("moduleid=$moduleid&condition=status=3 and level>0&catid=$catid&areaid=$cityid&order=".$MOD['order']."&width=180&height=135&datetype=3&lazy=$lazy&template=list-video");?></div>
<?php if($MOD['page_comment']) { ?><?php include template('comment', 'chip');?><?php } ?>
</div>
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?>
<?php if($video_i) { ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/player.js"></script>
<script type="text/javascript">
$(function(){
if(UA.match(/(iphone|ipad|ipod|android|mac os)/i)) {
if(Dd('player').innerHTML.indexOf('embed') != -1) {
Dd('player').innerHTML = '<div class="player">'+player('<?php echo $video_s;?>', <?php echo $video_w;?>, <?php echo $video_h;?>, <?php echo $video_a;?>)+'</div>';
}
}
});
</script>
<?php } ?>
<?php include template('footer');?>