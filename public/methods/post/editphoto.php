<?php
if (isset($_POST['Text_desc'])) {
    require('../db/connect.php');
    global $connection;
    $prepared = $connection->prepare("UPDATE photo SET description_photo = :descr WHERE id_photo = :id");
    $prepared->bindParam(':descr', $_POST['Text_desc']);
    $prepared->bindParam(':id',$_POST['ID_photo']);
    $result = $prepared->execute();
    echo json_encode(array('success' => 1));
}