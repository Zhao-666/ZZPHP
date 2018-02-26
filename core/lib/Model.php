<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/26
 * Time: 15:38
 */

namespace core\lib;


use Medoo\Medoo;

class Model extends Medoo
{
    public function __construct()
    {
        $database = Conf::all('database');
        parent::__construct($database);
    }
}