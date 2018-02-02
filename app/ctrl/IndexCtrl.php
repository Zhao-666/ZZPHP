<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/1/31
 * Time: 22:35
 */

namespace app\ctrl;

use app\model\Test1Model;
use core\lib\Model;

class IndexCtrl extends \core\Start
{
    public function index()
    {
        $data = 'Hello World';
        $this->assign('data',$data);
        $this->display('index.html');
    }

    public function test(){
        $data = 'test';
        $this->assign('data',$data);
        $this->display('test.html');
    }
}