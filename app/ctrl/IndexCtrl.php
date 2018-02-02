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
        $model = new Test1Model();
        $datas = $model->getAll();
        dump($datas);

        $data = $model->getOne(8);
        dump($data);

//        $ret = $model->insertOne(['key'=>'cqscqs','value'=>'zxcdwqdz']);
//        $ret = $model->insertOne(['key'=>'cqqqwdqwwdscqs','value'=>'zxdwdcz']);
//        $ret = $model->insertOne(['key'=>'cqsdcqs','value'=>'zxwdcz']);
//        $ret = $model->insertOne(['key'=>'cqsdcqs','value'=>'zxdwqcz']);
//        $ret = $model->insertOne(['key'=>'cqsqwqwdcqs','value'=>'zxqssscz']);
//        $ret = $model->insertOne(['key'=>'cqsqwcqs','value'=>'zxczsss']);

//        $ret = $model->updateOne(3,['key'=>'qscesz']);
//        dump($ret);
//
//        $ret = $model->deleteOne(9);
//        dump($ret);
    }
}