<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-title">提示信息</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main">
<div class="content-msg">您的设备不支持浏览手机版<br/><br/><a href="<?php echo $uri;?>" class="b" rel="external">点击切换到电脑版</a></div>
</div>
<?php include template('footer');?>