<?php

class User
{
    public $id_user;
    public $login_user;
    public $email_user;
    public $password_user;
    public $role_user;
    public $name_user;
    public $datebirth_user;
    public $gender_user;
    public $phone_user;
    public $city_user;

    public function get_user ($id)
    {
        global $connection;
        $prepared = $connection->prepare("SELECT * FROM users WHERE id_user = (:id)");
        $prepared->bindParam(':id',$id);
        $prepared->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $prepared->execute();
        $data = $prepared->fetch();
        return($data);
    }

    public function get_user_byLogin($login)
    {
        global $connection;
        $prepared = $connection->prepare("SELECT * FROM users WHERE login_user = (:login)");
        $prepared->bindParam(':login', $login);
        $prepared->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $prepared->execute();
        $data = $prepared->fetch();
        return($data);
    }
}