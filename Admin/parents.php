<?php include_once('../View/elements/admin_includes.php');?>

<?php
Model::import('ParentModel');
$parentOBJ = new ParentModel();
$parents = $parentOBJ->getParents();
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
                    <th>Registered Date</th>
                </tr>

                <?php if(sizeof($parents) > 0):?>
                    <?php foreach($parents as $parent) :?>
                        <tr>
                            <td><?php echo $parent['id']?></td>
                            <td><?php echo $parent['first_name']." ".$parent['middle_name']." ". $parent['last_name']?></td>
                            <td><?php echo $parent['email']?></td>
                            <td><?php echo $parent['address1'].",".$parent['address2'].",".$parent['city'].",".$parent['state'].",".$parent['zip']?></td>
                            <td><?php echo $parent['contact_number1']?></td>
                            <td><?php echo $parent['contact_number2']?></td>

                            <td><?php echo $parent['registered_date']?></td>

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