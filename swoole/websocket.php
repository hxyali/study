<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/4
 * Time: 上午11:12
 */

$ws = new swoole_websocket_server('0.0.0.0', 9501);

//监听连接打开事件，第一次握手
$ws->on('open', function ($ws, $request) {
    var_dump($request);
    $ws->push($request->fd, "hello");
});

$ws->on('message', function ($ws, $frame) {
    echo "msg:{$frame->data}\n";
    $ws->push($frame->fd, "server: {$frame->data}");

});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();