<?php

require('../db/connect.php');
require ('../../../lib/class/user.php');

if (isset($connection)) {
    $SQL_query = "UPDATE users SET ";
    $first = 1;

    if (isset($_POST['Name_user']) && ($_POST['Name_user'] != "")) {
        if (preg_match("/[а-яА-Яa-zA-Z] [а-яА-Яa-zA-Z]/s", $_POST['Name_user'])){
            $SQL_query =  $SQL_query."name_user = :name ";
            $first = 0;
        } else {
            echo json_encode(array('success' => 2,'text' => "Недопустимое имя. Имя может состоять только из букв
             русского или анлийского алфавита и имеет формат [Имя] [Фамилия]."));
            exit();
        }
    }
    if (isset($_POST['DateBirth_user']) && ($_POST['DateBirth_user'] != "")) {
        if (!$first) {
            $SQL_query = $SQL_query.", ";
        } else
            $first = 0;
        if (preg_match("/\d{4}(-|\/)\d{2}(-|\/)\d{2}/", $_POST['DateBirth_user'])) {
            $SQL_query =  $SQL_query."datebirth_user = :dateBirth ";
        } else {
            echo json_encode(array('success' => 2,'text' => "Недопустимая дата. Дата имеет формат Год-Месяц-День."));
            exit();
        }
    }
    if (isset($_POST['Gender'])) {
        if (!$first) {
            $SQL_query = $SQL_query.", ";
        } else
            $first = 0;
        $SQL_query =  $SQL_query."gender_user = :gender ";
    }
    if (isset($_POST['Phone_user']) && ($_POST['Phone_user'] != "")) {
        if (!$first) {
            $SQL_query = $SQL_query.", ";
        } else
            $first = 0;
        if (preg_match("/\d{11}/", $_POST['Phone_user'])) {
            $SQL_query =  $SQL_query."phone_user = :phone ";
        } else {
            echo json_encode(array('success' => 2,'text' => "Недопустимый номер. Номер должен состоять из 11 цифр."));
            exit();
        }
    }
    if (isset($_POST['City_user']) && ($_POST['City_user'] != "")) {
        if (!$first) {
            $SQL_query = $SQL_query.", ";
        } else
            $first = 0;
        if (preg_match("/[а-яА-Я]/s", $_POST['City_user'])) {
            $SQL_query =  $SQL_query."city_user = :city ";
        } else {
            echo json_encode(array('success' => 2,'text' => "Недопустимое название города. Город может состоять 
            только из букв русского алфавита."));
            exit();
        }
    }

    $userObj = new User();
    $user = $userObj->get_user($_SESSION['logged_id']);
    $SQL_query = $SQL_query."WHERE login_user = :login";
    $query = $connection->prepare($SQL_query);
    if (isset($_POST['Name_user']) && ($_POST['Name_user'] != ""))
        $query->bindParam(':name',$_POST['Name_user']);
    if (isset($_POST['DateBirth_user']) && ($_POST['DateBirth_user'] != ""))
        $query->bindParam(':dateBirth',$_POST['DateBirth_user']);
    $query->bindParam(':gender',$_POST['Gender']);
    if (isset($_POST['Phone_user']) && ($_POST['Phone_user'] != ""))
        $query->bindParam(':phone',$_POST['Phone_user']);
    if (isset($_POST['City_user']) && ($_POST['City_user'] != ""))
        $query->bindParam(':city',$_POST['City_user']);
    $query->bindParam(':login',$user->login_user);
    $query->execute();

    echo json_encode(array('success' => 1));
}