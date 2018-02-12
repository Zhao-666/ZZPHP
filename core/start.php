<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/11
 * Time: 14:36
 */

namespace core;

//框架引导文件

//定义常量
define('ROOT_PATH', realpath('./'));
define('APP', ROOT_PATH . '/app');
define('CORE', ROOT_PATH . '/core');
define('DS', DIRECTORY_SEPARATOR);
define('DEBUG', true);
if (DEBUG) {
    ini_set('display_errors', 'on');
} else {
    ini_set('display_errors', 'off');
}

//引入框架函数
require __DIR__ . "/common/function.php";
require __DIR__ . "/Base.php";

//注册自动载入类方法
spl_autoload_register('\core\Base::load');

Base::run();
