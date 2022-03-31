<?php
require_once('partials/header.php');
require_once('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Mono:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Eliminar</h2>
    <form action="#" method="post">
        <input type="number" name="deleteID" id="">
        <input type="submit" value="Eliminar">
    </form>
</body>
<?php

    if(isset($_POST['deleteID'])){
        $delete= $conn->prepare("DELETE FROM `users` WHERE `users`.`id` = :id");
        $delete->bindParam('id',$_POST['deleteID']);
        $delete->execute();
        
    }

?>
<a href="logout.php">Logout</a>
</html>

