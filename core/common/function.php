<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/2/11
 * Time: 14:34
 */

if (!function_exists('p')) {
    /**
     * 输出一个变量
     * @param $value
     * echo $value
     */
    function p($value)
    {
        if (is_bool($value)) {
            var_dump($value);
        } elseif (is_null($value)) {
            var_dump(NULL);
        } else {
            echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r($value, true) . "</pre>";
        }
    }
}

if (!function_exists('config')) {

    /**
     * 用于获取某个配置文件中的配置值
     * @param $value string/array 需要获取的配置项的名字 route.CONTROLLER ['route','CONTROLLER']
     * @return mixed|null
     */
    function config($value)
    {
        $file = 'config';
        $name = '';
        if (empty($value)) {
            return null;
        } elseif (is_array($value)) {
            $file = trim($value[0]);
            $name = trim($value[1]);
        } elseif (is_string($value)) {
            $param = explode('.', $value);
            if (count($param) > 0) {
                $file = trim($param[0]);
                $name = trim($param[1]);
            } else {
                $name = trim($value);
            }
        }
        return \core\lib\Conf::get($file, $name);
    }
}