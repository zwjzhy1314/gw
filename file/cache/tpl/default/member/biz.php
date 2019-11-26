<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<link rel="stylesheet" type="text/css" href="image/index.css"/>
<div class="icount ibiz">
<table cellpadding="0" cellspacing="0">
<tr>
<td onclick="Go('message.php');"><div>新消息</div><span><?php echo $_message;?></span></td>
<?php if($DT['im_web']) { ?>
<td onclick="Go('im.php');"><div>新交谈</div><span><?php echo $_chat;?></span></td>
<?php } ?>
<?php if($DT['sms'] && $MG['sms']) { ?>
<td onclick="Go('sms.php');"><div>短信余额</div><span><?php echo $_sms;?></span></td>
<?php } ?>
<td onclick="Go('deposit.php');"><div>保证金</div><span><?php echo $deposit;?></span></td>
<td onclick="Go('<?php echo $DT['file_my'];?>');"><img src="image/icon_add.png" width="32" height="32"/><br/><span>发布信息</span></td>
<td onclick="Go('trade.php');"><img src="image/icon_order.png" width="32" height="32"/><br/><span>订单管理</span></td>
<td onclick="Go('home.php');"><img src="image/icon_home.png" width="32" height="32"/><br/><span>商铺管理</span></td>
</tr>
</table>
</div>
<form action="?">
<div class="tt">
<select name="year">
<option value="0">选择年</option>
<?php for($i = date("Y", $DT_TIME); $i >= 2000; $i--) { ?>
<option value="<?php echo $i;?>"<?php echo $i == $year ? ' selected' : ''?>><?php echo $i;?>年</option>
<?php } ?>
</select>&nbsp;
<select name="month">
<option value="0">选择月</option>
<?php for($i = 1; $i < 13; $i++) { ?>
<option value="<?php echo $i;?>"<?php echo $i == $month ? ' selected' : ''?>><?php echo $i;?>月</option>
<?php } ?>
</select>&nbsp;
<input type="submit" value="生成报表" class="btn"/>&nbsp;
<input type="button" value="重 置" class="btn" onclick="Go('?action=index');"/>
</div>
</form>
<div>
<?php echo load('swfobject.js');?>
<script type="text/javascript" src="<?php echo DT_PATH;?>api/amcharts/amcharts.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>api/amcharts/amfallback.js"></script>
<div id="chartdiv" style="width:700px;height:400px;background:#FFFFFF;"></div>
<script type="text/javascript">
var params = 
{
bgcolor:"#FFFFFF"
};
var flashVars = 
{
path: "<?php echo DT_PATH;?>api/amcharts/flash/",
chart_data: "<?php echo $chart_data;?>",
chart_settings: "<settings><hide_bullets_count>18</hide_bullets_count><data_type>csv</data_type><plot_area><margins><left>50</left><right>40</right><top>55</top><bottom>30</bottom></margins></plot_area><grid><x><alpha>10</alpha><approx_count>8</approx_count></x><y_left><alpha>10</alpha></y_left></grid><axes><x><width>1</width><color>0D8ECF</color></x><y_left><width>1</width><color>0D8ECF</color></y_left></axes><indicator><color>0D8ECF</color><x_balloon_text_color>FFFFFF</x_balloon_text_color><line_alpha>50</line_alpha><selection_color>0D8ECF</selection_color><selection_alpha>20</selection_alpha></indicator><zoom_out_button><text_color_hover>FF0F00</text_color_hover></zoom_out_button><help><button><color>FCD202</color><text_color>000000</text_color><text_color_hover>FF0F00</text_color_hover></button><balloon><color>FCD202</color><text_color>000000</text_color></balloon></help><graphs><graph gid='0'><title>交易成功(<?php echo $T1.$DT['money_unit'];?>)</title><color>00A100</color><color_hover>00A100</color_hover><line_width>2</line_width><bullet>round</bullet></graph><graph gid='1'><title>买家退款(<?php echo $T2.$DT['money_unit'];?>)</title><color>FF6600</color><color_hover>FF6600</color_hover></graph></graphs><labels><label lid='0'><text><![CDATA[<b><?php echo $title;?></b>]]></text><y>15</y><text_size>13</text_size><align>center</align></label></labels></settings>"
};
if (swfobject.hasFlashPlayerVersion("8")) {
swfobject.embedSWF("<?php echo DT_PATH;?>api/amcharts/flash/amline.swf", "chartdiv", "700", "400", "8.0.0", "<?php echo DT_PATH;?>api/amcharts/flash/expressInstall.swf", flashVars, params);
} else {
var amFallback = new AmCharts.AmFallback();
amFallback.chartSettings = flashVars.chart_settings;
amFallback.pathToImages = "<?php echo DT_PATH;?>api/amcharts/images/";
amFallback.chartData = flashVars.chart_data;
amFallback.type = "line";
amFallback.write("chartdiv");
}
</script>
</div>
<?php include template('footer', 'member');?>