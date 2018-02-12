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
    public $ctrl;
    public $action;

    public function __construct()
    {
        /**
         * 1、隐藏index.php
         * 2、获取URL参数部分
         * 3、返回对应控制器和方法
         */
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/') {
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('?', $path);//将ctrl/action和param分开
            $this->setRoute($pathArr[0]);
            isset($pathArr[1]) && $this->setParam($pathArr[1]);
        } else {
            $this->ctrl = Conf::get('CTRL', 'route');
            $this->action = Conf::get('ACTION', 'route');
        }
    }

    private function setRoute($route)
    {
        $routeArr = explode('/', trim($route, '/'));
        if (isset($routeArr[0])) {
            $this->ctrl = $routeArr[0];
        }
        if (isset($routeArr[1])) {
            $this->action = $routeArr[1];
        } else {
            $this->action = Conf::get('ACTION', 'route');
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