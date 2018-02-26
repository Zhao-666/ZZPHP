<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/26
 * Time: 15:58
 */

namespace core\lib;


class Log
{
    private static $class;

    public static function init()
    {
        $driver = config('log.DRIVER');
        $class = '\core\lib\driver\log\\' . $driver;
        self::$class = new $class;
    }

    public static function log($msg)
    {
        self::$class->log($msg);
    }
}