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
        $filePath = APP . '/views/' . $file . '.html';
        if (is_file($filePath)) {
            $loader = new \Twig_Loader_Filesystem(APP . '/views');
            if (DEBUG) {
                $twig = new \Twig_Environment($loader);
            } else {
                //开启缓存
                $twig = new \Twig_Environment($loader, ['cache' => ROOT_PATH . '/log/twig']);
            }
            $template = $twig->load($file . '.html');
            echo $template->render($this->assign);
        } elseif (DEBUG) {
            throw new \Exception('找不到对应的视图文件');
        }
    }
}