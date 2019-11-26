<?php
defined('DT_ADMIN') or exit('Access Denied');
$db->query("DROP TABLE IF EXISTS `".$DT_PRE.$module."_".$moduleid."`");
$db->query("DROP TABLE IF EXISTS `".$DT_PRE.$module."_data_".$moduleid."`");
$db->query("DROP TABLE IF EXISTS `".$DT_PRE.$module."_comment_".$moduleid."`");
$db->query("DROP TABLE IF EXISTS `".$DT_PRE.$module."_express`_".$moduleid."`");
$db->query("DROP TABLE IF EXISTS `".$DT_PRE.$module."_stat`_".$moduleid."`");
$db->query("DROP TABLE IF EXISTS `".$DT_PRE.$module."_view`_".$moduleid."`");
?>