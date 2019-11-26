<?php defined('IN_DESTOON') or exit('Access Denied');?><script language="javascript" src="<?php echo DT_STATIC;?>resource/js/footer.js"></script>
<script type="text/javascript">
<?php if($destoon_task) { ?>
show_task('<?php echo $destoon_task;?>');
<?php } else { ?>
<?php include DT_ROOT.'/api/task.inc.php';?>
<?php } ?>
<?php if($lazy) { ?>$(function(){$("img").lazyload();});<?php } ?>
</script>
<script type="text/javascript">
    var mobanstring = $("#moban").html();
    var compiled = _.template(mobanstring);
    $.get("data.txt", function (data, status) {
        var dataj = JSON.parse(data).newslist;
console.log(dataj)
        for (var i = 0; i < 4; i++) {
            var compiledString = compiled(dataj[i]);
            $("#news").append($(compiledString));
        }
        console.log(data);
    })
</script>
</body>
</html>