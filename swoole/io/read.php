<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/10
 * Time: 下午7:17
 */

swoole_async_read(__DIR__.'/1.txt', function ($filename, $fileContent) {
    var_dump('test');
    sleep(1);
    echo "filename:".$filename.PHP_EOL;
    echo "content:".$fileContent.PHP_EOL;
});

echo "start";