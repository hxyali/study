<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/4/23
 * Time: 下午2:38
 */
header('Content-type: text/html; charset=utf-8');
include "vendor/autoload.php";
include "TestServiceImp.php";

$socket = new \Thrift\Transport\THttpClient('localhost',8080,'/Server.php?srv=TestServiceImp');
$trans = new \Thrift\Transport\TBufferedTransport($socket, 1024, 1034);
$protocol = new \Thrift\Protocol\TBinaryProtocol($trans);

$client = new TestServiceClient($protocol);
$trans->open();
$res = $client->getStr(2);
var_dump($res);
$trans->close ();