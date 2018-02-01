<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/1/31
 * Time: 22:53
 */

namespace core\lib;


class Model extends \PDO
{
    public function __construct()
    {
        $database = Conf::all('database');
        try {
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}