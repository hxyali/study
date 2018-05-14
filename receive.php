<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
$conn = new AMQPStreamConnection('127.0.0.1',5672,'smart','123456@','loc_smart');
$channel = $conn->channel();
$queue = $channel->queue_declare('hello',false,false,false,false);
echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";
$callback = function($msg) {
    echo " [x] Received ", $msg->body, "\n";
};
$channel->basic_consume('hello', '', false, true, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}
