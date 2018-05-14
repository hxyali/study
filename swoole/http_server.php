<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/4
 * Time: 上午10:36
 */

$http = new swoole_http_server("0.0.0.0", 9501);
$http->on('request', function($request, $response){
    var_dump($request);
    var_dump($request->get, $request->post);
    $response->header('Content-Type', 'text/html; charset=utf-8');
    $response->end("<h1>hello swoole</h1>");
});

$http->start();