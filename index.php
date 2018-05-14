<?php
function p($arr)
{
    echo "<pre>".print_r($arr, true)."</pre>";
}
$host = '10.135.118.88';
$port = 3306;
$user = 'wxsmart';
$password = '7fFofe_4_6_10mCqDIebWCNVA';
$charset = 'utf8';
$db = 'smart_new';

$mysql = new mysqli($host, $user, $password, $db, $port);
if($mysql) {
    $sql = 'SELECT * FROM smart_price_discount WHERE `status` = 2 ORDER BY pd_id DESC ';
    $result = $mysql->query($sql);
    if($result) {
        if($result->num_rows > 0) {
            while($row =$result->fetch_array() ){                        //循环输出结果集中的记录
                echo ($row[0])."<br>";
                echo ($row[1])."<br>";
                echo ($row[2])."<br>";
                echo ($row[3])."<br>";
                echo "<hr>";
            }
        }
    }
    p($result);die;

}else {
    echo '链接失败';
}

//$redis = new Redis();
//$redis->connect('10.251.70.191', 8003);
//$redis->select(4);
//$redis->setOption(Redis::OPT_SCAN, Redis::SCAN_RETRY);
//$iterator = null;
//$projectKeys = [];
//
//while ($keys = $redis->scan($iterator, "EZTICKET_PROJECT_*-*")) {
//    foreach ($keys as $key) {
//        array_push($projectKeys, $key);
//    }
//}
//p($projectKeys);die;


