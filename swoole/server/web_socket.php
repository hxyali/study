<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/9
 * Time: 下午6:46
 */

$server = new swoole_websocket_server('0.0.0.0', 3031);
$server->on('open', function(swoole_websocket_server $server, $request){
   echo "server:握手成功-{$request->fd}\n";
});

$server->on('message', function(swoole_websocket_server $server, $frame) {
    echo "receive from{$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}";
    $server->push($frame->fd,"this is server");
});

$server->on('close', function(swoole_websocket_server $server, $fd){
    echo "{$fd} closed";
});

$server->start();

