<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/11
 * Time: 14:53
 */

namespace core;

use core\lib\Log;
use core\lib\Route;

class Base
{
    private static $classList = [];

    public static function run()
    {
        Log::init();
        Log::info($_SERVER);
        $route = new Route();
        $ctrl = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP . DS . 'controller' . DS . $ctrl . EXT;
        $controller = '\\app\\controller\\' . $ctrl;
        if (is_file($ctrlFile)) {
            $con = new $controller();
            $con->$action();
        } elseif (DEBUG) {
            throw new \Exception('找不到控制器: ' . $ctrlFile);
        } elseif (config('route.EMPTY_CONTROLLER') !== '') {
            $ctrl = config('route.EMPTY_CONTROLLER');
            $ctrlFile = APP . DS . 'controller' . DS . $ctrl . EXT;
            $controller = '\\app\\controller\\' . $ctrl;
            if (is_file($ctrlFile)) {
                $con = new $controller();
                if (method_exists($con, $action)) {
                    $con->$action();
                } elseif (method_exists($con, '_empty')) {
                    $con->_empty($action);
                }
            }
        }
    }

    public static function load($class)
    {
        $class = str_replace('\\', '/', $class);//用来转义反斜杠，适配Linux环境
        if (isset(self::$classList[$class])) {
            return true;
        } else {
            $file = ROOT_PATH . DS . $class . EXT;
            if (is_file($file)) {
                self::$classList[$class] = true;
                include $file;
            } else {
                return false;
            }
        }
    }
}