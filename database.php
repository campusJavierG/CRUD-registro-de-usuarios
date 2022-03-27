<?php

$server='localhost';
$username='root';
$database='hito2CRUD';

try {
    //code...
    $conn= new PDO("mysql:host=$server;dbname=$database;","$username","");
} catch (PDOException $error) {//se capta el error de PDO y lo guardamos en la variable error
    die('Conexión fallida---> '.$error->getMessage());
}

?>