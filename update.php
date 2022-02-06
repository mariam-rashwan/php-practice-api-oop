
<?php

// var_dump($_GET);
require "connection.php";

function test_input($data){

   $data= trim($data);
   $data= stripslashes($data);
   $data= htmlspecialchars($data);
   return $data;

};
if(isset($_GET['id'])&&isset($_GET['full_name'])&&isset($_GET['username'])&&isset($_GET['email'])&&isset($_GET['birth_date'])&&isset($_GET['city'])){
 if(!empty($_GET['id'])&&!empty($_GET['full_name'])&&!empty($_GET['username'])&&!empty($_GET['email'])&&!empty($_GET['birth_date'])&&!empty($_GET['city'])){



    $id=$_GET['id'];
    $full_name= test_input($_GET['full_name']);
    $username= test_input($_GET['username']);
    $email= test_input($_GET['email']);
    $birth_date= test_input($_GET['birth_date']);
    $city= test_input($_GET['city']);

   $query=$connection->prepare("UPDATE users SET full_name=?,username=?,email=?,birth_date=?,city=?  WHERE id=?");
   $query->execute([$full_name,$username,$email,$birth_date,$city,$id]);

   header("Location:profile.php");
 
 }
}else{
   header("Location:profile.php");
}


?>


