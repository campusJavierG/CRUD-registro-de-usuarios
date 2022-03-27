<?php

require_once('database.php');
if(isset($_COOKIE['id'])){
    $id=$_COOKIE['id'];
    $consulta= $conn->prepare('SELECT id,email,password from users where id=:id;');
    $consulta->bindParam(":id",$id);
    $consulta->execute();
    $resultado= $consulta->fetch(PDO::FETCH_ASSOC);

    $user=null;

    if(count($resultado)>0){
        $user=$resultado;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Mono:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>CRUD</title>
</head>
<body>
    <?php
    require_once("partials/header.php")
    ?>
    
    <?php if(!empty($user)){
        echo'Bienvenido: '.$user['email'].'<br>';
        echo'<br>Te has logeado correctamente <br>';
        echo'<a href="usuario.php">Ver información</a>';
        echo'<br><a href="logout.php">Logout</a>';



    }elseif(!empty($user)&& $user['id']=21){
        echo'Bienvenido: '.$user['email'].'<br>';
        echo'<br>Te has logeado correctamente <br>';
        echo'<a href="admin.php">Ver información como admin</a>';
        echo'<br><a href="admin.php">Ver información como admin</a>';
        echo'<br><a href="logout.php">Logout</a>';

    }
    
    
    ?>
   

   
    <h1>Login o SignUp</h1>
    <a href="login.php">Login</a> or <a href="signup.php">SignUp</a>
    

</body>
</html>