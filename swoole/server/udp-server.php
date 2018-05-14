<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/9
 * Time: 下午4:56
 */

$server = new swoole_server('localhost', 9052,SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$server->on('Packet', function($server, $fd, $from_id, $data){
    $server->sendto("收到{$fd}-{$from_id}数据");
});



$server->start();