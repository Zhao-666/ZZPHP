<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/1/30
 * Time: 23:09
 */

namespace core;

class Start
{
    public static $classMap = [];
    public $assign;

    public static function run()
    {
        \core\lib\Log::init();
        \core\lib\Log::log($_SERVER, 'server');
        $route = new \core\lib\Route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP . '/ctrl/' . $ctrlClass . 'Ctrl.php';//路径
        $controller = '\\' . MODULE . '\ctrl\\' . $ctrlClass . 'Ctrl';//命名空间
        if (is_file($ctrlFile)) {
            $ctrl = new $controller();
            $ctrl->$action();
            \core\lib\Log::log('ctrl:' . $ctrlClass . '   action:' . $action);
        } else {
            throw new \Exception('找不到控制器 ' . $ctrlClass);
        }
    }

    public static function load($class)
    {
        //自动加载类库
        //配合index.php中的spl_autoload_register使用
        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = IMOOC . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP . '/views/' . $file;
        if (is_file($file)) {
            extract($this->assign);
            include $file;
        } else {

        }
    }
}