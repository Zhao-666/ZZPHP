<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/1/31
 * Time: 21:08
 */

namespace core\lib;

class Route
{
    public $ctrl;
    public $action;

    public function __construct()
    {
        // xxx.com/index/index
        // xxx.com/IndexCtrl.php/index/index
        /**
         * 1、隐藏index.php
         * 2、获取URL参数部分
         * 3、返回对应控制器和方法
         */

        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            // /index/index
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/', trim($path, '/'));
            if (isset($patharr[0])) {
                $this->ctrl = $patharr[0];
                unset($patharr[0]);
            }
            if (isset($patharr[1])) {
                $this->action = $patharr[1];
                unset($patharr[1]);
            } else {
                $this->action = \core\lib\Conf::get('ACTION', 'route');
            }

            //url多余部分转换成GET参数
            //index/index/id/1
            $count = count($patharr) + 2;
            $i = 2;
            while ($i < $count) {
                if (isset($patharr[$i + 1])) {
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                    $i += 2;
                }
            }
        } else {
            $this->ctrl = \core\lib\Conf::get('CTRL', 'route');
            $this->action = \core\lib\Conf::get('ACTION', 'route');
        }
    }
}
