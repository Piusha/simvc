
<header>

    <?php  if(Sessions::hasSession("logged")):?>
            <ul class="clearfix">
                <?php if($loggedUser['role'] == 'admin'):?>
                    <li><a href="<?php echo SITE_PATH ?>/Admin/teachers">Teachers</a></li>
                    <li><a href="<?php echo SITE_PATH ?>/Admin/students">Students</a></li>
                    <li><a href="<?php echo SITE_PATH ?>/Admin/parents">Parents</a></li>
                    <li><a href="<?php echo SITE_PATH ?>/Admin/admin_users">Admin Users</a></li>
                    <li><a href="<?php echo SITE_PATH ?>/Admin/classes">Classes</a></li>
                    <li><a href="<?php echo SITE_PATH ?>/Admin/grades">Grades</a></li>
                    <li><a href="<?php echo SITE_PATH ?>/Admin/create_user">Users</a></li>
                <?php elseif($loggedUser['role'] == 'parent'):?>

                <?php elseif($loggedUser['role'] == 'teacher'):?>

                <?php elseif($loggedUser['role'] == 'student'):?>

                <?php endif;?>
            </ul>



    <?php else :?>
        Normal Header Links here

    <?php endif;?>



</header>