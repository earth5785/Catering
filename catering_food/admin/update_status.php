<?php
session_start();
require("../connect.php");

// รับค่า CaterID และ status จาก request
$caterId = $_GET['caterId'];
$status = $_GET['status'];

// ดำเนินการอัปเดตข้อมูลในฐานข้อมูล
$query = "UPDATE caster SET StateCater='$status' WHERE CaterID='$caterId'";
$result = mysqli_query($link, $query);

// ตรวจสอบการดำเนินการอัปเดต
if ($result) {
    $_SESSION['statusMsg'] = "Status updated successfully.";
} else {
    $_SESSION['statusMsg'] = "Error updating status: " . mysqli_error($link);
}
header('Location: mainAdminEdit.php');

// ปิดการเชื่อมต่อกับฐานข้อมูล
mysqli_close($link);
?>
