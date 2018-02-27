<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/26
 * Time: 15:57
 */

//框架默认日志配置文件
return [
//    'DRIVER' => 'File',
//    'OPTION' => [
//        'PATH' => ROOT_PATH . '/log/'
//    ]

    'DRIVER' => 'Mysql',
    'OPTION' => [
        'TABLE' => 'log',
        'MSG_FIELD' => 'message',
        'LOGTIME_FIELD' => 'log_time'
    ]
];