<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/5/11
 * Time: 下午12:05
 */

class mysql
{
    public $server;
    public $config = array();

    /**
     * mysql constructor.
     */
    public function __construct()
    {
        $this->server = new swoole_mysql;
        $this->config = array(
          'host'=>'10.135.118.88',
          'port'=>'3306',
          'user'=>'wxsmart',
          'password'=>'7fFofe_4_6_10mCqDIebWCNVA',
          'database'=>'',
          'charset'=>'utf8',
          'timeout'=>'2',
        );
    }


    public function execute($id)
    {
        $this->server->connect($this->config, [$this, 'onConnect']);

        $sql = 'select * from smart_schedule where schedule_id = '. $id;
        $this->server->query($sql, [$this, 'query']);
    }

    public function query($server, $result)
    {
        echo 'query success, result='.json_encode($result);
    }

    public function onConnect($server, $result)
    {
        if($result == false) {
            echo 'mysql connect error';
            die;
        }elseif ($result == true) {
            var_dump($server->affected_rows, $server->insert_id);
        }

        var_dump($result);
        $server->close();

    }
}

$mysql = new mysql();
$mysql->execute('108315249');