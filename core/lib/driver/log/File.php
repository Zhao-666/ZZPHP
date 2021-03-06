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
        $this->path = config('log')['path'];
    }

    public function log($msg, $type)
    {
        $msg = '[' . $type . '] ' . json_encode($msg);
        $time = date('YmdH');
        if (!is_dir($this->path . $time)) {
            mkdir($this->path . $time, '0777', true);
        }
        file_put_contents($this->path . $time . DS . 'log.php',
            date('Y-m-d H:i:s') . $msg . PHP_EOL, FILE_APPEND);
    }
}