<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php if($action=='diy') { ?>定制订阅<?php } else { ?>RSS订阅<?php } ?></div>
<div class="head-bar-right">
<?php if($action=='diy') { ?>
<a href="index.php"><span>取消</span></a>
<?php } else { ?>
<a href="index.php?action=diy"><span>定制</span></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($action == 'diy') { ?>
<?php if($feed_code) { ?>
<div class="ui-form bd-b">
<p style="color:red;"><?php echo $MODULE[$mid]['name'];?></p>
<div><input type="url" value="<?php echo $feed_code;?>"/></div>
<div class="blank-16"></div>
</div>
<?php } ?>
<div class="ui-form">
<form action="index.php" data-ajax="false">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<p>模块</p>
<div>
<select name="mid">
<option value="0">请选择</option>
<?php if(is_array($FD)) { foreach($FD as $k => $v) { ?>
<option value="<?php echo $v['moduleid'];?>"<?php if($mid==$v['moduleid']) { ?> selected<?php } ?>><?php echo $v['name'];?></option>
<?php } } ?>
</select>
</div>
<p>关键词</p>
<div><input type="text" name="kw" value="<?php echo $kw;?>"/></div>
<?php if($category_select) { ?>
<p>分类</p>
<div><?php echo $category_select;?></div>
<?php } ?>
<?php if($area_select) { ?>
<p>地区</p>
<div><?php echo $area_select;?></div>
<?php } ?>
<div class="blank-16"></div>
<input type="submit" class="btn-green" value="提 交"/>
<div class="blank-16"></div>
<input type="button" class="btn" value="重 设" onclick="Go('?action=<?php echo $action;?>');"/>
<div class="blank-16"></div>
</div>
<?php } else { ?>
<div class="ui-form">
<?php if(is_array($FD)) { foreach($FD as $k => $v) { ?>
<p><?php echo $v['name'];?></p>
<div><input type="url" value="<?php echo $v['rssurl'];?>"/></div>
<?php } } ?>
<div class="blank-16"></div>
</div>
<?php } ?>
<?php include template('footer');?>