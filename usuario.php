<?php
require_once('partials/header.php');
require_once('database.php');
$id=$_COOKIE['id'];
$busqueda= $conn->prepare('SELECT * FROM users where id=:id');
$busqueda->bindParam(':id',$id);
$busqueda->execute();
$arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);
if($id==21){
    echo"<a href='admin.php'>Ver información como admin</a>";
}
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



<table border="1.5px" align="center" >
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

        echo '<td ><img width="120px" height="90px" src="' . $muestra['photo'] . '"></td>';
        echo '<td >' . $muestra['id'] . '</td>';
        echo '<td >' . $muestra['nombre'] . '</td>';
        echo '<td >' . $muestra['email'] . '</td>';
        echo '<td >' . $muestra['password'] . '</td>';

       
        echo ' </tr>';

    }     
        
    
   
    ?>
</tbody>
</table>
<br>

<a href="eliminar.php">Eliminar datos</a><br>
<a href="update.php">Update</a><br>
<a href="logout.php">Logout</a><br>


</body>
</html>