<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/1/31
 * Time: 22:35
 */

namespace app\ctrl;

class indexCtrl extends \core\start
{
    public function index()
    {
        p('it is index');
//        $model = new \core\lib\model();
//        $sql = "SELECT * FROM test1";
//        $datas = $model->query($sql);
//        p($datas->fetchAll());

        $data = 'Hello World';
        $this->assign('data', $data);
        $this->display('index.html');
    }
}