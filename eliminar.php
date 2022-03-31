<?php

require_once('partials/header.php');
require_once('database.php');

if($_COOKIE['id']<>21){
    $delete= $conn->prepare("DELETE FROM `users` WHERE `users`.`id` = :id");
    $delete->bindParam('id',$_COOKIE['id']);
    $delete->execute();
    header("Location: logout.php");
}else{
    header("Location: eliminarAdmin.php");
}
?>



