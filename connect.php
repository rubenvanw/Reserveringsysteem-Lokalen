<?php
$db_host = "localhost";
$db_username = "username";
$db_password = "password";
$db_database = "reserveringssysteem";

try{
    $database = new PDO("mysql:host={$db_host};dbname={$db_database}", $db_username, $db_password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connectie gelukt" . "<br/>";
    // $database = null;
} catch (PDOException $exception){
    // echo "connectie mislukt";
    print "Error!: " . $e->getMessage() . "<br/>";
    // die();
}