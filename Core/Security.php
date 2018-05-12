<?php
include_once('config.php');
class Security{
    public static function hash($string){

        return md5(SALT.$string);
    }
}