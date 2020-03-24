<?php
require('../db/connect.php');
require ('../../../lib/class/photo.php');
require ('../../../lib/class/score.php');

if (isset($connection)) {
    if (isset($_POST['Author_score'])) {
        $query = $connection->prepare("SELECT * FROM photo WHERE id_photo = :id");
        $query->bindParam(':id',$_POST['Id_photo_like']);
        $query->setFetchMode(PDO::FETCH_CLASS, 'Photo');
        $query->execute();
        $photo = $query->fetch();

        $prepared = $connection->prepare("SELECT * FROM photo AS P INNER JOIN scores AS S 
                                                    ON P.id_photo = S.id_photo
                                                    WHERE S.author_score = :author AND S.id_photo = :id");
        $prepared->bindParam(':author',$_POST['Author_score']);
        $prepared->bindParam(':id',$_POST['Id_photo_like']);
        $prepared->execute();
        $data = $prepared->fetchAll();

        if ($photo->author_photo != $_POST['Author_score']) {
            if ($prepared->rowCount() == 0) {
                $prepared = $connection->prepare("INSERT INTO scores (id_photo, value_score, author_score) 
                                                  VALUES(:id, :score, :autor)");
                $prepared->bindParam(':id',$_POST['Id_photo_like']);
                $prepared->bindParam(':score',$_POST['Score']);
                $prepared->bindParam(':autor',$_POST['Author_score']);
                $prepared->execute();

                $query = $connection->prepare("SELECT value_score FROM photo AS P INNER JOIN scores AS S 
                                                        ON P.id_photo = S.id_photo
                                                        WHERE S.id_photo = :id");
                $query->bindParam(':id',$_POST['Id_photo_like']);
                $query->execute();
                $scores = $query->fetchAll();

                $avg = $photo->avgscore_photo*(count($scores)-1)/count($scores);
                $avg += $scores[count($scores)-1]['value_score']/count($scores);
                $avg = round($avg, 2);
                $query = $connection->prepare("UPDATE photo SET avgscore_photo = :avg WHERE id_photo = :id");
                $query->bindParam(':avg',$avg);
                $query->bindParam(':id',$_POST['Id_photo_like']);
                $query->execute();
                echo json_encode(array('success' => 1));
            } else {
                echo json_encode(array('success' => 2,'text' => "Вы уже оценили эту фотографию."));
                exit();
            }
        } else {
            echo json_encode(array('success' => 2,'text' => "Вы не можете оценивать собственные фотографии."));
            exit();
        }
    }
} else {
    echo json_encode(array('success' => 2,'text' => "Ошибка подключения к базе данных."));
    exit();
}