<?php
// 单例模式


class DB
{
    /**
     * @var DB $db
     */
    private static $db;

    public static function getInstance(): DB
    {
        if (!(static::$db instanceof self)) {
            static::$db = new static();
        }
        return self::$db;
    }

    // 防止从外部实例化
     private function __construct()
    {

    }

    // 防止实例被克隆
    private function __clone()
    {

    }

    // 防止实例被反序列化
    private function __wakeup()
    {

    }

    public function connect()
    {
        echo 'connected', PHP_EOL;
    }

    public function index(): string
    {
        return 'index';
    }
}

$db = DB::getInstance();
$db->connect();


