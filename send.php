<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/tools.php';


$url = "http://movie.test.maoyan.com/baseservice/gateway";

$bizData = [
    'idempotent' => 2,
    'bizType' => 1,
    'msgType' => 10,
    'sendTime' => time() + 3600,
    'templateParamJson' => '{misId:1,validCode:2}',
    'telphone' => 13641254625,
    'templateId' => 15794,
    'sendTimeType' => 0,
];
$postData = [
    'api' => 'baseservice.msg.sendsms',
    'bizData' => json_encode($bizData),
    'merCode' => 1000014,
    'signType' => 'MD5',
    'timestamp' => time() + 3600,
    'version' => '1.0',
];
$str = '';
foreach ($postData as $k => $v) {
    $str .= $k . '=' . $v . '&';
}
$str .= 'key=A013F70DB97834C0A5492378BD76C53A';
//echo $str;
$singMsg = md5($str);
$postData['signMsg'] = $singMsg;
p($postData);
//die;
$header =  array('Content-type: application/x-www-form-urlencoded');
$ret = curlPost($url, json_encode($postData), $header);
