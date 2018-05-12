<?php if($this->error != NULL):  ?>

<p class="bg-danger"><?php echo $this->error ?></p>
<?php endif; ?>
<form class="form-horizontal" name="frm_sign_in" method="POST" action="<?php echo SITE_PATH?>/User/sign_in">
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