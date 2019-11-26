<?php
require '../common.inc.php';

//namespace Aliyun\DySDKLite\Sms;

require_once "SignatureHelper.php";

//use Aliyun\DySDKLite\SignatureHelper;
GetGP(array('PhoneNumbers','TemplateCode'));
$data['PhoneNumbers'] = $PhoneNumbers;
$data['TemplateCode'] = $TemplateCode ? $TemplateCode : 'SMS_174986841';

if(!empty($PhoneNumbers)){
	$ret = sendSms($data);
	exit(json_encode($ret));
}
/**
 * 发送短信
 */
function sendSms($data) {
	global $DT, $_username;
    $params = array ();

    // *** 需用户填写部分 ***
    // fixme 必填：是否启用https
    $security = false;

    // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
    $accessKeyId = "LTAI4FjKUiEjMJbF3kKPPMM6";
    $accessKeySecret = "ZmeadmaSP8w25f77HDmjnofD3z92dL";

    // fixme 必填: 短信接收号码
    $PhoneNumbers = $params["PhoneNumbers"] = $data['PhoneNumbers'];

    // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
    $params["SignName"] = "芈小兔教育";

    // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
    $params["TemplateCode"] = $data['TemplateCode'] ? $data['TemplateCode'] : "SMS_174986841";

    // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
	$captcha = random(4, '0123456789');
	$params['TemplateParam'] = Array (
        "code" => $captcha
    );

    // fixme 可选: 设置发送短信流水号
    $params['OutId'] = "";

    // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
    $params['SmsUpExtendCode'] = "";


    // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
    if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
        $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
    }

    // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
    $helper = new SignatureHelper();

    // 此处可能会抛出异常，注意catch
    $content = $helper->request(
        $accessKeyId,
        $accessKeySecret,
        "dysmsapi.aliyuncs.com",
        array_merge($params, array(
            "RegionId" => "cn-hangzhou",
            "Action" => "SendSms",
            "Version" => "2017-05-25",
        )),
        $security
    );
	$code = $content->Code;
	DB::query("INSERT INTO ".DT_PRE."sms (mobile,message,word,editor,sendtime,ip,code) VALUES ('$PhoneNumbers','$captcha','4','$_username','".DT_TIME."','".DT_IP."','$code')");
    return $content;
}

function GetGP($array, $method = 'get'){
	foreach($array as $key){
		//不管存不存在,先声明一个值null的变量
		global $$key;
		
		if(isset($_GET[$key]) && isset($_POST[$key])){
			if($method == 'get'){
				$$key = $_GET[$key];
			}elseif($method == 'post'){
				$$key = $_POST[$key];
			}
		}else if(isset($_GET[$key])){
			$$key = $_GET[$key];
		}else if(isset($_POST[$key])){
			$$key = $_POST[$key];
		}
	}
}