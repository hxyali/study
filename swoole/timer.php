<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/4
 * Time: 上午11:17
 */
 swoole_timer_tick(2000, function ($timer_id) {
     echo "tick-2000ms\n";
 });

