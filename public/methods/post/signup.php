<?php
require('../db/connect.php');

if (isset($_POST['Login'])) {

    if (!preg_match("/[a-zA-Z]/s", $_POST['Login'])) {
        echo json_encode(array('success' => 2,'text' => "Недопустимый логин. Логин может состоять только из букв 
        анлийского алфавита."));
        exit();
    }

    if (!preg_match("/.+@.+\..+/i", $_POST['Email'])) {
        echo json_encode(array('success' => 2,'text' => "Недопустимый Email."));
        exit();
    }

    if (!preg_match("/[a-zA-Z0-9]/s", $_POST['Password'])) {
        echo json_encode(array('success' => 2,'text' => "Недопустимый пароль. 
        Пароль может состоять только из букв анлийского алфавита и цифр."));
        exit();
    }

    if (!preg_match("/[a-zA-Z0-9]/s", $_POST['Password2'])) {
        echo json_encode(array('success' => 2,'text' => "Недопустимый повторный пароль. 
        Пароль может состоять только из букв анлийского алфавита и цифр."));
        exit();
    }

    if (strlen($_POST['login']) > 3 && strlen($_POST['login']) < 150) {
        echo json_encode(array('success' => 2,'text' => "Логин должен быть не меньше 3-х символов
         и не больше 150.\";"));
        exit();
    }

    if (trim($_POST['Password']) != trim($_POST['Password2'])) {
        echo json_encode(array('success' => 2,'text' => "Пароли не совпадают."));
        exit();
    }

    if (trim($_POST['Agree']) == "2") {
        echo json_encode(array('success' => 2,'text' => "Согсаситесь с обработкой персональных данных."));
        exit();
    }

    $prepared = $connection->prepare("SELECT * FROM users WHERE login_user = :id");
    $prepared->bindParam(':id',$_POST['Login']);
    $prepared->setFetchMode(PDO::FETCH_CLASS, 'Users');
    $result = $prepared->execute();

    if ($prepared->rowCount() > 0) {
        echo json_encode(array('success' => 2,'text' => "Пользователь с таким логином уже существует."));
        exit();
    }

    if (count($errors) == 0) {
        $pass = password_hash($_POST['Password'], PASSWORD_DEFAULT);
        $prepared = $connection->prepare("INSERT INTO users (login_user, email_user, password_user)
                                                    VALUES(:login, :email, :pas)");
        $prepared->bindParam(':login',$_POST['Login']);
        $prepared->bindParam(':email',$_POST['Email']);
        $prepared->bindParam(':pas',$pass);
        $result = $prepared->execute();
        if (isset($result)) {
            echo json_encode(array('success' => 1));
        }
    }
}