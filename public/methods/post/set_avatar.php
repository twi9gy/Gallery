<?php
require('../db/connect.php');

$prepared = $connection->prepare("SELECT * FROM photo WHERE id_user = :id AND avatarprofile_photo = true");
$prepared->bindParam(':id',$_SESSION['logged_id']);
$prepared->execute();
if ($prepared->columnCount() > 0) {
    $prepared = $connection->prepare("UPDATE photo SET avatarprofile_photo = false WHERE id_user = :id");
    $prepared->bindParam(':id',$_SESSION['logged_id']);
    $prepared->execute();
}

$prepared = $connection->prepare("UPDATE photo SET avatarprofile_photo = true WHERE id_photo = :id");
$prepared->bindParam(':id',$_POST['Id_photo']);
$prepared->execute();

header("Location: /methods/get/private_office.php");