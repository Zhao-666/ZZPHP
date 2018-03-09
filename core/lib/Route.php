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
    //请求的controller
    public $ctrl;

    //请求的action
    public $action;

    //用于保存route.php文件中配置的路由规则
    private static $rules;

    public function __construct()
    {
        /**
         * 1、隐藏index.php
         * 2、获取URL参数部分
         * 3、返回对应控制器和方法
         */
        if (!isset(self::$rules)) {
            self::setRules();
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

    //读取route.php文件，初始化匹配路由规则
    private static function setRules()
    {
        $rules = include CORE . DS . 'common' . DS . 'route' . EXT;
        foreach ($rules as $key => $value) {
            if (strpos($key, '.')) {//key中包含get或post之类的字段
                $arr = explode('.', $key);
                self::$rules[$arr[0]][$arr[1]] = $value;//将get.test中的test放入get数组
            } else {
                self::$rules['get'][$key] = $value;//默认为get请求
            }
        }
    }

    private function setRoute($route)
    {
        $routeArr = explode('/', trim($route, '/'));
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if (array_key_exists($routeArr[0], self::$rules[$method])) {
            $path = self::$rules[$method][$routeArr[0]];
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