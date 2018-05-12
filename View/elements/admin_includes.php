<?php
require('../Core/Sessions.php');
Sessions::init();
include_once('../config.php');
require('../Core/Security.php');
require('../Core/Request.php');
require('../Admin/Core/Model.php');
$loggedUser = NULL;
if(!Sessions::getSession('logged')){
    Request::redirect('/sign_in');
    exit(0);
}else{
  $loggedUser = Sessions::getSession("loggedUser");
}


?>

