
<?php
require("connect.php");
session_start();
// รับค่าจากฟอร์มโดยใช้ฟังก์ชัน mysqli_real_escape_string เพื่อเป็นการป้องกัน SQL injection
$username = mysqli_real_escape_string($link, $_POST["user"]);
$password = mysqli_real_escape_string($link, $_POST["pass"]);

// ใช้ parameterized query ในการทำ SQL query
$sqlcheck = "SELECT * FROM user WHERE UserName=? AND Password=?";
$stmt = mysqli_prepare($link, $sqlcheck);
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// ตรวจสอบผลลัพธ์
if (mysqli_num_rows($result) == 0) {
    $_SESSION['statusMsg'] = "The username and password are incorrect.";
    header('Location: login.php');
} else {

    // ดึงข้อมูลจากฐานข้อมูล
    $row = mysqli_fetch_assoc($result);
    $stateUser = $row['StateUser'];

    // ตรวจสอบค่า StateUser
    if ($stateUser == 'Customer') {      
        $_SESSION['loggedIn'] = true;
        $_SESSION['CustomerID'] = $row['UserID'];

        header('Location: Index2.php');
    } elseif ($stateUser == 'Admin') {
        header('Location: admin/mainAdminEdit.php');
    } else {
        echo "<br><br><br><center><h1>สถานะผู้ใช้ไม่ถูกต้อง</h1></center>";
    }
    exit();
}

// ปิด statement
mysqli_stmt_close($stmt);
// ปิดการเชื่อมต่อกับฐานข้อมูล
mysqli_close($link);
?>
