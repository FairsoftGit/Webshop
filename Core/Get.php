<?php
/**
 * Created by PhpStorm.
 * User: JustinR
 * Date: 17-5-2018
 * Time: 14:58
 */

class Get
{
    //filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL)
    public static function get($key, $filter = null, $options = null, $default = null) {
        $value = filter_input(INPUT_GET, $key, $filter, $options);
        if($value === FALSE) {
            return $default;
        }
        return $value;
    }
}