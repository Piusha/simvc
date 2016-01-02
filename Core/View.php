<?php
class View{
   
    public function render($name){
           // require('views/header.php');
            require('Views/pages/'.$name.'.php');
           // require('views/footer.php');
        }

}

