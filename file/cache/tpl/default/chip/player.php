<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($video_p == 1) { ?>
<object type="application/x-shockwave-flash" data="<?php echo DT_PATH;?>file/flash/vcastr3.swf" width="<?php echo $video_w;?>" height="<?php echo $video_h;?>" id="vcastr3">
<!--<embed></embed>-->
<param name="movie" value="<?php echo DT_PATH;?>file/flash/vcastr3.swf"/>
<param name="allowFullScreen" value="true"/>
<param name="FlashVars" value="xml=
<vcastr>
<channel>
<?php if($MOD['flvstart']) { ?>
<item>
<source><?php echo $MOD['flvstart'];?></source>
<duration></duration>
<title></title>
</item>
<?php } ?>
<item>
<source><?php echo $video_s;?></source>
<duration></duration>
<title></title>
</item>
<?php if($MOD['flvend']) { ?>
<item>
<source><?php echo $MOD['flvend'];?></source>
<duration></duration>
<title></title>
</item>
<?php } ?>
</channel>
<config>
<isAutoPlay><?php echo $video_a;?></isAutoPlay>
<controlPanelBgColor>0x333333</controlPanelBgColor>
<isShowAbout>false</isShowAbout>
</config>
<?php if($MOD['flvlogo']) { ?>
<plugIns>
<logoPlugIn>
<url><?php echo DT_PATH;?>file/flash/vcastr3_logo.swf</url>
<logoClipUrl><?php echo DT_STATIC;?>file/image/<?php echo $MOD['flvlogo'];?></logoClipUrl>
<logoClipAlpha>0.7</logoClipAlpha>
<logoClipLink><?php if($MOD['flvlink']) { ?><?php echo $MOD['flvlink'];?><?php } else { ?><?php echo DT_PATH;?><?php } ?></logoClipLink>
<clipMargin><?php echo $MOD['flvmargin'];?></clipMargin>
</logoPlugIn>
</plugIns>
<?php } ?>
</vcastr>"/>
</object>
<?php } else if($video_p == 2) { ?>
<embed src="<?php echo $video_s;?>" width="<?php echo $video_w;?>" height="<?php echo $video_h;?>" type="application/x-mplayer2" autostart="<?php echo $video_a;?>" controls="imagewindow,controlpanel,statusbar"></embed>
<?php } else if($video_p == 3) { ?>
<embed src="<?php echo $video_s;?>" width="<?php echo $video_w;?>" height="<?php echo $video_h;?>" type="audio/x-pn-realaudio-extend" autostart="<?php echo $video_a;?>"></embed>
<?php } else if($video_p == 4) { ?>
<iframe width="<?php echo $video_w;?>" height="<?php echo $video_h;?>"  frameborder="0" scrolling="no" src="<?php echo $video_s;?>"></iframe>
<?php } else if($video_p == 5) { ?>
<embed src="<?php echo $video_s;?>" width="<?php echo $video_w;?>" height="<?php echo $video_h;?>" allownetworking="all" allowscriptaccess="always" quality="high" bgcolor="#000" wmode="window" allowfullscreen="true" allowFullScreenInteractive="true" type="application/x-shockwave-flash"></embed>
<?php } else { ?>
<embed src="<?php echo $video_s;?>" width="<?php echo $video_w;?>" height="<?php echo $video_h;?>" type="application/x-shockwave-flash" extendspage="http://get.adobe.com/flashplayer/" autostart="<?php echo $video_a;?>" quality="high" allowfullscreen="true" allowscriptaccess="never"></embed>
<?php } ?>