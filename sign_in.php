<?php include_once('View/elements/includes.php');?>

<?php
Model::import('UserModel');
$error = NULL;
$data =  Request::data();
if(isset($data['btn_sign_in'])){
    if($data['userName'] != "" && $data['password']){
        $userName = $data['userName'];
        $password = Security::hash($data['password']);
        $userModel = new UserModel();
        $user = $userModel->login($userName,$password);

        if(sizeof($user)){
            Sessions::setSession("logged",true);
            Sessions::setSession("loggedUser",$user[0]);
            $role = $user[0]['role'];
            switch($role){
                case "admin":
                    echo 'admin';
                    Request::redirect('/Admin/index');
                    break;
                case "teacher":
                    Request::redirect('/Teacher/index');
                    break;
                case "student":
                    Request::redirect('/Student/index');
                    break;
                case "parent":
                    Request::redirect('/Parent/index');
                    break;
            }
        }
    }else{
        $error = "Email or Password cannot be blank";
    }
}


?>




<?php include_once('View/elements/header.php');?>

<?php include_once('View/elements/main_navigation.php');?>
<div id="content">

    <div id="main">

        <?php if($error != NULL):  ?>

            <p class="bg-danger"><?php echo $error ?></p>
        <?php endif; ?>
        <form class="form-horizontal" name="frm_sign_in" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="userName" placeholder="User Name" name="userName">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="btn_sign_in" >Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once('View/elements/footer.php');?>