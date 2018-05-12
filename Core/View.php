<?php

class View{
    
    private $content;
    public $flash = NULL;
    public $page_name;

    function __construct(){
        
    }
    public function render($name,$noInclude = false){

        if($noInclude == true){
            require('View/pages/'.$name.'.php');
        }else{
            $this->page_name = $name;
            $this->content   = $name;
            $this->getFlash();

            require('View/default.php');
        
        }
    } 
    
    public function content(){
    	require_once('View/pages/'.$this->content.'.php');
    }
    
    public function element($element){
    	require_once('View/elements/'.$element.'.php');
    }
    
    public function redirect($redirect_to){
    		$_htmls =  '<script type="text/javascript">';
    		$_htmls .= 'window.location ="'.SITE_PATH.$redirect_to.'"';
    		$_htmls .= '</script>';
    	
    		echo($_htmls);
    	 
    }
    
    public function setFlash($message){
    	Sessions::setSession("flashMessage", $message);
    }
    
    private function getFlash(){
    	$this->flash =NULL;
    	if(Sessions::hasSession('flashMessage')){
    		$this->flash = Sessions::getSession("flashMessage");
    		Sessions::destroySession('flashMessage');
    	}
    	
    	
    	
    }
}

