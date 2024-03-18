<?php
session_start();
require("connect.php");

if (isset($_POST['submit'])){

    if(isset($_SESSION['CustomerID'])) {
        if (isset($_POST['orderID'])){
            $casterID = $_POST['orderID'];
            $customerID = $_SESSION['CustomerID'];
            $Fname=$_POST["Fname"];
            $Lname=$_POST["Lname"];
            $Email=$_POST["email"];
            $Phone=$_POST["phone"];
            $Date=$_POST["date"];
            $NumPe=$_POST["numPeo"];
            $state="Pending";
     
                $insert = "UPDATE caster SET FirstName='$Fname', LastName='$Lname' , Email='$Email', Contact='$Phone', Date='$Date', PeopleNum='$NumPe', StateCater='$state', UserID='$customerID' WHERE caterID = $casterID";
                $queryadd = mysqli_query($link, $insert);
    
                if (!$queryadd) {
                    $_SESSION['statusMsg'] = "Error updating data, please try again.";
                } else {
                    $_SESSION['statusMsg'] = "Data has been updated successfully.";
                }
                header('Location: orderCus.php');
        }else{
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // เก็บข้อมูลจากฟอร์มในตัวแปร session
                $_SESSION['formData'] = array(
                    'Fname' => $_POST['Fname'],
                    'Lname' => $_POST['Lname'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'date' => $_POST['date'],
                    'numPeo' => $_POST['numPeo']
                );
                $_SESSION['statusMsg'] = "Data has been added successfully.";
                $_SESSION['statusFormCaster'] = "formcasterFinish"; // เพิ่มสถานะเมื่อเพิ่มข้อมูล Caster เสร็จสมบูรณ์ 
                header('Location: menu.php');
            }else{
                $_SESSION['statusMsg'] = "Error adding data, please try again.";
                header('Location: formCaster.php');
            }
        }
    }else{
        
        header('Location: login.php');
    }
    
}

?>
