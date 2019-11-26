<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="<?php echo DT_CHARSET;?>"/>
<title>提示信息<?php echo $DT['seo_delimiter'];?><?php echo $DT['sitename'];?></title>
<meta name="robots" content="noindex,nofollow"/>
<meta name="generator" content="DESTOON B2B - www.destoon.com"/>
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width"/>
<link rel="stylesheet" type="text/css" href="<?php echo DT_MOB;?>static/style.css"/>
<script type="text/javascript" src="<?php echo DT_MOB;?>static/js/common.js"></script>
<script type="text/javascript" src="<?php echo DT_MOB;?>static/js/fix.js"></script>
</head>
<?php if($dtime == -1) { ?>
<body style="background:#FFFFFF;margin:200px auto;">
<center><img src="<?php echo DT_SKIN;?>image/loading...gif" alt="login"/></center>
<?php echo $dmessage;?>
<meta http-equiv="refresh" content="0;URL=<?php echo $dforward;?>"/>
<?php } else { ?>
<body>
<div data-role="page">
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback('');" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">提示信息</div>
<div class="head-bar-right">
<a href="<?php echo DT_MOB;?>"><img src="<?php echo DT_MOB;?>static/img/icon-index.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main">
<div class="content-msg"><?php echo $dmessage;?></div>
</div>
<?php if($dforward == 'goback') { ?>
<?php } else if($dforward) { ?>
<meta http-equiv="refresh" content="<?php echo $dtime;?>;URL=<?php echo $dforward;?>">
<?php } ?>
</div>
<?php } ?>
</body>
</html>