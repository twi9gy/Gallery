<?php
require('../db/connect.php');

if (isset($_POST['Login']) && isset($_POST['Password'])) {
    $userlogin = $_POST['Login'];
    $userpassword = $_POST['Password'];

    if (!preg_match("/[a-zA-Z]/s", $userlogin)) {
        echo json_encode(array('success' => 2,'text' => "Недопустимый логин. Логин может состоять только из букв 
        анлийского алфавита."));
        exit();
    }

    if (!preg_match("/[a-zA-Z0-9]/s", $userlogin)) {
        echo json_encode(array('success' => 2,'text' => "Недопустимый пароль. 
        Пароль может состоять только из букв анлийского алфавита и цифр."));
        exit();
    }

    if (isset($connection)) {
        $prepared = $connection->prepare("SELECT * FROM users WHERE login_user = :login");
        $prepared->bindParam(':login', $userlogin);
        $prepared->setFetchMode(PDO::FETCH_CLASS, 'User');
        $prepared->execute();
        if ($prepared->rowCount() == 1) {
            $data = $prepared->fetch();
            if (password_verify($userpassword, $data["password_user"])) {
                $_SESSION['logged_id'] = $data["id_user"];
                echo json_encode(array('success' => 1));
            } else {
                $_SESSION['errors'] = "Неверно введен пароль.";
                echo json_encode(array('success' => 2,'text' => "Неверно введен пароль."));
                exit();
            }
        } else {
            echo json_encode(array('success' => 2 ,'text' => "Пользователь с таким логином не найден."));
            exit();
        }
    }
}