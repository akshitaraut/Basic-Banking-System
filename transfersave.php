<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banking";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sendid=$_POST['uid'];
$rece=$_POST['to'];
$user=$_POST['uname'];
$amt=$_POST['transferamt'];

$result1="update customer set balance=(balance-$amt) where id=$sendid";
$result2="update customer set balance=(balance+$amt) where name='$rece'";

if($conn->query($result1)===TRUE){
  if($conn->query($result2)===TRUE){
  $sql = "INSERT INTO transfers (id, sender, receiver, amount) VALUES ($sendid,'$user', '$rece', $amt)";

if ($conn->query($sql) === TRUE) {
    header('Location: success.html');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  }
}
else{
  echo "Error";
}

$conn->close();
?>