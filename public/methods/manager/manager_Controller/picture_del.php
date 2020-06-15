<?php
require('../../db/connect.php');
require('../../../../lib/class/picture.php');
$pictureObj = new Picture();
var_dump($_POST);
/*
$res = $pictureObj->Picture_Delete($_POST['id_picture']);
if ($res)
    echo json_encode(array('success' => 1));
else
    echo json_encode(array('success' => 2,'text' => "Операция не выполнилась"));
