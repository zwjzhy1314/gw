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
<script>

    if(lsearchStr.indexOf("/news/list.php?catid=50")>-1)document.getElementById('nav04').className=""
</script>
<div class="toppic">
    <div class="am-container-1">
        <div class="toppic-title left">
            <i class="am-icon-newspaper-o toppic-title-i"></i>
            <span class="toppic-title-span">趣味视频</span>
            <p>Interesting Video</p>
        </div>
        <div class="right toppic-progress">
            <span><a href="<?php echo DT_STATIC;?>" class="w-white">首页</a></span>
            <i class=" am-icon-arrow-circle-right w-white"></i>
            <span><a href="<?php echo DT_STATIC;?>news/list.php?catid=50" class="w-white">趣味视频</a></span>
        </div>
    </div>
</div>
<?php if($tags) { ?><?php include template('video-newscat', 'tag');?><?php } ?>
<?php include template('footer');?>