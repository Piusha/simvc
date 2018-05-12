<?php include_once('../View/elements/admin_includes.php');?>
<?php


Model::import('ClassesModel');
$classOBJ = new ClassesModel();
$classes = $classOBJ->listClassesByTeacher($loggedUser['id']);

?>




<?php include_once('../View/elements/header.php');?>



<?php include_once('../View/elements/main_navigation.php');?>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <h3>Classes</h3>
                <table border="1">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Description</th>
                        <th>Grade</th>
                        <th>Action</th>
                    </tr>

                    <?php if(sizeof($classes) > 0):?>
                        <?php foreach($classes as $class) :?>
                            <tr>
                                <td><?php echo $class['id']?></td>
                                <td><?php echo $class['description']?></td>
                                <td><?php echo $class['title']?></td>
                                <td><a href="<?php echo SITE_PATH ?>/Teacher/students?id=<?php echo $class['id']?>">Add Students</a></td>

                            </tr>
                        <?php endforeach;?>
                    <?php endif; ?>

                    </thead>
                </table>

            </div>

        </div>
        <div class="col-md-4">.col-md-4</div>
    </div>
    <script src="<?php echo SITE_PATH ?>/Public/js/teachers.js"></script>


<?php include_once('../View/elements/footer.php');?>