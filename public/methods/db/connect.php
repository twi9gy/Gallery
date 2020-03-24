<?php
session_start();
$path = "../config/parameters.ini";
while (!is_file($path)) {
    $path = "../".$path;
}
$ini_array = parse_ini_file($path, true);
try {
    $connection = new PDO("pgsql:host={$ini_array['db']['host']};user={$ini_array['db']['user']};
    password={$ini_array['db']['password']};dbname={$ini_array['db']['dbname']}");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}