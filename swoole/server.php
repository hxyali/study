<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/2
 * Time: 下午5:37
 */

//创建Server对象，监听 127.0.0.1:9501端口
$serv = new swoole_server("127.0.0.1", 9501);

$serv->set(array(
    'workder_num' => 4,
    'max_request' => 10000
));

//监听连接进入事件
/**
 * $fd 客户端链接的唯一标示
 * $reactor_id 线程id
 */
$serv->on('connect', function ($serv, $fd, $reactor_id) {
    echo "Client: {$fd}-{$reactor_id}Connect.\n";
});

//监听数据接收事件
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, "Server: {$fd}-{$from_id}".$data);
});

//监听连接关闭事件
$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.\n";
});

//启动服务器
$serv->start();