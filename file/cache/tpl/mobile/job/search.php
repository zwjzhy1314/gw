<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($action != 'ajax') { ?>
<?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<a href=&#34;<?php echo DT_MOB;?>api/search.php?mid=<?php echo $moduleid;?>&#34;><span><?php echo $MOD['name'];?>搜索</span></a>|<a href=&#34;<?php echo DT_MOB;?>api/category.php?moduleid=<?php echo $moduleid;?>&#34;><span>按分类浏览</span></a>|<a href=&#34;<?php echo DT_MOB;?>api/area.php?moduleid=<?php echo $moduleid;?>&#34;><span>按地区浏览</span></a>|<a href=&#34;<?php echo $MOD['mobile'];?>&#34; data-direction=&#34;reverse&#34;><span><?php echo $MOD['name'];?>首页</span></a>', '取消');"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php } ?>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li<?php if($v['vip']) { ?> class="vip" title="<?php echo VIP;?>:<?php echo $v['vip'];?>"<?php } ?>>
<i>
<?php if($v['minsalary'] && $v['maxsalary']) { ?>
<?php echo $v['minsalary'];?>-<?php echo $v['maxsalary'];?><?php echo $DT['money_unit'];?>/月
<?php } else if($v['minsalary']) { ?>
<?php echo $v['minsalary'];?><?php echo $DT['money_unit'];?>/月以上
<?php } else if($v['maxsalary']) { ?>
<?php echo $v['maxsalary'];?><?php echo $DT['money_unit'];?>/月以内
<?php } else { ?>
面议
<?php } ?>
</i>
<a href="<?php echo userurl($v['username']);?>" rel="external"><span><?php echo $v['company'];?></span></a></li>
</ul>
</div>
<?php } } ?>
<?php } else { ?>
<?php include template('empty', 'chip');?>
<?php } ?>
<?php if($action != 'ajax') { ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer');?>
<?php } ?>