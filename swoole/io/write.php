<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/10
 * Time: 下午7:29
 */

swoole_async_writefile(__DIR__.'/1.txt', time()."\n",function(){
   echo 'write finish';
},FILE_APPEND);

echo 'start';