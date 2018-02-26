<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/26
 * Time: 16:30
 */

namespace core\lib;


class Controller
{

    public $assign = [];

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP . '/views/' . $file.'.html';
        if (is_file($file)) {
            extract($this->assign);
            include $file;
        } elseif (DEBUG) {
            throw new \Exception('找不到对应的视图文件!!');
        }
    }
}