<?php

require_once('database.php');

$message='';

if(!empty($_POST['email'])&& !empty($_POST['password'] && !empty($_POST['password2']))){
    $sql="INSERT INTO users (nombre,email,password) values (:nombre,:email,:password) ";
    $stmt= $conn->prepare($sql);
    $stmt->bindParam(':nombre',$_POST['name']);
    $stmt->bindParam(':email',$_POST['email']);
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $stmt->bindParam(':password',$password);
    if($stmt->execute()){
        $message='Usuario creado correctamente';
    }else{
        $message="ha ocurrido un error con la contraseña";
    }
}
else{
    $message="Ha ocurrido un error, revisa que has rellenado todos los campos";
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
    <script src="script.js"></script>
    <title>SignUp</title>
    
</head>
<body>
<?php
    require_once("partials/header.php");
?>

<?php
    if(!empty($message)):
?>


<?php endif; ?>
    <h1>SignUp or <span><a href="login.php">Login</a></span></h1>
    <form action="signup.php" method="post">
       
        <input type="text" name="name" id="" placeholder="Inserte su nombre"><br>
        <input type="text" name="photo" id="" placeholder="Inserte la url de su foto"><br>
        <input type="text" name="email" id="" placeholder="Inserte su email"><br>
        <input type="password" name="password" id="" placeholder="Inserte su contraseña"><br>
        <input type="password" name="password2" id="" placeholder="Inserte de nuevo contraseña"><br>
        <span id="error2"></span>
        <p><?= $message ?></p>
        <input type="submit" value="enviar">
         
    </form>
</body>
</html>