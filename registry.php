<?php

// 注册模式

abstract class registry
{
    const LOGGER = 'logger';

    public static array $objects = [];

    public static function set($key, $value)
    {
        self::$objects[$key] = $value;
    }

    public static function get($key)
    {
        return self::$objects[$key];
    }
}

$key = Registry::LOGGER;
$logger = new stdClass();

Registry::set($key, $logger);
$storedLogger = Registry::get($key);
var_dump($storedLogger);
