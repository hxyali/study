<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/3/15
 * Time: 上午10:27
 */

function testPost($url, $postData, $header)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//设置是否返回信息
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $data = curl_exec($ch);
    $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    p($data);
    p($responseCode);

    if(curl_errno($ch)){//出错则显示错误信息
        print curl_error($ch);
    }
    curl_close($ch);
}

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
$ret = testPost($url, $postData, $header);


function p ($object){
    echo '<pre>'.print_r($object,true).'</pre>';
}