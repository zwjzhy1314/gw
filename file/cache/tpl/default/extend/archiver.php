<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="<?php echo DT_CHARSET;?>"/>
<title><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php echo $DT['sitename'];?></title>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>archiver.css"/>
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width"/>
<meta name="generator" content="DESTOON B2B - www.destoon.com"/>
</head>
<body>
<div><a href="<?php echo $MODULE['1']['linkurl'];?>"><img src="<?php if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.gif<?php } ?>" alt="<?php echo $DT['sitename'];?>"/></a></div>
<div id="nav">
<?php if(is_array($N)) { foreach($N as $i => $m) { ?>
<div<?php if($mid==$m['moduleid']) { ?> class="on"<?php } ?>><a href="<?php echo $EXT['archiver_url'];?><?php echo $m['url'];?>"><span><?php echo $m['name'];?></span></a></div>
<?php } } ?>
</div>
<div id="title"><strong><?php echo $head_title;?></strong></div>
<div id="content">
<ul>
<?php if($list) { ?>
<?php if($T) { ?>
<?php if(is_array($T)) { foreach($T as $t) { ?>
<li><em><?php echo $t['adddate'];?></em><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></li>
<?php } } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } else { ?>
<li>暂无归档内容</li>
<?php } ?>
<?php } else { ?>
<?php if(is_array($M)) { foreach($M as $t) { ?>
<li><a href="<?php echo $EXT['archiver_url'];?><?php echo $t['url'];?>"><?php echo $t['title'];?></a></li>
<?php } } ?>
<?php } ?>
</ul>
</div>
</body>
</html>