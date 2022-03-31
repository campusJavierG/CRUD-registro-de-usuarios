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
    <title>Update</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Mono:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<h2>Update</h2>
<body>
    <form action="#" method="post">
        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="contraseña">
        <input type="text" name="photo" placeholder="foto">
        
 
<?php

    $id=$_COOKIE['id'];
    if($id<>21){
    if(!empty($_POST['nombre'])){
        $nombre=$_POST['nombre'];
        $update= $conn->prepare("UPDATE `users` SET `nombre` =:nombre WHERE `users`.`id` = :id;");
        $update->bindParam('id',$id);
        $update->bindParam('nombre',$nombre);
        $update->execute();

    }
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
        $update= $conn->prepare("UPDATE `users` SET `email` =:email WHERE `users`.`id` = :id;");
        $update->bindParam('id',$id);
        $update->bindParam('email',$email);
        $update->execute();
        
    }
    if(!empty($_POST['password'])){
        $contraseña=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $update= $conn->prepare("UPDATE `users` SET `password` =:contra WHERE `users`.`id` = :id;");
        $update->bindParam('id',$id);
        $update->bindParam('contra',$contraseña);
        $update->execute();

    }
    if(!empty($_POST['photo'])){
        $foto=$_POST['photo'];
        $update= $conn->prepare("UPDATE `users` SET `photo` =:photo WHERE `users`.`id` = :id;");
        $update->bindParam('id',$id);
        $update->bindParam('photo',$foto);
        $update->execute();

    }

}else if($id=21){
    $message='<input type="number" name="updateID" placeholder="ID">';
    if(!empty($_POST['updateID'])){
    $id=$_POST['updateID'];
    }
    
    if(!empty($_POST['nombre'])){
        $nombre=$_POST['nombre'];
        $update= $conn->prepare("UPDATE `users` SET `nombre` =:nombre WHERE `users`.`id` = :id;");
        $update->bindParam('id',$id);
        $update->bindParam('nombre',$nombre);
        $update->execute();

    }
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
        $update= $conn->prepare("UPDATE `users` SET `email` =:email WHERE `users`.`id` = :id;");
        $update->bindParam('id',$id);
        $update->bindParam('email',$email);
        $update->execute();
        
    }
    if(!empty($_POST['password'])){
        $contraseña=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $update= $conn->prepare("UPDATE `users` SET `password` =:contra WHERE `users`.`id` = :id;");
        $update->bindParam('id',$id);
        $update->bindParam('contra',$contraseña);
        $update->execute();

    }
    if(!empty($_POST['photo'])){
        $foto=$_POST['photo'];
        $update= $conn->prepare("UPDATE `users` SET `photo` =:photo WHERE `users`.`id` = :id;");
        $update->bindParam('id',$id);
        $update->bindParam('photo',$foto);
        $update->execute();

    }
}

?>
<p><?= $message ?></p>
<input type="submit" value="Update">
</form>
</body>
</html>