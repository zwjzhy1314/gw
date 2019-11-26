<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style type="text/css">
.tips {font-size:14px;color:#666666;line-height:180%;padding:15px;}
.tips img {max-width:98%;height:auto;margin:10px auto;}
</style>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">技巧提示</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="blank-35"></div>
<div class="list-set" onclick="$('#tips-top').slideToggle('fast');">
<ul>
<li><div><b>滚动与刷新</b></div></li>
</div>
<div class="main" id="tips-top">
<div class="tips">
轻按页面标题，页面会自动滚动到顶部<br/>
按住页面标题，页面会自动刷新<br/>
<img src="<?php echo DT_MOB;?>static/img/tips-top.png"/><br/>
</div>
</div>
<?php if($DT_MOB['os'] == 'ios' && $DT_MOB['browser'] == 'safari') { ?>
<div class="blank-35"></div>
<div class="list-set" onclick="$('#tips-screen').slideToggle('fast');">
<ul>
<li><div><b>添加到主屏幕</b></div></li>
</div>
<div class="main" id="tips-screen">
<div class="tips">
返回首页，轻按浏览器添加图标<br/>
<img src="<?php echo DT_MOB;?>static/img/tips-screen-ios-1.png"/><br/>
在弹出的菜单中选择添加到主屏幕<br/>
<img src="<?php echo DT_MOB;?>static/img/tips-screen-ios-2.png"/><br/>
添加成功之后，手机桌面会生成一个图标，以便下次继续访问<br/>
（以上图示可能因操作系统版本不同而有差异，具体以实际界面为准，操作类似）
</div>
</div>
<?php } ?>
<div class="blank-35"></div>
<div class="list-set" onclick="$('#tips-set').slideToggle('fast');">
<ul>
<li><div><b>偏好设置</b></div></li>
</div>
<div class="main" id="tips-set">
<div class="tips">
轻按首页右上角设置图标进入偏好设置<br/>
<img src="<?php echo DT_MOB;?>static/img/tips-setting.png"/><br/>
可根据自己兴趣对首页加载的频道进行排序和删除操作<br/>
</div>
</div>
<div class="blank-35"></div>
<div class="list-set" onclick="$('#tips-load').slideToggle('fast');">
<ul>
<li><div><b>加载超时</b></div></li>
</div>
<div class="main" id="tips-load">
<div class="tips">
由于网络或者其他未知原因导致加载超时<br/>
<img src="<?php echo DT_MOB;?>static/img/tips-load.png"/><br/>
轻按转动的加载图标可以刷新当前页面并重新加载<br/>
</div>
</div>
<?php if(DT_DEBUG) { ?>
<div class="blank-35"></div>
<div class="list-set" onclick="$('#tips-os').slideToggle('fast');">
<ul>
<li><div><b>客户端信息</b></div></li>
</div>
<div class="main" id="tips-os">
<div class="tips">
<?php echo $_SERVER['HTTP_USER_AGENT'];?><br/>OS:<?php echo $DT_MOB['os'];?><br/>BS:<?php echo $DT_MOB['browser'];?><br/>
</div>
</div>
<?php } ?>
<?php include template('footer');?>