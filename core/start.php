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
define('APP', ROOT_PATH . DS . 'app');
define('CORE', ROOT_PATH . DS . 'core');
define('EXT', '.php');
define('DEBUG', true);

include __DIR__ . '/../vendor/autoload.php';

if (DEBUG) {
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

//引入框架函数
require __DIR__ . '/common/function.php';
require __DIR__ . '/Base.php';

//注册自动载入类方法
spl_autoload_register('\core\Base::load');

Base::run();