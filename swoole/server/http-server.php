<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/9
 * Time: 下午6:18
 */
$server = new swoole_http_server('localhost', 80);

$server->set([
   'document_root' => '/data/www/starcircle/study/swoole/data',
    'enable_static_handler' => true
]);

$server->on('request', function($request, $response) use ($server) {
    $params = $request->get;
    $data = [
      'id' => 1,
      'data' => 'some data'
    ];
    $server->task($data);
    var_dump($params);

    $response->end(json_encode($params));
});

$server->start();