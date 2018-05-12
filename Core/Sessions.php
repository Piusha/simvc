<?php

class Sessions{
    public static function init(){
        @session_start();
    }
    public static function setSession($key , $value){
            $_SESSION[$key]   =   $value;
    }
    public static function hasSession($key){
        if(isset($_SESSION[$key])){
            return true;
        }else{
            return false;
        }
    }
    public static function getSession($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    public static function destroySession($key){
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
        
    }
}