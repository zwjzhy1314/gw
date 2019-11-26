<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($foot) { ?>
<div class="foot-bar-fix"></div>
<div class="foot-bar">
<ul>
<li class="icon-home<?php if($foot=='home') { ?>-on<?php } ?>"><a href="<?php echo DT_MOB;?>" data-transition="none" data-ajax="false"><span>首页</span></a></li>
<li class="icon-channel<?php if($foot=='channel') { ?>-on<?php } ?>"><a href="<?php echo DT_MOB;?>channel.php" data-transition="none"><span>频道</span></a></li>
<li class="icon-my<?php if($foot=='my') { ?>-on<?php } ?>"><a href="<?php echo $MODULE['2']['mobile'];?>" data-transition="none"><span>我的</span></a><?php if($_message || $_chat || $_cart) { ?><em></em><?php } ?></li>
<li class="icon-more<?php if($foot=='more') { ?>-on<?php } ?>"><a href="<?php echo DT_MOB;?>more.php" data-transition="none"><span>更多</span></a></li>
</ul>
</div>
<?php } ?>
</div>
</body>
</html>