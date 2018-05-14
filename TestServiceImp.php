<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/4/23
 * Time: 上午11:11
 */



include "gen-php/TestService.php";


class TestServiceImp implements TestServiceIf
{
    public function getStr($type){
        switch($type){
            case 0:
                $return = 'hello world';break;
            case 1:
                $return = 'You are welcome!';break;
            case 2:
                $return = 'Read the fuck source code!';break;
        }
        return $return;
    }
}