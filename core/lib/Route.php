<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/2/11
 * Time: 15:30
 */

namespace core\lib;

class Route
{
    public $ctrl;//请求的controller
    public $action;//请求的action

    private static $route;//用于保存route.php文件中配置的路由规则

    public function __construct()
    {
        /**
         * 1、隐藏index.php
         * 2、获取URL参数部分
         * 3、返回对应控制器和方法
         */
        if (!isset(self::$route)) {
            //读取route.php文件，初始化匹配路由规则
            self::$route = include CORE . DS . 'common' . DS . 'route' . EXT;
        }
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/') {
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('?', $path);//将ctrl/action和param分开
            $this->setRoute($pathArr[0]);
            isset($pathArr[1]) && $this->setParam($pathArr[1]);
        } else {
            $this->ctrl = config('default_controller');
            $this->action = config('default_action');
        }
    }

    private function setRoute($route)
    {
        $routeArr = explode('/', trim($route, '/'));
        if (array_key_exists($routeArr[0], self::$route)) {
            $path = self::$route[$routeArr[0]];
            $routeArr = explode('/', trim($path, '/'));
        }
        if (!empty($routeArr[0])) {
            $this->ctrl = $routeArr[0];
        } else {
            $this->ctrl = config('default_controller');
        }
        if (!empty($routeArr[1])) {
            $this->action = $routeArr[1];
        } else {
            $this->action = config('default_action');
        }
    }

    private function setParam($param)
    {
        $paramArr = explode('&', $param);
        foreach ($paramArr as $param) {
            $param = explode("=", $param);
            $_GET[$param[0]] = $param[1];
        }
    }
}