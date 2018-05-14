<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/3/14
 * Time: 下午6:49
 */

/**
 * curl post 请求
 * @param $url
 * @return mixed|string
 */
function curlPost($url, $postData, $httpHeader = [], $isHttps = false, $timeOut = 30)
{
    static $i = 1;
    $data = '';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    if ($isHttps == true) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    }
    if (!empty($httpHeader)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);
    }
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeOut);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $data = curl_exec($ch);
    p($data);

    $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    p($responseCode);
    if (($data == null || $responseCode != 200) && $i < 3) {
        $i++;
        $data = curlPost($url, $postData, $httpHeader, $timeOut);
    }

    if ($data == null || $responseCode != 200) {
        return false;
    }
    return $data;
}

function p ($object){
    echo '<pre>'.print_r($object,true).'</pre>';
}