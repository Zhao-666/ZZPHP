<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/1/31
 * Time: 22:53
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