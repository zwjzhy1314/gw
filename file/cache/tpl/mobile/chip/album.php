<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="album">
<div id="album"><img src="<?php echo str_replace('.thumb.'.file_ext($thumb), '', $thumb);?>" id="photo" style="width:100%;"/></div>
<div>
<span class="album_c" id="dot_0" style="display:none;" onclick="album_show(0);">&nbsp;</span>
<span class="album_o" id="dot_1" style="display:none;" onclick="album_show(1);">&nbsp;</span>
<span class="album_o" id="dot_2" style="display:none;" onclick="album_show(2);">&nbsp;</span>
</div>
</div>
<script type="text/javascript">
var TB = ['<?php echo str_replace('.thumb.'.file_ext($thumb), '', $thumb);?>', '<?php echo str_replace('.thumb.'.file_ext($thumb1), '', $thumb1);?>', '<?php echo str_replace('.thumb.'.file_ext($thumb2), '', $thumb2);?>'];
</script>
<script type="text/javascript" src="<?php echo DT_MOB;?>static/js/album.js"></script>