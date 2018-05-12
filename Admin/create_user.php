<?php include_once('../View/elements/admin_includes.php');?>

<?php
Model::import('ParentModel');
$parentOBJ = new ParentModel();
$error = NULL;
$data =  Request::data();

if(isset($data['btn_create_user'])){
    $user_role= $data['role'];
    if($user_role ==  'admin'){
        Model::import('AdminModel');
        $data['password']       = Security::hash($data['password']);
        $data['created_date']   = date('Y-m-d H:i:s');
        $data['reset_code']     = Security::hash($data['user_name']);


        $adminOBJ = new AdminModel();
        $adminOBJ->create($data);
    }else if($user_role ==  'teacher'){
        Model::import('TeacherModel');
        $data['password']       = Security::hash($data['password']);
        $data['created_date']   = date('Y-m-d H:i:s');
        $data['reset_code']     = Security::hash($data['user_name']);
        $data['date_of_birth']  = $data['year'].'-'.$data['month'].'-'.$data['date'];
        $data['date_of_joined'] = $data['year'].'-'.$data['month'].'-'.$data['date'];

        $teacherOBJ = new TeacherModel();
        $teacherOBJ->create($data);

    }else if($user_role ==  'parent'){

        $data['password']       = Security::hash($data['password']);
        $data['created_date']   = date('Y-m-d H:i:s');
        $data['reset_code']     = Security::hash($data['user_name']);
        $data['registered_date']  = $data['year'].'-'.$data['month'].'-'.$data['date'];



        $parentOBJ->create($data);

    }else if($user_role ==  'student'){
        Model::import('StudentModel');
        $data['password']       = Security::hash($data['password']);
        $data['created_date']   = date('Y-m-d H:i:s');
        $data['reset_code']     = Security::hash($data['user_name']);
        $data['date_of_birth']  = $data['year'].'-'.$data['month'].'-'.$data['date'];
        $data['date_of_joined']  = $data['doj_year'].'-'.$data['doj_month'].'-'.$data['doj_date'];


        $studentOBJ = new StudentModel();
        $studentOBJ->create($data);
    }




}
$parents = $parentOBJ->getParents();

?>



<?php include_once('../View/elements/header.php');?>



<?php include_once('../View/elements/main_navigation.php');?>
<div class="row">
    <div class="col-md-8">
        <form name="frm_create_user" method="POST" action="<?php echo SITE_PATH?>/Admin/create_user">
            <div class="form-group">
                <label for="role">User Role</label>
                <select class="form-control" name="role" id="role">
                    <option value="admin">Admin</option>
                    <option value="parent">Parent</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" required="required">
            </div>
            <div class="form-group student teacher parent">
                <label for="middle_name ">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" placeholder="Middle Name" name="middle_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" placeholder="Last Name" name="last_name">
            </div>
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" class="form-control" id="user_name" placeholder="User Name" name="user_name" required="required">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <div class="form-group student teacher parent">
                <label for="address1">Address 1</label>
                <input type="text" id="address1" name="address1">
            </div>

            <div class="form-group student teacher parent">
                <label for="address2">Address 2</label>
                <input type="text" id="address2" name="address2">
            </div>

            <div class="form-group student teacher parent">
                <label for="city">City</label>
                <input type="text" id="city" name="city">
            </div>

            <div class="form-group student teacher parent">
                <label for="city">State</label>
                <input type="text" id="state" name="state">
            </div>

            <div class="form-group student teacher parent">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip">
            </div>
            <div class="form-group student teacher parent">
                <label for="email">Email ID</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group student teacher parent">
                <label for="gender">Gender</label>
                <select class="form-control col-xs-2" name="gender">
                    <option value="1">Male</option>
                    <option value="2">FeMale</option>
                </select>
            </div>

            <div class="form-group ">
                <label for="contact_number1">Contact Number 1</label>
                <input type="text" id="contact_number1" name="contact_number1">
            </div>

            <div class="form-group student teacher parent">
                <label for="contact_number2">Contact Number 2</label>
                <input type="text" id="contact_number2" name="contact_number2">
            </div>

            <div class="form-group student teacher parent">
                <label for="date_of_birth">Date Of Birth</label>
                <select class="form-control col-xs-2" name="date">
                    <?php for($a = 1;$a<= 31; $a++): ?>
                    <option value="<?php echo $a ?>"><?php echo $a ?></option>
                    <?php endfor;?>
                </select>
                <select class="form-control col-xs-2" name="month">
                    <?php for($a = 1;$a<= 12; $a++): ?>
                        <option value="<?php echo $a ?>"><?php echo $a ?></option>
                    <?php endfor;?>
                </select>
                <select class="form-control col-xs-2" name="year">
                    <?php for($a = 1980;$a<= 2000; $a++): ?>
                        <option value="<?php echo $a ?>"><?php echo $a ?></option>
                    <?php endfor;?>
                </select>
            </div>

            <div class="form-group student teacher">
                <label for="date_of_joined">Date Of Joined</label>
                <select class="form-control col-xs-2" name="doj_date">
                    <?php for($a = 1;$a<= 31; $a++): ?>
                        <option value="<?php echo $a ?>"><?php echo $a ?></option>
                    <?php endfor;?>
                </select>
                <select class="form-control col-xs-2" name="doj_month">
                    <?php for($a = 1;$a<= 12; $a++): ?>
                        <option value="<?php echo $a ?>"><?php echo $a ?></option>
                    <?php endfor;?>
                </select>
                <select class="form-control col-xs-2" name="doj_year">
                    <?php for($a = 1980;$a<= 2016; $a++): ?>
                        <option value="<?php echo $a ?>"><?php echo $a ?></option>
                    <?php endfor;?>
                </select>
            </div>



            <div class="form-group student">
                <label for="parent_id">Parent Name</label>

                <select class="form-control col-xs-2" name="parent_id">
                    <?php foreach($parents as $parent): ?>
                        <option value="<?php echo $parent['id']?>"><?php echo $parent['first_name']. ' '. $parent['last_name']?></option>
                    <?php endforeach;?>
                </select>

            </div>


            <button type="submit" class="btn btn-default" name="btn_create_user">Submit</button>
        </form>



    </div>
    <div class="col-md-4">.col-md-4</div>
</div>
<script src="<?php echo SITE_PATH ?>/Public/js/administrator.js"></script>


<?php include_once('../View/elements/footer.php');?>