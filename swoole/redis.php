<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/4
 * Time: 上午11:32
 */

$redis = new Swoole\Redis;
$redis->connect('127.0.0.1', 6379, function ($redis, $result) {
    $redis->set('test_key', 'value', function ($redis, $result) {
        $redis->get('test_key', function ($redis, $result) {
            var_dump($result);
        });
    });
});