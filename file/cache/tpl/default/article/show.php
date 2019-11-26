<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?><?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $DT['sitename'];?><?php } ?><?php } ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1,maximum-scale=1.0, user-scalable=0,user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  
  <link rel="alternate icon" type="<?php echo DT_STATIC;?>resource/img/hengwang-1.png" href="<?php echo DT_STATIC;?>resource/img/hengwang-1.png">
  <link rel="stylesheet" href="<?php echo DT_STATIC;?>resource/css/amazeui.css"/>
  <link rel="stylesheet" href="<?php echo DT_STATIC;?>resource/css/style.css"/>
  <link rel="stylesheet" href="<?php echo DT_STATIC;?>resource/css/news.css"/>
</head>
<body>
<script language="javascript" src="<?php echo DT_STATIC;?>resource/js/header.js"></script>
<script type="text/javascript">var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content',img_max_width=<?php echo $MOD['max_width'];?>;</script>
<div class="toppic">
 <div class="am-container-1">
 <div class="toppic-title left">
<i class="am-icon-newspaper-o toppic-title-i"></i>
<span class="toppic-title-span">新闻动态</span>
<p>About Us</p>
</div>
<div class="right toppic-progress">
<span><a href="<?php echo DT_STATIC;?>" class="w-white">首页</a></span>
<i class=" am-icon-arrow-circle-right w-white"></i>
<span><a href="<?php echo DT_STATIC;?>news" class="w-white">新闻动态</a></span>
</div>
</div>
</div>
<div class=" am-container-1 am-g">
        <div style="padding-top: 2rem" class="am-u-sm-12 am-u-md-2 news-menu">
            <ul>
                <?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
<li class="<?php if($v['catid']==$catid) { ?>mi-menu-active<?php } ?>"><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><?php echo set_style($v['catname'],$v['style']);?></a></li>
<?php } } ?> 
            </ul>
        </div>
    <div style="border: 1px solid #ededed;margin: 2rem 0;" class="container news_list am-u-sm-12 am-u-md-10">
        <div style="margin:5%" class="am-list-news-bd news_infor">
<h2><?php echo $title;?></h2>
            <div class="newsico">
                <i class="am-icon-clock-o"><?php echo $adddate;?></i>
                <i class="am-icon-hand-pointer-o"><?php if($MOD['hits']) { ?>浏览：<span id="hits"><?php echo $hits;?></span>    <?php } ?></i>
            </div>
            <div class="infor_content">
 <div id="content"><?php include template('content', 'chip');?></div>
                <?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
            </div>
        </div>
    </div>
</div>
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?>
<?php include template('footer');?>