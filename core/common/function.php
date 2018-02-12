<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/2/11
 * Time: 14:34
 */

/**
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