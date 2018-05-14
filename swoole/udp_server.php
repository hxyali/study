<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/3
 * Time: 下午6:01
 */
function p ($arr)
{
    echo "<pre>".print_r($arr, true)."</pre>";
}
$serv = new swoole_server('127.0.0.1', 9501, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$serv->on('Packet', function ($serv, $data, $clientInfo) {
    $serv->sendto($clientInfo['address'], $clientInfo['port'], 'Server'.$data);
    var_dump($clientInfo);
});
$serv->start();