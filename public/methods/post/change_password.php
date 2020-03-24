<?php

require('../db/connect.php');
require ('../../../lib/class/user.php');
$userObj = new User();
$userinfo = $userObj->get_user($_SESSION['logged_id']);

if (isset($_POST['Password1']) && isset($_POST['Password2'])) {
    if (!password_verify($_POST['Password1'], $userinfo->password_user)) {
        if (!preg_match("/[a-zA-Z0-9]/s", $_POST['Password1'])) {
            echo json_encode(array('success' => 2, 'text' => "Недопустимый пароль. 
        Пароль может состоять только из букв анлийского алфавита и/или цифр."));
            exit();
        } else {
            if ($_POST['Password1'] != $_POST['Password2']) {
                echo json_encode(array('success' => 2, 'text' => "Пароли не совпадают."));
                exit();
            } else {
                $pass = password_hash($_POST['Password1'], PASSWORD_DEFAULT);
                $prepared = $connection->prepare("UPDATE users SET password_user = :password
                                                    WHERE login_user = :login");
                $prepared->bindParam(':password',$pass);
                $prepared->bindParam(':login',$userinfo->login_user);
                $result = $prepared->execute();
                if (isset($result))
                    echo json_encode(array('success' => 1));
                else
                    echo json_encode(array('success' => 2, 'text' => $userinfo->login_user));
            }
        }
    } else {
        echo json_encode(array('success' => 2, 'text' => "Новый и старый пароли должны отличаться."));
        exit();
    }
}