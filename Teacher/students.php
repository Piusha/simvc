<?php include_once('../View/elements/teacher_includes.php');?>

<?php
Model::import('StudentModel');
$studentOBJ = new StudentModel();
$stdnts = $studentOBJ->getAllStudents();
$students = array();
if(isset($_GET['id'])){
    $classId = $_GET['id'];
    $students = $studentOBJ->getAllStudentsByClass($classId);

}

$data =  Request::data();
if(isset($data['btn_add_student'])){
    $data['class_room_id'] = $classId;
    $studentOBJ->addClassToStudent($data);
}



?>



<?php include_once('../View/elements/header.php');?>



<?php include_once('../View/elements/main_navigation.php');?>

    <div class="row">
        <h3>Add Student to Class</h3>
        <form name="frm_create_user" method="POST" action="<?php echo SITE_PATH ?>/Teacher/students?id=<?php echo $classId?>">
            <div class="form-group">
                <label for="role">User Role</label>
                <select class="form-control" name="studen_id" id="studen_id">
                    <?php foreach($stdnts as $std): ?>
                        <option value="<?php echo $std['id'] ?>"><?php echo $std['first_name']." ".$std['middle_name']." ". $std['last_name']?></option>
                    <?php endforeach;?>

                </select>

                <button type="submit" class="btn btn-default" name="btn_add_student">Submit</button>
            </div>
         </form>
    </div>
    <div class="row">
        <div class="col-md-8">
<h3>Students</h3>
            <table border="1">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact Number1</th>
                    <th>Contact Number2</th>
                    <th>Date of Birth</th>
                    <th>Date of Joined</th>


                </tr>

                <?php if($students):?>
                    <?php foreach($students as $student) :?>
                        <tr>
                            <td><?php echo $student['id']?></td>
                            <td><?php echo $student['first_name']." ".$student['middle_name']." ". $student['last_name']?></td>
                            <td><?php echo $student['email']?></td>
                            <td><?php echo $student['address1'].",".$student['address2'].",".$student['city'].",".$student['state'].",".$student['zip']?></td>
                            <td><?php echo $student['contact_number1']?></td>
                            <td><?php echo $student['contact_number2']?></td>
                            <td><?php echo $student['date_of_birth']?></td>
                            <td><?php echo $student['date_of_joined']?></td>


                        </tr>
                    <?php endforeach;?>
                <?php endif; ?>

                </thead>
            </table>



        </div>
        <div class="col-md-4">.col-md-4</div>
    </div>
    <script src="<?php echo SITE_PATH ?>/Public/js/teachers.js"></script>


<?php include_once('../View/elements/footer.php');?>