<?php
session_start();
require("connect.php");
$username=$_POST["user"];
$password=$_POST["pass"];
$Fname=$_POST["Fname"];
$Lname=$_POST["Lname"];
$State="Customer";

$querycheck="select * from user where UserName='$username'";
$querycheck=mysqli_query($link,$querycheck);
$num=mysqli_num_rows($querycheck);
  if($num>=1){
    $_SESSION['statusMsg'] = "The information is already in the system. Please check again.";
    header('Location: SingUp.php');

  }else{
    $sqladd="insert into user ( UserID, UserName, Password, FirstName, LastName, StateUser) 
    values('', '$username', '$password', '$Fname', '$Lname', '$State')";
    $queryadd=mysqli_query($link,$sqladd);
    if (!$queryadd) {
      $_SESSION['statusMsg'] = "Member registration failed Please apply again.";
  } else {
      $_SESSION['statusMsg'] = "Successfully applied for membership";
  }
  }
  header('Location: SingUp.php');

?>