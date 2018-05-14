<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/10
 * Time: 下午5:06
 */

class http_server
{
    const IP = '0.0.0.0';
    const PORT = 80;
    public $server;

    public $response;

    public function __construct()
    {
        $this->server = new swoole_http_server(self::IP, self::PORT);
        $this->server->set([
            'document_root' => '/data/www/starcircle/study/swoole/data',
            'enable_static_handler' => true,
            'task_worker_num' => 4
        ]);

        $this->server->on('request', [$this, 'onRequest']);
        $this->server->on('task', [$this, 'onTask']);
        $this->server->on('finish', [$this, 'onFinish']);
        $this->server->start();
    }

    public function onRequest($request, $response)
    {
        //定时器
        //swoole_timer_tick(2000, function(){
        //echo 'timeout\n';
        //});

        echo '接收请求。。。。。\n';
        $content = [
            'date' => date('Y-m-d H:i:s'),
            'get' => $request->get,
            'post' => $request->post,
            'header' => $request->header
        ];
        // 消息投递
        //$this->server->task($request->get);
        //swoole_timer_after(5000, function(){
        //   echo '55555\n';
        //});

        //异步记录日志
        swoole_async_writefile(__DIR__ . '/1.txt', json_encode($content) . PHP_EOL, function () {
            echo 'finish write';
        }, FILE_APPEND);

        $this->response = $response;
        $response->end('已经投递完成');
    }

    public function onTask($server, $taskId, $workerId, $data)
    {
        echo "投递消息 {$taskId} \n";
        echo "异步处理消息开始。。。。。";
        sleep(5);
        echo "异步处理消息结束。。。。。";

        return '异步处理请求完成';
    }

    public function onFinish($server, $taskId, $data)
    {
        echo "finish Task...{$taskId}";
    }
}