<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/9
 * Time: 下午4:37
 */

$server = new swoole_client(SWOOLE_TCP);
$server->connect('127.0.0.1', 9051);

fwrite(STDIN, '请输入');
$msg = fgets(STDOUT);

$server->send($msg);

$recive = $server->recv();

var_dump($recive);