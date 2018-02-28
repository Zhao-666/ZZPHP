<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/11
 * Time: 14:36
 */

namespace core;

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

//框架引导文件

//定义常量
define('ROOT_PATH', realpath('./'));
define('DS', DIRECTORY_SEPARATOR);
define('RUNTIME_PATH', ROOT_PATH . DS . 'runtime' . DS);
define('LOG_PATH', RUNTIME_PATH . 'log' . DS);
define('CACHE_PATH', RUNTIME_PATH . 'cache' . DS);
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);
define('CORE', ROOT_PATH . DS . 'core');
define('EXT', '.php');

//引入composer机制
include __DIR__ . '/../vendor/autoload.php';

//引入框架函数
require __DIR__ . '/common/function.php';
require __DIR__ . '/Base.php';

//注册自动载入类方法
spl_autoload_register('\core\Base::load');

if (config('app_debug')) {
    $whoops = new Run;
    $errorTitle = '框架出错了';
    $option = new PrettyPageHandler;
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_errors', 'on');
} else {
    ini_set('display_errors', 'off');
}


Base::run();