<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/2/1
 * Time: 22:16
 */

namespace core\lib;


class Log
{
    public static $class;

    /**
     * 1、确定日志的存储方式
     *
     * 2、写日志
     */

    public static function init()
    {
        $driver = Conf::get('DRIVER', 'log');
        $class = '\core\lib\driver\log\\' . $driver;
        self::$class = new $class;
    }

    public static function log($name,$file = 'log')
    {
        self::$class->log($name,$file);
    }
}