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
<style>
    .nav ul {
        margin: auto;
        overflow: hidden;
        margin-left: 225px;
    }
    .nav ul li {
        float: left;
        width: 150px !important;
        height: 79px;
        text-align: center;
        line-height: 105px;
    }
    .current{
        border-bottom: 1px solid #c3cb00;
    }
    .block{
        display: block;
    }
    .none{
        display: none;
    }
</style>
<body>
<script language="javascript" src="<?php echo DT_STATIC;?>resource/js/header.js"></script>
<script>
    window.onload=function(){

        document.getElementById("second").className ="none";
    }

    function change_bg(obj){
        var a=document.getElementsByClassName("nav")[0].getElementsByTagName("a");
        for(var i=0;i<a.length;i++){a[i].parentNode.className="";

        }

        obj.className="current";
        if(document.getElementById("fli").className == "current"){
            document.getElementById("first").className ="block";
            document.getElementById("second").className ="none";
        }else{
             document.getElementById("first").className ="none";
             document.getElementById("second").className ="block";
        }
    }
</script>
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
<div class=" am-container-1 am-g" >
<!--        <div style="padding-top: 2rem" class="am-u-sm-12 am-u-md-2 news-menu">-->
<!--            <ul>-->
<?php //if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
<!--<li class="--><?php //if($v['catid']==$catid) { ?><!--mi-menu-active--><?php //} ?><!--"><a href="--><?php //echo $MOD['linkurl'];?><!----><?php //echo $v['linkurl'];?><!--">--><?php //echo set_style($v['catname'],$v['style']);?><!--</a></li>-->
<?php //} } ?>
<!--            </ul>-->
<!--        </div>-->
    <div style="border: 1px solid #ededed;margin: 2rem 0;" class="container news_list am-u-sm-12 am-u-md-10">
        <div style="height: 105px;" class="nav" >
            <UL>
                <LI onclick="change_bg(this)" id="fli"><A href="#" >企业新闻</A></LI>
                <LI style="margin-left: 200px;"onclick="change_bg(this)" id="sli"><A href="#">行业新闻</A> </LI>
            </UL>
        </div>
        <div style="margin:0 5%" class="am-list-news-bd" id="first" class ="none">
            <?php $cols = 5;?>
<?php if($tags) { ?><?php include template('list-newscat', 'tag');?><?php } ?>
        </div>
        <div style="margin:0 5%;" class="am-list-news-bd" id="second">
            <?php $cols = 5;?>
            <?php if($tags) { ?><?php include template('list-newscat', 'tag');?><?php } ?>
        </div>

    </div>
</div>
<?php include template('footer');?>