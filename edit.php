<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET["id"])&&!empty($_GET['id'])){
    require "connection.php";
    $id=$_GET['id'];
    $query=$connection->prepare("Select * FROM users WHERE id=?");
    $query->execute([$id]);
    $user=$query->fetchAll(PDO::FETCH_ASSOC);?>
    <h3>Edit user: <?=$user[0]['full_name']?></h3>
    <form method="get" action="update.php">
    <input type="hidden" name="id" value="<?=$user[0]['id']?>">
        <label for="full_name">Full_Name</label>
        <input type="text" id="full_name" name="full_name" value="<?=$user[0]['full_name']?>"><br>
        <label for="username">username</label>
        <input type="text" id="username" name="username" value="<?=$user[0]['username']?>"><br>
        <label for="email">email</label>
        <input type="text" id="email" name="email" value="<?=$user[0]['email']?>"><br>
        <label for="birth_date">Birth_Date</label>
        <input type="date" id="birth_date" name="birth_date" value="<?=$user[0]['birth_date']?>">
        <br>
        <label for="city">city</label>
        <select id="city" name="city">
            <option value="alex"<?=($user[0]['city']=="alex")?"selected":"";?>>Alex</option>
            <option value="suz"<?=($user[0]['city']=="suz")?"selected":"";?>>Suz</option>
            <option value="cairo"<?=($user[0]['city']=="cairo")?"selected":"";?>>Cairo</option>
            <option value="sohag"<?=($user[0]['city']=="sohag")?"selected":"";?>>sohag</option>

        </select>
        <br>
        
        <input type="submit" value="Update">
    </form>
<?php }else{
    header("Location: profile.php");
}
?>

</body>
</html>