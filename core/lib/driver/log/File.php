<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/2/1
 * Time: 22:21
 */

namespace core\lib\driver\log;

use core\lib\Conf;

class File
{
    public $path;

    public function __construct()
    {
        $conf = Conf::get('OPTION', 'log');
        $this->path = $conf['PATH'];
    }

    public function log($msg, $file = 'log')
    {
        /**
         * 1、确定文件存储位置是否存在
         *     新建目录
         * 2、写入日志
         */
        if (!is_dir($this->path . date('YmdH'))) {
            mkdir($this->path . date('YmdH'), '0777', true);
        }
        return file_put_contents($this->path. date('YmdH') .'/' . $file . '.php', date('Y-m-d H:i:s') . json_encode($msg) . PHP_EOL, FILE_APPEND);
    }
}