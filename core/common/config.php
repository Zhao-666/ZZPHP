<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/12
 * Time: 14:58
 */

//框架默认配置文件

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用调试模式
    'app_debug' => true,

    // +----------------------------------------------------------------------
    // | 路由设置
    // +----------------------------------------------------------------------

    //默认控制器
    'default_controller' => 'Index',
    //默认操作
    'default_action' => 'index',
    //默认的空控制器名
    'empty_controller' => 'EmptyCon',

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------

    'log' => [
        //驱动类型
        'driver' => 'File',
        //详细配置
        'path' => LOG_PATH,

//        'driver' => 'Mysql',
//        'table' => 'log',
//        'msg_field' => 'message',
//        'logtime_field' => 'log_time'
    ],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------

    'cache' => [
        // 驱动方式
        'type' => 'File',
        // 缓存保存目录
        'path' => CACHE_PATH,
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],

];