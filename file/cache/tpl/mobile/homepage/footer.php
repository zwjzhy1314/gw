<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($share_icon == 'auto') { ?><div class="share_icon"><img src="<?php echo DT_PATH;?>apple-touch-icon-precomposed.png"/></div><?php } ?>
</div>
<?php if($api_stats && $stats) { ?>
<?php include DT_ROOT.'/api/stats/'.$HOME['stats_type'].'/show.inc.php';?>
<?php } ?>
<?php if($api_kf && $kf) { ?>
<?php include DT_ROOT.'/api/kf/'.$HOME['kf_type'].'/show.inc.php';?>
<?php } ?>
</body>
</html>