<?php
// เริ่ม Session
session_start();

// รีเซ็ตค่า UserID ของลูกค้า
$_SESSION['CustomerID'] = null;
$_SESSION['statusFormCaster'] = null; // กำหนดค่า session เป็น null เมื่อเพิ่มข้อมูลสำเร็จ


// สิ้นสุด Session
session_destroy();

// ลิ้งค์ไปยังหน้า login
header('Location: Index.php');
?>
