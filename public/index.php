<?php
require('methods/db/connect.php');
require ('../lib/class/user.php');
require_once ('../lib/class/score.php');
?>


<?php
require ('template/header.php');
require ('template/form/login-form.php');
require ('template/form/signup-form.php');
?>

<div class="wrapper-template">
    <!--Main start-->
    <main>
        <!--Intro start-->-->
        <?php require ('template/intro.php');?>
        <!--Intro end-->
        <!--Content start-->
        <?php require ('methods/get/content.php');?>
        <!--Content start-->
    </main>
    <!--Main end-->

    <?php
    require ('template/footer.php');
    ?>
</div>