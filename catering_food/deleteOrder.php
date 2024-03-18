<?php
session_start();
require("connect.php");

if (isset($_GET["orderID"])) {
    $orderID = $_GET["orderID"];

 
        $query = "DELETE FROM caster WHERE caterID='$orderID' ";
        $result = mysqli_query($link, $query);

        if (!$result) {
            $_SESSION['statusMsg'] = "Unable to delete data.";
        } else {
            $_SESSION['statusMsg'] = "Data has been successfully deleted.";
        }
} 
header("location: orderCus.php");
?>