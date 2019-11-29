<?php defined('IN_DESTOON') or exit('Access Denied');?><ul class="am-list">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                <li class="am-g am-scrollspy-init am-scrollspy-inview" >


                    <div class=" am-u-sm-12 am-u-md-8 am-u-lg-8 am-list-main" style="width: 100%;">
                        <h3 class="am-list-item-hd"><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></h3>
                        <div class="am-list-item-text"><?php echo $t['introduce'];?></div>
                    </div>
                </li>
<?php } } ?>
</ul>
<?php if($showpage && $pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>