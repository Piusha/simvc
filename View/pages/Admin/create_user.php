<?php
?>
<div class="row">
    <div class="col-md-8">
        <form name="frm_create_user" method="POST" action="<?php echo SITE_PATH ?>/Admin/register">
            <div class="form-group">
                <label for="exampleInputEmail1">User Role</label>
                <select class="form-control" name="user_role">
                    <option value="parent">Parent</option>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" required="required">
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" placeholder="Password" name="middle_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" class="form-control" id="user_name" placeholder="First Name" name="user_name" required="required">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="middle_name" placeholder="Password" name="middle_name">
            </div>
            <div class="form-group">
                <label for="address1">Address 1</label>
                <input type="text" id="address1" name="address1">
            </div>

            <div class="form-group">
                <label for="address2">Address 2</label>
                <input type="text" id="address2" name="address2">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city">
            </div>

            <div class="form-group">
                <label for="city">State</label>
                <input type="text" id="state" name="state">
            </div>

            <div class="form-group">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip">
            </div>

            <div class="form-group">
                <label for="contact_number1">Contact Number 1</label>
                <input type="text" id="contact_number1" name="contact_number1">
            </div>

            <div class="form-group">
                <label for="contact_number2">Contact Number 2</label>
                <input type="text" id="contact_number2" name="contact_number2">
            </div>

            <div class="form-group ">
                <label for="date_of_birth">Contact Number 2</label>
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

            <div class="form-group">
                <label for="contact_number2">Contact Number 2</label>
                <input type="text" id="contact_number2" name="contact_number2">
            </div>

            <div class="form-group">
                <label for="contact_number2">Contact Number 2</label>
                <input type="text" id="contact_number2" name="contact_number2">
            </div>




            <button type="submit" class="btn btn-default">Submit</button>
        </form>



    </div>
    <div class="col-md-4">.col-md-4</div>
</div>
<script src="<?php echo SITE_PATH ?>/Public/js/administrator.php"></script>