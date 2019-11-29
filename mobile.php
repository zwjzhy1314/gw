<?php
/*
	[DESTOON B2B System] Copyright (c) 2008-2018 www.destoon.com
	This is NOT a freeware, use is subject to license.txt
*/
require 'common.inc.php';
$agent = isMobile();
if($agent)
{
//    header('Location: http://www.mxiaotu.com/mobile.html');
//    exit;
}
// check if wap
function isMobile()
{
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
    {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备
    if (isset ($_SERVER['HTTP_VIA']))
    {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT']))
    {
        $clientkeywords = array ('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
        {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT']))
    {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
        {
            return true;
        }
    }
    return false;
}
$username = $domain = '';

if(isset($homepage) && check_name($homepage)) {
    $username = $homepage;
} else if(!$cityid) {
    $host = get_env('host');
    if(substr($host, 0, 4) == 'www.') {
        $whost = $host;
        $host = substr($host, 4);
    } else {
        $whost = $host;
    }
    if($host && strpos(DT_PATH, $host) === false) {
        if(substr($host, -strlen($CFG['com_domain'])) == $CFG['com_domain']) {
            $www = substr($host, 0, -strlen($CFG['com_domain']));
            if(check_name($www)) {
                $username = $homepage = $www;
            } else {
                include load('company.lang');
                $head_title = $L['not_company'];
                if($DT_BOT) dhttp(404, $DT_BOT);
                include template('com-notfound', 'message');
                exit;
            }
        } else {
            if($whost == $host) {//301 xxx.com to www.xxx.com
                $w3 = 'www.'.$host;
                $c = $db->get_one("SELECT userid FROM {$DT_PRE}company WHERE domain='$w3'");
                if($c) d301('http://'.$w3);
            }
            $c = $db->get_one("SELECT username,domain FROM {$DT_PRE}company WHERE domain='$whost'".($host == $whost ? '' : " OR domain='$host'"), 'CACHE');
            if($c) {
                $username = $homepage = $c['username'];
                $domain = $c['domain'];
            }
        }
    }
}
if($username) {
    $moduleid = 4;
    $module = 'company';
    $MOD = cache_read('module-'.$moduleid.'.php');
    include load('company.lang');
    require DT_ROOT.'/module/'.$module.'/common.inc.php';
    include DT_ROOT.'/module/'.$module.'/init.inc.php';
} else {
    if($DT['safe_domain']) {
        $safe_domain = explode('|', $DT['safe_domain']);
        $pass_domain = false;
        foreach($safe_domain as $v) {
            if(strpos($DT_URL, $v) !== false) { $pass_domain = true; break; }
        }
        $pass_domain or dhttp(404);
    }
    if($DT['index_html']) {
        $html_file = $CFG['com_dir'] ? DT_ROOT.'/'.$DT['index'].'.'.$DT['file_ext'] : DT_CACHE.'/index.inc.html';
        if(!is_file($html_file)) tohtml('index');
        if(is_file($html_file)) exit(include($html_file));
    }
    $AREA or $AREA = cache_read('area.php');
    if($EXT['mobile_enable']) $head_mobile = DT_MOB;
    $index = 1;
    $seo_title = $DT['seo_title'];
    $head_keywords = $DT['seo_keywords'];
    $head_description = $DT['seo_description'];
    $CSS = array('index');
    if($city_template) {
        include template($city_template, 'city');
    } else {
        include template('index');
    }
}
?>