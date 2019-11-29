<div style="" class=" am-container-1">
    <div style="padding-top: 1rem" id="zt-1" data-tab-panel-3 class="am-tab-panel ">
        <a style="margin: 1.5rem;display: block;font-size: 2rem;margin-left: 529px;"><i style="margin-right: 1rem" class="am-icon-play-circle"></i>趣味科学<i style="margin-left: 1rem" class="am-icon-angle-right"></i></a>
        <div class="accessory-list col-4">
            <ul class="am-avg-sm-4" style="text-align: center">
                <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                <li>
                    <div class="pic">
                        <a class="show_video" href="<?php echo $t['imgurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt=""></a>
                    </div>
                    <div class="main">
                        <a class="show_video" href="<?php echo $t['imgurl'];?>" target="_blank"><div class="name"><?php echo $t['title'];?><p><?php echo $t['content'];?></p></div></a>
                    </div>
                </li>
                <?php } } ?>
            </ul>
        </div>
        <a style="margin: 1.5rem;display: block;font-size: 2rem;margin-left: 529px;" href="/news/list.php?catid=12" target="_blank"><i style="margin-right: 1rem" class="am-icon-play-circle"></i>趣味实验<i style="margin-left: 1rem" class="am-icon-angle-right"></i></a>
        <div class="accessory-list col-4">
            <ul class="am-avg-sm-4" style="text-align: center">
                <?php if(is_array($tags1)) { foreach($tags1 as $i => $t) { ?>
                    <li>
                        <div class="pic">
                            <a class="show_video" href="<?php echo $t['imgurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt=""></a>
                        </div>
                        <div class="main">
                            <a class="show_video" href="<?php echo $t['imgurl'];?>" target="_blank"><div class="name"><?php echo $t['title'];?><p><?php echo $t['content'];?></p></div></a>
                        </div>
                    </li>
                <?php } } ?>
            </ul>
        </div>
        <a style="margin: 1.5rem;display: block;font-size: 2rem;margin-left: 529px;"><i style="margin-right: 1rem" class="am-icon-play-circle"></i>线上课程<i style="margin-left: 1rem" class="am-icon-angle-right"></i></a>
        <div class="accessory-list col-4">
            <ul class="am-avg-sm-4" style="text-align: center">
                <?php if(is_array($tags2)) { foreach($tags2 as $i => $t) { ?>
                    <li>
                        <div class="pic">
                            <a class="show_video" href="<?php echo $t['imgurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt=""></a>
                        </div>
                        <div class="main">
                            <a class="show_video" href="<?php echo $t['imgurl'];?>" target="_blank"><div class="name"><?php echo $t['title'];?><p><?php echo $t['content'];?></p></div></a>
                        </div>
                    </li>
                <?php } } ?>
            </ul>
        </div>
    </div>


</div>