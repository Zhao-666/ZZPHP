<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/26
 * Time: 15:58
 */

namespace core\lib;


/**
 * Class Log
 * @package core\lib
 *
 * @method void log($msg) static
 * @method void error($msg) static
 * @method void info($msg) static
 * @method void sql($msg) static
 * @method void notice($msg) static
 * @method void alert($msg) static
 * @method void debug($msg) static
 */
class Log
{
    const LOG = 'log';
    const ERROR = 'error';
    const INFO = 'info';
    const SQL = 'sql';
    const NOTICE = 'notice';
    const ALERT = 'alert';
    const DEBUG = 'debug';

    //日志驱动类
    protected static $class;

    //日志类型
    protected static $type = ['log', 'error', 'info', 'sql', 'notice', 'alert', 'debug'];

    public static function init()
    {
        $driver = config('log')['driver'];
        $class = '\core\lib\driver\log\\' . $driver;
        self::$class = new $class;
    }

    public static function record($msg, $type = 'LOG')
    {
        self::$class->log($msg, $type);
    }

    public static function __callStatic($name, $args)
    {
        if (in_array($name, self::$type)) {
            array_push($args, $name);
            return call_user_func_array('\\core\\lib\\Log::record', $args);
        }
    }
}