<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='',img_max_width=<?php echo $MOD['max_width'];?>;</script>
<div class="m">
<div class="nav">
<div><input type="button" value="我要提问" class="btn-blue" onclick="Go('<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&cid=<?php echo $catid;?>&action=add');"/></div>
<a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>&gt;</i> <?php echo cat_pos($CAT, ' <i>&gt;</i> ');?>
</div>
</div>
<div class="m">
<div class="know_show">
<table>
<tr>
<td valign="top" class="know_show_l">
<ul>
<?php if($item['hidden']) { ?>
<li><strong>匿名</strong></li>
<li><img src="<?php echo useravatar('', 'large');?>" alt="" class="know_avatar"/></li>
<?php } else { ?>
<li>
<?php if($item['username']) { ?>
<a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?username='.$item['username']);?>" class="b"><strong><?php echo $item['passport'];?></strong></a>
<?php } else { ?>
<strong title="<?php echo hide_ip($item['ip']);?>">游客</strong>
<?php } ?>
</li>
<li><img src="<?php echo useravatar($item['username'], 'large');?>" alt="" class="know_avatar"/></li>
<?php if($item['username'] && $DT['im_web']) { ?><li><?php echo im_web($item['username'], 1);?></li><?php } ?>
<?php } ?>
<li></li>
</ul>
</td>
<td valign="top">
<div class="know_info">
<span class="f_r">
<a href="javascript:SendFav();" class="b">收藏</a>&nbsp; | &nbsp;
<a href="javascript:SendReport();" class="b">举报</a>
</span>
<?php echo timetodate($addtime, 5);?> &nbsp; 
<?php if($MOD['hits']) { ?>关注：<span id="hits"><?php echo $hits;?></span> &nbsp; <?php } ?>
回答：<span id="answer"><?php echo $answer;?></span>
</div>
<div class="b20"></div>
<h1 class="title" id="title"><?php echo $title;?></h1>
<div class="info"><span class="f_r f_b"><img src="<?php echo DT_SKIN;?>image/know_<?php echo $process;?>.gif" align="absmiddle"/> <?php echo $PROCESS[$process];?></span>
<img src="<?php echo DT_SKIN;?>image/ico_reward.gif" align="absmiddle"/> <span class="f_orange">悬赏分：<?php echo $credit;?></span>
<span class="f_gray">
<?php if($process == 1 || $process == 2) { ?>
- 离问题结束还有 <?php echo secondstodate($totime-$DT_TIME);?>
<?php } else if($process == 3) { ?>
- 解决时间 <?php echo timetodate($updatetime, 5);?>
<?php } ?>
</span>
</div>
<?php if($CP) { ?><?php include template('property_show', 'chip');?><?php } ?>
<div id="question" class="content"><?php echo $content;?></div>
<?php if($addition) { ?>
<div class="know_addition">
<strong>问题补充：</strong><br/>
<?php echo nl2br($addition);?>
</div>
<?php } ?>
<?php if($process == 1) { ?><br/><a href="#answer"><img src="<?php echo DT_SKIN;?>image/btn_answer.gif" width="90" height="23" alt="我来回答" id="answer_btn" style="display:none;margin:20px;"/></a><?php } ?>
</td>
</tr>
</table>
</div>
</div>
<?php if($aid && $best && $page == 1) { ?>
<div class="m">
<div class="know_show">
<img src="<?php echo DT_SKIN;?>image/best_<?php if($E) { ?>expert<?php } else { ?>answer<?php } ?>.gif" alt="" class="best_image"/>
<table>
<tr>
<td valign="top" class="know_show_l">
<ul>
<?php if($E) { ?>
<li><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('expert.php?itemid='.$E['itemid']);?>" target="_blank" class="b"><strong><?php echo $E['title'];?></strong></a></li>
<li><img src="<?php echo useravatar($E['username'], 'large');?>" alt="" class="know_avatar"/></li>
<?php if($DT['im_web']) { ?><li><?php echo im_web($E['username'], 1);?></li><?php } ?>
<li class="f_red">知道专家</li>
<li title="擅长领域：<?php echo $E['major'];?>"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=10&action=add&askto=<?php echo $E['username'];?>" target="_blank" class="b">向TA提问</a></li>
<?php } else { ?>
<?php if($best['hidden']) { ?>
<li><strong>匿名</strong></li>
<li><img src="<?php echo useravatar('', 'large');?>" alt=""  class="know_avatar"/></li>
<?php } else { ?>
<li>
<?php if($best['username']) { ?>
<a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?username='.$best['username']);?>" class="b"><strong><?php echo $best['passport'];?></strong></a>
<?php } else { ?>
<strong title="<?php echo hide_ip($best['ip']);?>">游客</strong>
<?php } ?>
</li>
<li><img src="<?php echo useravatar($best['username'], 'large');?>" alt="" class="know_avatar"/></li>
<?php if($best['username'] && $DT['im_web']) { ?><li><?php echo im_web($best['username'], 1);?></li><?php } ?>
<?php } ?>
<?php } ?>
<li></li>
</ul>
</td>
<td valign="top">
<div class="know_info">
<span class="f_r">
<span id="v_msg"></span>&nbsp;
<a href="javascript:" onclick="V(1, <?php echo $agree;?>);">支持</a>(<span id="v_<?php echo $itemid;?>_1"><?php echo $agree;?></span>)&nbsp; | &nbsp;
<a href="javascript:" onclick="V(0, <?php echo $against;?>);">反对</a>(<span id="v_<?php echo $itemid;?>_0"><?php echo $against;?></span>)&nbsp; | &nbsp;
<a href="javascript:RR(<?php echo $aid;?>);" class="b">举报</a>
</span>
<?php echo timetodate($best['addtime'], 5);?>
</div>
<div id="content" class="content"><div id="A_<?php echo $aid;?>"><?php include template('content', 'chip');?></div></div>
<?php if($comment) { ?>
<div class="know_comment">
<strong>提问者对答案的评价：</strong><br/>
<?php echo nl2br($comment);?>
</div>
<?php } ?>
<?php if($MOD['fee_award']) { ?>
<div class="award"><div onclick="Go('<?php echo $MODULE['2']['linkurl'];?>award.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');">打赏</div></div>
<?php } ?>
</td>
</tr>
</table>
</div>
</div>
<script style="text/javascript">
var v_op = 1;
var v_nm = 0;
function V(op, nm) {
v_op = op;
v_nm = nm;
if(get_cookie('best_answer_<?php echo $itemid;?>')) {
Inner('v_msg', '您已经对最佳答案表过态了');
return;
}
$.get('<?php echo $MOD['linkurl'];?>answer.php?action=best&itemid=<?php echo $itemid;?>&op='+op,
function(data) {
if(data == -1) {
Inner('v_msg', '您已经对最佳答案表过态了');
} else if (data == 0) {
Inner('v_msg', '参数错误，如有疑问请联系管理员');
} else if (data == 1) {
if(v_op == 1) {
Inner('v_<?php echo $itemid;?>_1', ++v_nm);
} else {
Inner('v_<?php echo $itemid;?>_0', ++v_nm);
}
Inner('v_msg', '感谢参与');
}
}
);
}
</script>
<?php } ?>
<?php if($answers) { ?>
<?php if(is_array($answers)) { foreach($answers as $k => $v) { ?>
<div class="m">
<div class="know_show">
<table>
<tr>
<td valign="top" class="know_show_l">
<ul>
<?php if($v['hidden']) { ?>
<li id="u_<?php echo $v['itemid'];?>"><strong>匿名</strong></li>
<li><img src="<?php echo useravatar('', 'large');?>" alt=""  class="know_avatar"/></li>
<?php } else { ?>
<li id="u_<?php echo $v['itemid'];?>">
<?php if($v['username']) { ?>
<a href="<?php echo $MOD['linkurl'];?><?php if($v['expert']) { ?><?php echo rewrite('expert.php?username='.$v['username']);?><?php } else { ?><?php echo rewrite('search.php?username='.$v['username']);?><?php } ?>" target="_blank" class="b"><strong><?php echo $v['passport'];?></strong></a>
<?php } else { ?>
<strong title="<?php echo hide_ip($item['ip']);?>">游客</strong>
<?php } ?>
</li>
<li><img src="<?php echo useravatar($v['username'], 'large');?>" alt="" class="know_avatar"/></li>
<?php if($v['username'] && $DT['im_web']) { ?><li><?php echo im_web($v['username'], 1);?></li><?php } ?>
<?php } ?>
<?php if($v['expert']) { ?><li class="f_red">知道专家</li><?php } ?>
<li></li>
</ul>
</td>
<td valign="top">
<div class="know_info">
<span class="f_r"><a href="javascript:RR(<?php echo $v['itemid'];?>);" class="b">举报</a></span>
<?php echo timetodate($v['addtime'], 5);?>
</div>
<div class="content" id="A_<?php echo $v['itemid'];?>"><?php echo $v['content'];?></div>
</td>
</tr>
</table>
</div>
</div>
<?php } } ?>
<?php } ?>
<?php if($pages) { ?>
<div class="m"><div class="pages"><?php echo $pages;?></div></div>
<?php } ?>
<?php if($process == 1 || $process == 2) { ?>
<div class="m">
<script type="text/javascript">show_answer('<?php echo $MOD['linkurl'];?>', <?php echo $itemid;?>);</script>
<a name="answer"></a>
</div>
<?php } ?>
<?php if($process == 0 || $process == 3) { ?>
<div class="m"><?php include template('comment', 'chip');?></div>
<?php } ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script>
<script style="text/javascript">
function RR(id) {
SendReport(Dd('A_'+id) ? '<?php echo $MOD['name'];?>回答举报，答案ID:'+id+'\n回答内容:\n'+Dd('A_'+id).innerHTML : '');
}
</script>
<?php include template('footer');?>