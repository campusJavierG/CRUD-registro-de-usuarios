<?php
 
require_once('database.php');
if(!empty($_POST['email'])&& !empty($_POST['password'])){
    $consulta= $conn->prepare('SELECT id,email,password from users where email=:email');
    $consulta->bindParam(':email',$_POST['email']);
    $consulta->execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    $message='';
    if(is_countable($resultado)>0 && password_verify($_POST['password'],$resultado['password'])){//si la contraseña no esta vacía y la contraseña escrita es la misma a la de la base de datos
        setcookie('id',$resultado['id']);
        header('Location: index.php');
    }else{
        $message="Las credenciales no son correctas";
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
    <title>Login</title>
</head>
<body>
<?php
    require_once("partials/header.php")
?>
    <h1>Login or <span><a href="signup.php">SignUp</a></span></h1>

    <form action="login.php" method="post">
        <input type="text" name="email" id="" placeholder="Inserte su email"><br>
        <input type="password" name="password" id="" placeholder="Inserte su contraseña"><br>
        <input type="submit" value="enviar">
        <?php
            if(!empty($message)){
                echo "<p>$message</p>";
            }
        ?>

    </form>
</body>
</html>