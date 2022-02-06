<?php
try{
    $connection=new PDO('mysql:dbname=itidb;host=localhost','root','');
}
catch(PDOException $exception){
    echo $exception->getMessage();
}