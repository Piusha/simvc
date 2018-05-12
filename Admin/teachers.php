<?php include_once('../View/elements/admin_includes.php');?>

<?php
Model::import('TeacherModel');
$teacherOBJ = new TeacherModel();
$teachers = $teacherOBJ->getAllTeachers();
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
                     <th>Action</th>
                 </tr>

                <?php if(sizeof($teachers) > 0):?>
                        <?php foreach($teachers as $teacher) :?>
                                <tr>
                                    <td><?php echo $teacher['id']?></td>
                                    <td><?php echo $teacher['first_name']." ".$teacher['middle_name']." ". $teacher['last_name']?></td>
                                    <td><?php echo $teacher['email']?></td>
                                    <td><?php echo $teacher['address1'].",".$teacher['address2'].",".$teacher['city'].",".$teacher['state'].",".$teacher['zip']?></td>
                                    <td><?php echo $teacher['contact_number1']?></td>
                                    <td><?php echo $teacher['contact_number2']?></td>
                                    <td><?php echo $teacher['date_of_birth']?></td>
                                    <td><?php echo $teacher['date_of_joined']?></td>
                                    <td>
                                        <a href="<?php echo SITE_PATH?>/assign_classes/tid=<?php echo $teacher['id']?>">
                                            Assign Class
                                        </a>
                                    </td>
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