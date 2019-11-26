<?php defined('IN_DESTOON') or exit('Access Denied');?><ul class="am-list">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                <li class="am-g am-scrollspy-init am-scrollspy-inview" >
                    <div class="am-u-sm-12 am-u-md-4 am-u-lg-4 am-list-thumb">
                        <a href="<?php echo $t['linkurl'];?>">
                            <img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['title'];?>" onError="this.src='<?php echo DT_SKIN;?>image/nopic.jpg'">
                        </a>
                    </div>
                    <div class="newsico am-fl">
                        <i class="am-icon-clock-o"><?php if($datetype) { ?><?php echo timetodate($t['addtime'], $datetype);?><?php } ?></i>
                        <i class="am-icon-hand-pointer-o"><?php echo $t['hits'];?></i>
                    </div>
                    <div class=" am-u-sm-12 am-u-md-8 am-u-lg-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></h3>
                        <div class="am-list-item-text"><?php echo $t['introduce'];?></div>
                    </div>
                </li>
<?php } } ?>
</ul>
<?php if($showpage && $pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>