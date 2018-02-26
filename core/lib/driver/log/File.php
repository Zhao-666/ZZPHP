<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/26
 * Time: 16:14
 */

namespace core\lib\driver\log;

class File
{
    public $path;

    public function __construct()
    {
        $config = config('log.OPTION');
        $this->path = $config['PATH'];
    }

    public function log($msg)
    {
       /**
         * 1、确定文件存储位置是否存在
         *     新建目录
         * 2、写入日志
         */
        $time = date('YmdH');
        if (!is_dir($this->path . $time)) {
            mkdir($this->path . $time, '0777', true);
        }
        file_put_contents($this->path . $time . DS . 'log.php',
            date('Y-m-d H:i:s') . json_encode($msg) . PHP_EOL, FILE_APPEND);
    }
}