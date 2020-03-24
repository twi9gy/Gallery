<?php

class Score
{
    public $id_score;
    public $id_photo;
    public $value_score;
    public $author_score;

    public function get_count($id_photo) {
        global $connection;
        $prepared = $connection->prepare("SELECT COUNT(*) FROM scores WHERE id_photo = (:id)");
        $prepared->bindParam(':id',$id_photo);
        $prepared->execute();
        $data = $prepared->fetch();
        echo $data['count'];
    }
}