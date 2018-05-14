<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/9
 * Time: 下午4:46
 */


$server = new swoole_server('localhost', 9051);

$server->on('connect',function(){
   print "connected.";
});

$server->on('receive',function($server, $fd, $from_id, $data){
    $server->send($fd, "接收到{$fd}-{$from_id}数据了{$data}");
});

$server->on('close', function($server, $fd){
    echo 'client clost';
});

$server->start();