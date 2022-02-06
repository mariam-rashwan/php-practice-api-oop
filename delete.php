<?php

 require "connection.php";

if(isset($_GET["id"])&&!empty($_GET['id'])){
   
    $id=$_GET['id'];
    $query=$connection->prepare("DELETE FROM users WHERE id=?");
    $query->execute([$id]);
    header("Location: profile.php");
}else{
    header("Location: profile.php");
}

?>