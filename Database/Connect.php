<?php
require_once("Connection.php");
$host = "localhost"; //127.0.0.1
$dbname = "mysql";
$username = "root";
$password = "";
$unibc_ecom = "unibc_ecom";

$connect = new Connection($host, $dbname, $username, $password);
$pdo = $connect->getConnection();

//Use try catch if create database
try {
    $create_database = "CREATE DATABASE IF NOT EXISTS $unibc_ecom";
    $pdo->exec($create_database);
    $pdo->exec("USE $unibc_ecom");
    
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<!-- Create PDO Database -->