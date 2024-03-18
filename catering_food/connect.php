<?php
$host="localhost";
$user="root";
$pass="";
$database="castering_food";

$link=mysqli_connect($host,$user,$pass,$database);
if(!$link){
    echo"Can't connaction MySQL";
    exit();
}
?>