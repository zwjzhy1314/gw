<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<a href=&#34;javascript:BuyNow();&#34;><span>立即购买</span></a>|<a href=&#34;javascript:AddCart();&#34;><span>加入购物车</span></a>|<a href=&#34;<?php echo DT_MOB;?>api/share.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&#34; data-transition=&#34;slideup&#34;><span>分享好友</span></a>|<a href=&#34;<?php echo $MOD['mobile'];?>&#34; data-direction=&#34;reverse&#34;><span><?php echo $MOD['name'];?>首页</span></a>|<a href=&#34;<?php echo DT_MOB;?>channel.php&#34; data-direction=&#34;reverse&#34;><span>频道列表</span></a>', '取消');"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<style type="text/css">
.relate_1,.relate_2 {width:65px;height:60px;float:left;}
.relate_1 img,.relate_2 img{width:50px;height:50px;}
.relate_1 a:link,.relate_1 a:visited,.relate_1 a:active,.relate_1 a:hover {display:block;width:50px;height:50px;border:#B2B2B2 1px solid;border-radius:4px;}
.relate_2 a:link,.relate_2 a:visited,.relate_2 a:active,.relate_2 a:hover {display:block;width:50px;height:50px;border:#007AFF 1px solid;border-radius:4px;}
.step_price {background:#F8F8F8;text-align:center;}
.step_price td {border-right:#FFFFFF 1px solid;}
.nv_1,.nv_2 {float:left;padding:5px;margin:0 5px 5px 0;cursor:pointer;}
.nv_1 {border:#B2B2B2 1px solid;border-radius:4px;}
.nv_2 {border:#007AFF 1px solid;border-radius:4px;}
.tl {width:50px;text-align:center;}
</style>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info"><?php if($MOD['hits']) { ?>人气:<?php echo $hits;?>&nbsp;&nbsp;<?php } ?>销量:<?php echo $sales;?>&nbsp;&nbsp;评价:<?php echo $comments;?></div>
<?php if($thumb) { ?><?php include template('album', 'chip');?><?php } ?>

<?php if($a2) { ?>
<div class="step_price">
<table width="100%" cellpadding="6" cellspacing="0">
<tr>
<td>起批</td>
<td><?php echo $a1;?>-<?php echo $a2;?><?php echo $unit;?></td>
<?php if($a3) { ?>
<td><?php echo $a2+1;?>-<?php echo $a3;?><?php echo $unit;?></td>
<td><?php echo $a3;?><?php echo $unit;?>以上</td>
<?php } else { ?>
<td><?php echo $a2+1;?><?php echo $unit;?>以上</td>
<?php } ?>
</tr>
<tr>
<td>价格</td>
<td class="f_red"><?php echo $DT['money_sign'];?><?php echo $p1;?></td>
<?php if($a3) { ?>
<td class="f_red"><?php echo $DT['money_sign'];?><?php echo $p2;?></td>
<td class="f_red"><?php echo $DT['money_sign'];?><?php echo $p3;?></td>
<?php } else { ?>
<td class="f_red"><?php echo $DT['money_sign'];?><?php echo $p2;?></td>
<?php } ?>
</tr>
</table>
</div>
<?php } ?>
<table width="100%" cellpadding="6" cellspacing="0">
<?php if(!$a2) { ?>
<tr>
<td class="tl">单价</td>
<td class="f_red"><?php echo $DT['money_sign'];?><span class="px16"><?php echo $price;?></span></td>
</tr>
<?php } ?>
<?php if($express_name_1 == '包邮') { ?>
<tr>
<td class="tl">物流</td>
<td>
<?php if($fee_start_1>0) { ?>
<?php if($fee_start_2>0) { ?> <?php echo $express_name_2;?>:<?php echo $fee_start_2;?>&nbsp;&nbsp;<?php } ?>
<?php if($fee_start_3>0) { ?> <?php echo $express_name_3;?>:<?php echo $fee_start_3;?>&nbsp;&nbsp;<?php } ?>
满<?php echo $fee_start_1;?>包邮
<?php } else { ?>
包邮
<?php } ?></td>
</tr>
<?php } else if($fee_start_1>0 || $fee_start_2>0 || $fee_start_3>0) { ?>
<tr>
<td class="tl">物流</td>
<td>
<?php if($fee_start_1>0) { ?> <?php echo $express_name_1;?>:<?php echo $fee_start_1;?>&nbsp;&nbsp;<?php } ?>
<?php if($fee_start_2>0) { ?> <?php echo $express_name_2;?>:<?php echo $fee_start_2;?>&nbsp;&nbsp;<?php } ?>
<?php if($fee_start_3>0) { ?> <?php echo $express_name_3;?>:<?php echo $fee_start_3;?>&nbsp;&nbsp;<?php } ?>
</td>
</tr>
<?php } ?>
<?php if($cod) { ?>
<tr>
<td class="tl">到付</td>
<td>支持货到付款</td>
</tr>
<?php } ?>
<tr>
<td class="tl">库存</td>
<td><?php echo $amount;?><?php echo $unit;?></td>
</tr>
<tr>
<td class="tl">品牌</td>
<td><?php if($brand) { ?><?php echo $brand;?><?php } else { ?>未填写<?php } ?></td>
</tr>
<?php if($RL) { ?>
<tr>
<td class="tl"><?php echo $relate_name;?></td>
<td>
<?php if(is_array($RL)) { foreach($RL as $v) { ?>
<div class="relate_<?php if($itemid==$v['itemid']) { ?>2<?php } else { ?>1<?php } ?>"><?php if($itemid==$v['itemid']) { ?><em></em><?php } ?><a href="<?php echo $MOD['mobile'];?><?php echo $v['linkurl'];?>"><img src="<?php echo $v['thumb'];?>" alt="" title="<?php echo $v['relate_title'];?>"/></a></div>
<?php } } ?>
</td>
</tr>
<?php } ?>
<?php if($P1) { ?>
<tr>
<td class="tl"><?php echo $n1;?></td>
<td id="p1">
<ul>
<?php if(is_array($P1)) { foreach($P1 as $i => $v) { ?>
<li class="nv_<?php if($i==0) { ?>2<?php } else { ?>1<?php } ?>"><?php echo $v;?></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } ?>
<?php if($P2) { ?>
<tr>
<td class="tl"><?php echo $n2;?></td>
<td id="p2">
<ul>
<?php if(is_array($P2)) { foreach($P2 as $i => $v) { ?>
<li class="nv_<?php if($i==0) { ?>2<?php } else { ?>1<?php } ?>"><?php echo $v;?></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } ?>
<?php if($P3) { ?>
<tr>
<td class="tl"><?php echo $n3;?></td>
<td id="p3">
<ul>
<?php if(is_array($P3)) { foreach($P3 as $i => $v) { ?>
<li class="nv_<?php if($i==0) { ?>2<?php } else { ?>1<?php } ?>"><?php echo $v;?></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } ?>
<?php if($amount) { ?>
<?php if($status == 3) { ?>
<?php } else { ?>
<tr>
<td></td>
<td><strong class="f_red px14">该商品已下架</strong></td>
</tr>
<?php } ?>
<?php } else { ?>
<tr>
<td></td>
<td><strong class="f_red px14">该商品库存不足</strong></td>
</tr>
<?php } ?>
</table>
<div class="list-tab bd-t">
<ul>
<li class="on" id="t_0" onclick="Mshow(0)"><span>商品详情</span></li>
<li id="t_1" onclick="Mshow(1)"><span>评价详情(<?php echo $comments;?>)</span></li>
<li id="t_2" onclick="Mshow(2)"><span>交易记录(<?php echo $orders;?>)</span></li>
</ul>
</div>
<div id="c_2" style="display:none;"><div class="list-empty">正在加载交易记录...</div></div>
<div id="c_1" style="display:none;"><div class="list-empty">正在加载评价详情...</div></div>
<div class="content" id="c_0"><?php echo $content;?></div>
<div class="head bd-b"><strong>联系方式</strong></div>
<div class="contact"><?php include template('contact', 'chip');?></div>
</div>
<?php if($status == 3 && $amount > 0) { ?>
<div class="foot-bar-fix"></div>
<div class="foot-bar">
<table cellpadding="8" cellspacing="0" width="100%">
<tr>
<td width="50%" onclick="AddCart();"><div class="btn-green" style="line-height:32px;font-size:16px;">加入购物车</div></td>
<td width="50%" onclick="BuyNow();"><div class="btn-orange" style="line-height:32px;font-size:16px;">立即购买</div></td>
</tr>
</table>
</div>
<?php } ?>
<script type="text/javascript">
var mallurl = '<?php echo $MOD['mobile'];?>';
var mallmid = <?php echo $moduleid;?>;
var mallid = <?php echo $itemid;?>;
var n_c = <?php echo $comments;?>;
var n_o = <?php echo $orders;?>;
var c_c = Dd('c_1').innerHTML;
var c_o = Dd('c_2').innerHTML;
var s_s = {'1':0,'2':0,'3':0};
var m_l = {
no_comment:'暂无评论',
no_order:'暂无交易',
no_goods:'商品不存在或已下架',
no_self:'不能添加自己的商品',
lastone:''
};
function Mshow(k) {
if($('#t_'+k).attr('class') == 'on') return;
for(var i = 0; i < 3; i++) {
if(i == k) {
$('#t_'+i).attr('class', 'on');
$('#c_'+i).show();
if(k == 1) load_comment(0);
if(k == 2) load_order(0);
} else {
$('#t_'+i).attr('class', '');
$('#c_'+i).hide();
}
}
}
function addE(i) {
$('#p'+i+' li').click(function() {
$('#p'+i+' li')[s_s[i]].className = 'nv_1';
this.className = 'nv_2';
s_s[i] = $(this).index();
});
}
function BuyNow() {
Go('<?php echo $MODULE['2']['mobile'];?>buy.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&s1='+s_s[1]+'&s2='+s_s[2]+'&s3='+s_s[3]+'&a=1');
}
function AddCart() {
Go('<?php echo $MODULE['2']['mobile'];?>cart.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&s1='+s_s[1]+'&s2='+s_s[2]+'&s3='+s_s[3]+'&a=1');
}
function load_comment(p) {
if(n_c == 0) {
Dd('c_1').innerHTML = '<div class="list-empty">'+m_l.no_comment+'</div>';
return;
}
if(p == 0 && Dd('c_1').innerHTML != c_c) return;
$('#c_1').load(AJPath+'?action=mall&job=comment&moduleid='+mallmid+'&sum='+n_c+'&itemid='+mallid+'&page='+p);
}
function load_order(p) {
if(n_o == 0) {
Dd('c_2').innerHTML = '<div class="list-empty">'+m_l.no_order+'</div>';
return;
}
if(p == 0 && Dd('c_2').innerHTML != c_o) return;
$('#c_2').load(AJPath+'?action=mall&job=order&moduleid='+mallmid+'&sum='+n_o+'&itemid='+mallid+'&page='+p);
}
$(function(){
<?php if($P1) { ?>addE(1);<?php } ?>
<?php if($P2) { ?>addE(2);<?php } ?>
<?php if($P3) { ?>addE(3);<?php } ?>
});
</script>
<?php include template('footer');?>