<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/27
 * Time: 10:11
 */

namespace core\lib\driver\log;


use core\lib\Conf;
use Medoo\Medoo;

class Mysql
{
    private static $database;
    private static $table;
    private static $msgField;
    private static $logtimeField;

    //单例模式
    public static function getDb()
    {
        //初始化数据库
        if (self::$database == null) {
            $database = Conf::all('database');
            self::$database = new Medoo($database);

            //初始化数据表信息
            $option = config('log.OPTION');
            self::$table = $option['TABLE'];
            self::$msgField = $option['MSG_FIELD'];
            self::$logtimeField = $option['LOGTIME_FIELD'];
        }
        return self::$database;
    }

    public function log($msg, $type)
    {
        $msg = '[' . $type . '] ' . json_encode($msg);
        self::getDb()->insert(self::$table,
            [
                self::$msgField => $msg,
                self::$logtimeField => date('Y-m-d H:i:s')
            ]);
        $ret = self::getDb()->id();
        if (!$ret || (int)$ret < 0) {
            $msg = self::getDb()->error();
            throw new \Exception(json_encode($msg));
        }
    }
}