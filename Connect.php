<?php
require_once("Connection.php");
$host = "localhost"; //127.0.0.1
$dbname = "mysql";
$username = "root";
$password = "";
$unibc_ecom = "unibc_ecom";

$connect = new Connection($host, $dbname, $username, $password);
$pdo = $connect->getConnection();

// var_dump($pdo);

//Use try catch if create database
try {
    $create_databse = "CREATE DATABASE $unibc_ecom";
    $pdo->exec($create_databse);
    $pdo->exec("USE $unibc_ecom");
    $pdo->exec("CREATE TABLE unibc_users"); //create table in database
    $pdo->exec("");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!--create DATABSE PDO