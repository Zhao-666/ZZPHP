<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/26
 * Time: 15:44
 */

namespace app\model;

use core\lib\Model;

class Demo extends Model
{
    private $table = "demo";

    public function getOne($id)
    {
        $ret = $this->get($this->table, '*', ['id[=]' => $id]);
        return $ret;
    }

    public function getAll()
    {
        $ret = $this->select($this->table, '*');
        return $ret;
    }

    public function insertOne($datas)
    {
        $ret = $this->insert($this->table, $datas);
        return $ret;
    }

    public function updateOne($id, $data)
    {
        $data = $this->update($this->table, $data, ["id[=]" => $id]);
        return $data->rowCount();
    }

    public function deleteOne($id)
    {
        $data = $this->delete($this->table, ["id[=]" => $id]);
        return $data->rowCount();
    }
}