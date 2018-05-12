<?php
/**
 * This is Boostrap Class act as top layer of the MVC architecture 
 * author PIUSHA KALYANA
 */
class Boostrap{
    private $out_put = array();
    private $is_allow =false;
    public $controller_name;

    function __construct(){
        $url    = isset($_GET["url"]) ? $_GET["url"] : null;
        $url    = rtrim($url,'/');
        $url    = explode('/' ,$url);

        /*If URL EMPTY*/
        if(empty($url[0])){
            require_once('Controller/BaseController.php');
            if(Sessions::hasSession("logged")){
                require('Controller/DashBoardController.php');
                $this->controllerName = "DashBoard";
                $controller     = new DashBoard();
                $controller->beforeFilter();
                $controller->index();
            }else{
                require('Controller/HomeController.php');
                $this->controllerName = "Home";
                $controller     = new Home();
                $controller->index();
            }
        exit;
        }

        $file = 'Controller/'.$url[0].'Controller.php';

        if(file_exists($file)){
            require_once('Controller/BaseController.php');
            require($file);
        }else{
            $this->controllerNotDefined();
            exit;
        }

        $controller     = new $url[0];

        if(method_exists($controller,@beforeFilter)){
            $this->out_put= $controller->beforeFilter();

        }
        $function_name = (isset($url[1]))?$url[1]:'index';
        if(isset($controller->allow)){
            if(in_array($function_name, $controller->allow)){
                $this->is_allow = true;
            }
        }else{
            $function_name = (isset($url[1]))?$url[1]:'index';
            $this->is_allow = true;
        }



        if($this->is_allow){
            if(isset($url[2])){
                if(method_exists($controller,$function_name)){

                    $controller->{$function_name}($url[2]);

                }else{

                    $this->error();
                }
            }else{
                if(method_exists($controller,$function_name)){
                    $controller->{$function_name}();

                }else{
                    $this->error();
                }
            }

        }else{
            $this->no_permission();
        }



    }

    function error(){
        require("Controller/ErrorController.php");
        $controller     = new Error();
        $controller->index();
        return false;
    }

    function noPermission(){
        require("Controller/ErrorController.php");
        $controller     = new Error();
        $controller->noPermission();
        return false;
    }
    function controllerNotDefined(){
        require("Controller/ErrorController.php");
        $controller     = new Error();
        $controller->controllerNotDefined();
        return false;
    }
}
