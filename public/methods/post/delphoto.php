<?php
require('../db/connect.php');
global $connection;

$prepared = $connection->prepare("SELECT * FROM photo AS P INNER JOIN scores AS S ON P.id_photo = S.id_photo
                                            WHERE S.id_photo = :id");
$prepared->bindParam(':id',$_POST['ID_photo']);
$result = $prepared->execute();
$data = $prepared->fetchAll();

if ($prepared->columnCount() > 0) {
    $prepared = $connection->prepare("DELETE FROM scores WHERE id_photo = :id");
    $prepared->bindParam(':id',$_POST['ID_photo']);
    $prepared->execute();
}

$prepared = $connection->prepare("DELETE FROM photo WHERE id_photo = :id");
$prepared->bindParam(':id',$_POST['ID_photo']);
$prepared->execute();
echo json_encode(array('success' => 1));