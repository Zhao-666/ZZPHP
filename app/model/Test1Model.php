<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/2/2
 * Time: 22:18
 */

namespace app\model;

use core\lib\Model;

class Test1Model extends Model
{
    public $table = 'test1';

    public function getAll()
    {
        $ret = $this->select($this->table, '*');
        return $ret;
    }

    public function getOne($id)
    {
        $ret = $this->get($this->table, '*',["id[=]" => $id]);
        return $ret;
    }

    public function insertOne($datas){
        $ret = $this->insert($this->table,$datas);
        return $ret;
    }

    public function updateOne($id, $data)
    {
        $data = $this->update($this->table, $data, ["id[=]" => $id]);
        return $data->rowCount();
    }

    public function deleteOne($id){
        $data = $this->delete($this->table,["id[=]" => $id]);
        return $data->rowCount();
    }
}