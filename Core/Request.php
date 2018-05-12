<?php
class Request{
	
	public static function data(){
		$method = $_SERVER['REQUEST_METHOD'];
        $data = NULL;
		switch($method){
			case 'POST':
				$data = $_POST;
				break;
			case'GET':
				$data = $_GET;
				break;
		}
		return $data;
	}


    public static  function redirect($redirect_to){
        $_htmls =  '<script type="text/javascript">';
        $_htmls .= 'window.location ="'.SITE_PATH.$redirect_to.'"';
        $_htmls .= '</script>';

        echo($_htmls);

    }
}