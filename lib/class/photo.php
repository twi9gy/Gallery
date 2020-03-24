<?php
class Photo
{
    public $id_photo;
    public $id_user;
    public $src_photo;
    public $description_photo;
    public $author_photo;
    public $date_photo;
    public $avgscore_photo;
    public $avatarprofile_photo;

    public function upload($userinfo, $full_path)
    {
        global $connection;
        $prepared = $connection->prepare("INSERT INTO photo 
                                (id_user, src_photo, author_photo, description_photo, date_photo, avatarprofile_photo) 
                                VALUES(:id, :path, :login, :description, '" .date("Y-m-d"). "' , false)");
        $prepared->bindParam(':id',$userinfo->id_user);
        $prepared->bindParam(':path',$full_path);
        $prepared->bindParam(':login',$userinfo->login_user);
        $prepared->bindParam(':description',$_POST['Desc']);
        $prepared->execute();
    }

    public function get_photos()
    {
        global $connection;
        $prepared = $connection->prepare("SELECT * FROM photo ORDER BY date_photo DESC LIMIT 21");
        $prepared->setFetchMode(PDO::FETCH_CLASS, 'Photo');
        $prepared->execute();
        $data = $prepared->fetchAll();
        return($data);
    }

    public function get_user_photo($id)
    {
        global $connection;
        $prepared = $connection->prepare("SELECT * FROM photo WHERE id_user = (:id) ORDER BY date_photo DESC");
        $prepared->bindParam(':id', $id);
        $prepared->setFetchMode(PDO::FETCH_CLASS, 'Photo');
        $prepared->execute();
        $data = $prepared->fetchAll();
        return($data);
    }

    public function get_avatar($id){
        global $connection;
        $prepared = $connection->prepare("SELECT * FROM photo WHERE id_user = (:id) AND 
                                        avatarprofile_photo = true");
        $prepared->bindParam(':id', $id);
        $prepared->setFetchMode(PDO::FETCH_CLASS, 'Photo');
        $prepared->execute();
        $data = $prepared->fetch();
        return $data;
    }
}