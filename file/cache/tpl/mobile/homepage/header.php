<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?><?php echo $COM['company'];?><?php } ?></title>
<?php if($head_keywords) { ?><meta name="keywords" content="<?php echo $head_keywords;?>"/><?php } ?>
<?php if($head_description) { ?><meta name="description" content="<?php echo $head_description;?>"/><?php } ?>
<meta name="template" content="<?php echo $template;?>"/>
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<meta name="generator" content="DESTOON B2B - www.destoon.com"/>
<meta name="format-detection" content="telephone=no"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-title" content="<?php echo $COM['company'];?>"/>
<meta name="apple-mobile-web-app-status-bar-style" content="default"/>
<link rel="apple-touch-icon-precomposed" href="<?php echo DT_MOB;?>apple-touch-icon-precomposed.png"/>
<meta name="mobile-web-app-capable" content="yes">
<link rel="icon" sizes="128x128" href="<?php echo DT_MOB;?>apple-touch-icon-precomposed.png">
<meta name="msapplication-TileImage" content="<?php echo DT_MOB;?>apple-touch-icon-precomposed.png">
<meta name="msapplication-TileColor" content="#007AFF">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DT_PATH;?>favicon.ico"/>
<link rel="bookmark" type="image/x-icon" href="<?php echo DT_PATH;?>favicon.ico"/>
<link rel="stylesheet" type="text/css" href="<?php echo DT_MOB;?>static/lib/jquery/jquery.mobile.custom.structure.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo DT_MOB;?>static/style.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/mobile.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $HSPATH;?>mobile.css"/>
<script type="text/javascript" src="<?php echo DT_MOB;?>static/lib/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(document).bind("mobileinit", function() {
$.mobile.ajaxEnabled = false;
});
var Dbrowser = '<?php echo $DT_MOB['browser'];?>',AJPath = '',DTPath = '<?php echo DT_PATH;?>',DTMob = '<?php echo DT_MOB;?>';
var DMURL = document.location.protocol+'//'+location.hostname+(location.port ? ':'+location.port : '')+'/';
if(DTPath.indexOf(DMURL) != -1) {DMURL = DTPath;}
AJPath = DMURL+'ajax.php';
<?php if(!DT_DEBUG) { ?>
if(!('ontouchend' in document && window.location.href.indexOf('device.php') == -1) window.location='<?php echo DT_MOB;?>api/device.php';
//if((!('ontouchend' in document) || !document.ontouchend) && window.location.href.indexOf('device.php') == -1) window.location='<?php echo DT_MOB;?>api/device.php';
<?php } ?>
</script>
<script type="text/javascript" src="<?php echo DT_MOB;?>static/lib/jquery/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="<?php echo DT_MOB;?>static/js/common.js"></script>
<?php if($JS) { ?>
<?php if(is_array($JS)) { foreach($JS as $js) { ?>
<script type="text/javascript" src="<?php echo DT_MOB;?>static/js/<?php echo $js;?>.js"></script>
<?php } } ?>
<?php } ?>
<script type="text/javascript" src="<?php echo DT_MOB;?>static/js/fix.js"></script>
</head>
<body>
<div data-role="page">
<div class="ui-toast"></div>
<div class="ui-mask"></div>
<div class="ui-sheet"></div>
<?php if($share_icon && $share_icon != 'auto') { ?><div class="share_icon"><img src="<?php echo $share_icon;?>"/></div><?php } ?>