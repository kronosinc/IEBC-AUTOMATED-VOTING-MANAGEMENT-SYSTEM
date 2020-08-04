<?php
$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];

$conn = mysqli_connect('localhost','root','');
mysqli_select_db('amvs_system',$conn);

mysqli_query("INSERT INTO logs ('username' , 'msg') VALUES ('$uname','$msg')");

$result1 = mysqli_query("SELECT * FROM logs ORDER by id DESC");

while($extract = mysqli_fetch_array($result1)){
  echo $extract['username'] . ": " . $extract['msg'] . "<br>";
}

 ?>
