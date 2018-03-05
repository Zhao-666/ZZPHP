<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/11
 * Time: 16:14
 */

namespace app\controller;

use app\model\Demo;
use core\lib\Controller;

class Index extends Controller
{
    public function index()
    {
        p('I am IndexCtrl');

        //数据库演示
        $demo = new Demo();
        $data = $demo->getOne(1);
        dump($data);

        //视图演示
        $this->assign('data', 'test');
        $this->display('index');
    }
}