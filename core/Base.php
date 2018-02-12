<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/11
 * Time: 14:53
 */

namespace core;

use core\lib\Route;

class Base
{
    private static $classList = [];

    public static function run()
    {
        $route = new Route();
        $ctrl = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP . DS . 'controller' . DS . $ctrl . '.php';
        $controller = '\\app\\controller\\' . $ctrl;
        if (is_file($ctrlFile)) {
            $con = new $controller();
            $con->$action();
        } else {
            throw new \Exception('找不到控制器: ' . $ctrlFile);
        }
    }

    public static function load($class)
    {
        $class = str_replace('\\', '/', $class);//用来转义反斜杠，适配Linux环境
        if (isset(self::$classList[$class])) {
            return true;
        } else {
            $file = ROOT_PATH . DS . $class . '.php';
            if (is_file($file)) {
                self::$classList[$class] = true;
                include $file;
            } else {
                return false;
            }
        }
    }
}