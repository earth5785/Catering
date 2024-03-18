<?php
session_start();
require("connect.php");

if($_SESSION['statusFormCaster'] === "formcasterFinish") {
    echo "<script>console.log('Hello, World!');</script>";

    if(isset($_POST['selectedFoodIDs']) && !empty($_POST['selectedFoodIDs'])) {
        // ดึงข้อมูลจาก session
        $formData = $_SESSION['formData'];
        
        // เรียกใช้ข้อมูลตามต้องการ
        $Fname = $formData['Fname'];
        $Lname = $formData['Lname'];
        $email = $formData['email'];
        $phone = $formData['phone'];
        $date = $formData['date'];
        $numPeo = $formData['numPeo'];
        $state = "Pending";
        $customerID = $_SESSION['CustomerID'];
        
        // ตรวจสอบว่ามีการเลือกรายการอาหารหรือไม่
        $selectedFoodIDs = json_decode($_POST['selectedFoodIDs'], true);
        if(empty($selectedFoodIDs)) {
            // หากไม่มีการเลือกรายการอาหาร
            $_SESSION['statusMsg'] = "Please select at least one food item.";
            header('Location: menu.php');
            exit;
        }
        
        // เพิ่มข้อมูลลงในตาราง caster
        $insertCater = "INSERT INTO caster (FirstName, LastName, Email, Contact, Date, PeopleNum, StateCater, UserID) VALUES ('$Fname', '$Lname', ' $email', '$phone', '$date', '$numPeo', '$state', '$customerID')";
        $queryadd = mysqli_query($link, $insertCater);
        
        if(!$queryadd) {
            $_SESSION['statusMsg'] = "An error occurred adding data to the database. please try again.";
            header('Location: formCaster.php');
            exit;
        }

        $_SESSION['formData'] = null;
        
        // ดึง CasterID ล่าสุดจากตาราง caster
        $getCaterIDQuery = "SELECT CaterID FROM caster WHERE UserID = $customerID ORDER BY CaterID DESC LIMIT 1";
        $getCaterIDResult = mysqli_query($link, $getCaterIDQuery);
        $row = mysqli_fetch_assoc($getCaterIDResult);
        $CaterID = $row['CaterID'];

        // วนลูปเพื่อเพิ่มข้อมูลลงในตาราง foodlist
        foreach($selectedFoodIDs as $foodID) {
            $insertFoodList = "INSERT IGNORE INTO foodlist (CaterID, FoodID) VALUES ('$CaterID', '$foodID')";
            $resultInsert = mysqli_query($link, $insertFoodList);
            
            if(!$resultInsert) {
                $_SESSION['statusMsg'] = "Error adding food list. Please try again.";
                header('Location: menu.php');
                exit;
            }
        }

        // หลังจากเพิ่มข้อมูลเรียบร้อยแล้ว
        $_SESSION['statusMsg'] = "Food list has been added successfully.";
        $_SESSION['statusFormCaster'] = null;
        header('Location: menu.php');
        exit;
    } else {
        // หากไม่มีการเลือกรายการอาหาร
        $_SESSION['statusMsg'] = "Please select at least one food item.";
        header('Location: menu.php');
        exit;
    }
} else {
    // หากไม่ได้กรอกข้อมูล formcaster
    $_SESSION['statusMsg'] = "Please fill out food catering information.";
    header('Location: formCaster.php');
    exit;
}



?>
