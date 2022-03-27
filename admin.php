<?php
require_once('database.php');
$id=$_COOKIE['id'];
$busqueda= $conn->prepare('SELECT * FROM users ');

$busqueda->execute();
$arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);
//Almacena los datos de la query en arrDatos

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Mono:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Información</title>
</head>
<body>



<table border="1.5px" align="center">
    <thead>
    <th>Foto</th>
    <th>ID</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Contraseña</th>
</thead>

<tbody>
    <?php

    foreach($arrDatos as $muestra){
        echo '<tr>';

        echo '<td >' . $muestra['photo'] . '</td>';
        echo '<td >' . $muestra['id'] . '</td>';
        echo '<td >' . $muestra['nombre'] . '</td>';
        echo '<td >' . $muestra['email'] . '</td>';
        echo '<td >' . $muestra['password'] . '</td>';

       
        echo ' </tr>';

    }     
        
    
   
    ?>


</tbody>
</table>
<a href="logout.php">Logout</a>
</body>
</html>