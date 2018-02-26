<?php
/**
 * Created by PhpStorm.
 * User: ZJH
 * Date: 2018/2/12
 * Time: 11:39
 */

namespace core\lib;


class Conf
{
    public static $conf = [];

    /**
     * 用于获取某个文件中的一个配置项
     * @param $file string 配置文件名
     * @param $name string 需要的配置项名称
     * @return mixed 获取到的值
     * @throws \Exception
     */
    public static function get($file, $name)
    {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            $file_path = CORE . DS . 'config' . DS . $file . EXT;
            if (is_file($file_path)) {
                $config = include $file_path;
                if (isset($config[$name])) {
                    self::$conf[$file] = $config;
                    return $config[$name];
                } else {
                    throw new \Exception('找不到该配置项：' . $name);
                }
            } else {
                throw new \Exception('找不到该配置文件：' . $file . EXT);
            }
        }
    }

    /**
     * 用于获取某个文件中的全部配置项
     * @param $file string 配置文件名
     * @return mixed 获取到的值
     * @throws \Exception
     */
    public static function all($file)
    {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            $file_path = CORE . DS . 'config' . DS . $file . EXT;
            if (is_file($file_path)) {
                $config = include $file_path;
                self::$conf[$file] = $config;
                return $config;
            } else {
                throw new \Exception('找不到该配置文件：' . $file . EXT);
            }
        }
    }
}