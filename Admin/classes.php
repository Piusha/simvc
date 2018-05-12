<?php include_once('../View/elements/admin_includes.php');?>
<?php
$error = NULL;
$data =  Request::data();
Model::import('GradeModel');
Model::import('TeacherModel');

$gradeOBJ = new GradeModel();
$grades = $gradeOBJ->getGrades();
$teacherOBJ = new TeacherModel();
$teachers = $teacherOBJ->getAllTeachers();
if(isset($data['btn_create_grade'])){
   if(isset($data['title'])){



       $gradeOBJ->save($data);

   }else{
       $error = "Grade Name cannot be blank";
   }

}

if(isset($data['btn_create_class'])){

    Model::import('ClassesModel');
    $classOBJ = new ClassesModel();
    $classOBJ->save($data);

}

?>




<?php include_once('../View/elements/header.php');?>



<?php include_once('../View/elements/main_navigation.php');?>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <h3>Grades</h3>
                <form name="frm_grads" id="frm_grads" action="<?php echo SITE_PATH?>/Admin/classes" method="POST">
                    <div class="form-group">
                        <label for="title">Grade Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" required="required">
                    </div>
                    <button type="submit" class="btn btn-default" name="btn_create_grade">Submit</button>
                </form>
            </div>


            <div class="row">
                <h3>Classes</h3>
                <form name="frm_classes" id="frm_classes" action="<?php echo SITE_PATH?>/Admin/classes" method="POST">
                    <div class="form-group">
                        <label for="parent_id">Grades </label>

                        <select class="form-control col-xs-2" name="grade_id">
                            <?php foreach($grades as $grade): ?>
                                <option value="<?php echo $grade['id']?>"><?php echo $grade['title']?></option>
                            <?php endforeach;?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="parent_id">Teachers </label>

                        <select class="form-control col-xs-2" name="teacher_id">
                            <?php foreach($teachers as $teacher): ?>
                                <option value="<?php echo $teacher['id']?>"><?php echo $teacher['first_name']. ' '. $teacher['last_name']?></option>
                            <?php endforeach;?>
                        </select>

                    </div>

                    <div class="form-group ">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default" name="btn_create_class">Submit</button>
                </form>
            </div>

        </div>
        <div class="col-md-4">.col-md-4</div>
    </div>
    <script src="<?php echo SITE_PATH ?>/Public/js/teachers.js"></script>


<?php include_once('../View/elements/footer.php');?>