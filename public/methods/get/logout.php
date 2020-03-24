<?php
    require('../db/connect.php');
    unset($_SESSION['logged_id']);
    header('Location: /');
