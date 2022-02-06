

<?php

include "connection.php";


function test_input($data){

    $data= trim($data);
    $data= stripslashes($data);
    $data= htmlspecialchars($data);



    return $data;

};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form method="get" action= "<?= htmlspecialchars($_SERVER['PHP_SELF'])?>">

<input type="text" id="id" name="id" hidden >

<label for="full_name">Full name </label>
    <input type="text" id="full_name" name="full_name">
    
  <?php

if(isset($_GET['full_name'])){
    $full_name=test_input($_GET['full_name']);

    if(empty($_GET['full_name'])){
     echo $error='<span style="color:red;"> Please Fill your Name</span>';
    }else{

        $full_name=test_input($_GET['full_name']);
        if (!preg_match("/^[a-z]+$/", $full_name)) {
            echo '<span style="color:orange;"> Please Do not use capital letters spaces or dashes.</span>';
        }else{
            echo " ";
        }

    }
}


?> 

    
    <br><br>

    <label for="username">Username </label>
    <input type="text" id="username" name="username">
    
   <?php 
    if(isset($_GET['username'])){
    $username= test_input($_GET['username']);
    if(empty($_GET['username'])){
     echo   $error='<span style="color:red;"> Please Fill your username</span>';
    }else{

        $username=test_input($_GET['username']);
        if (!preg_match("/^[a-z]+$/", $username)) {
            echo '<span style="color:orange;"> Please Do not use capital letters</span>';
        }else{
            echo " ";
        }
    }
}
 ?>
    <br><br>

    <label for="password">Password </label>
    <input type="password" id="password" name="password">

    <label for="confpassword">Confirm Password </label>
    <input type="password" id="confpassword" name="confpassword">
 
    <?php 
    if(isset($_GET['password'])){
        $password=test_input($_GET['password']);
    if(empty($_GET['password'])){
     echo   $error='<span style="color:red;"> Please Fill your password</span>';
    }}
    if(isset($_GET['confpassword'])){
        $confpassword=test_input($_GET['confpassword']);
        $password=test_input($_GET['password']);
            if($confpassword == $password){
                echo " ";
                }else{
                echo '<span style="color:orange;"> Please check again, not the same password! </span>';
                }
                
    if(empty($_GET['confpassword'])){
     echo  '<span style="color:red;"> and confirm password</span>';
    }}

?> 
    <br><br>


    <label for="email">Email  </label>
    <input type="text" id="email" name="email">
    
    <?php


if(isset($_GET['email'])){
    $email=test_input($_GET['email']);
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $checkEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
        $correctEmail=filter_var($checkEmail,FILTER_SANITIZE_EMAIL);
        echo  '<span style="color:green;"> the mail is valid </span>';
    }else{
        echo '<span style="color:red;"> the mail is not valid </span>';
    }
  
}

?> 

    
    <br><br>


    <label for="birthdate">Birth Date </label>
    <input type="date" id="birthdate" name="birthdate">
<?php
    if(isset($_GET['birthdate'])){
        $birthdate=$_GET['birthdate'];
    if(empty($_GET['birthdate'])){
     echo   $error='<span style="color:red;"> Please Fill your birthdate</span>';
    }
}
    ?>
    <br><br>

    <label for="city">City  </label>
    <select id="city" name="city">
        <option value="Alex" >Alex</option>
        <option value="cairo">Cairo</option>
        <option value="suz">Suz</option>
        <option value="sohag">sohag</option>

    </select>

    <?php
    if(isset($_GET['city'])){
        $city=$_GET['city'];
   if(empty($_GET['city'])){
    echo  $error='<span style="color:red;"> Please Fill your city</span>';
   }
}
    ?>
    <br><br>
    
    <input type="submit" value="Register">
</form>


<?php


if(isset($_GET['full_name'])&&isset($_GET['username'])&&isset($_GET['password'])&&isset($_GET['email'])&&isset($_GET['birthdate'])
&&isset($_GET['city'])){
    $full_name= test_input($_GET['full_name']);
    $username= test_input($_GET['username']);
    $password= test_input($_GET['password']);
    $encryptPassword= md5($password);
    $email= test_input($_GET['email']);
    $birthdate= test_input($_GET['birthdate']);
    $city= test_input($_GET['city']);


    if(!empty($full_name)&&!empty($username)&&!empty($password)&&!empty($email)&&!empty($birthdate)&&!empty($city)){
        require "connection.php";
        $query=$connection->prepare("INSERT INTO users(full_name,username,password,email,birth_date,city)VALUES(?,?,?,?,?,?)");
        $query->execute([$full_name,$username,$encryptPassword,$email,$birthdate,$city]);
        header("Location: profile.php");
    }else{
        // echo "<h1> you entered empty values </h1>";
    }
}



?>




</body>
</html>