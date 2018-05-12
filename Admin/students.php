<?php include_once('../View/elements/admin_includes.php');?>

<?php
Model::import('StudentModel');
$studentOBJ = new StudentModel();
$students = $studentOBJ->getAllStudents();
?>



<?php include_once('../View/elements/header.php');?>



<?php include_once('../View/elements/main_navigation.php');?>
    <div class="row">
        <div class="col-md-8">

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
                    <th>Parent Name</th>

                </tr>

                <?php if(sizeof($students) > 0):?>
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
                            <td><?php echo $student['pfirst_name']." ".$student['pmiddle_name']." ". $student['plast_name']?>d</td>

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