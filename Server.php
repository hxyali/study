<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/4/20
 * Time: 下午6:09
 */

include "vendor/autoload.php";
include 'TestServiceImp.php';

use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TPhpStream;

$processor = new TestServiceProcessor(new TestServiceImp());

$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));

$protocol = new \Thrift\Protocol\TBinaryProtocol($transport,true, true);

$transport->open();
$processor->process($protocol,$protocol);
$transport->close();