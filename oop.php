<?php

class Database{

private $connection=null;

public function connect(){
$this->connection=new PDO('mysql:dbname=itidb;host=localhost','root',' ');
}
public function select($table_name){
$query=$this->connection->prepare("Select * FROM $table_name");
$query->execute();

var_dump($query->fetchAll());
}

public function insert($table_name,$full_name,$username,$email){
$query=$this->connection->prepare("INSERT INTO $table_name (full_name,username,email) VALUES (?,?,?)");
$query->execute([$full_name,$username,$email]);
}

public function update($table_name,$full_name,$username,$email,$id){
$query=$this->connection->prepare("UPDATE $table_name SET full_name=?,username=?,email=? WHERE id=$id");
$query->execute([$full_name,$username,$email]);
}

public function delete($table_name,$id){
$query=$this->connection->prepare("DELETE FROM $table_name WHERE id=$id");
$query->execute();
}
}

$test= new Database();
$test->connect('localhost','itidb','root',' ');
// echo $test->select("users");
// echo $test->insert("users","mariamhesham","mariama","mariam@gmail.com");
$test->update("users","aliali","ali2","ali@mail.com",8);
$test->delete("users",12);
// echo $test->select("users");
?>