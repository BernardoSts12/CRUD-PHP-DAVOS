<?php 

$host = "localhost:3306";
$user = "root";
$pass = "panda222";
$dbname = "davos-tech";

//CONEXÃO
try{
    $conn = new PDO("mysql:host=$host;dbname=".$dbname, $user,$pass);
}catch(PDOException $e){
    echo $e->getMessage();
}

