<?php
session_start();
require("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Editer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <script src="mainScript.js" type="text/javascript" defer></script>
    <link rel="stylesheet" type="text/css" href="figmain.css">


    <script>
        // เรียกฟังก์ชันเมื่อมีการเปลี่ยนแปลงใน dropdown
        document.addEventListener("DOMContentLoaded", function () {
            // หา elements ของ dropdown
            var statusDropdowns = document.querySelectorAll('.status-select');

            // วนลูปทุก dropdown
            statusDropdowns.forEach(function (dropdown) {
                // เพิ่ม event listener เมื่อมีการเปลี่ยนแปลงใน dropdown
                dropdown.addEventListener('change', function () {
                    // ตรวจสอบสถานะที่ถูกเลือก
                    var selectedOption = dropdown.options[dropdown.selectedIndex].value;
                    // ตรวจสอบและเปลี่ยนสีของ dropdown ตามสถานะที่ถูกเลือก
                    switch (selectedOption) {
                        case 'Complete':
                            dropdown.style.backgroundColor = '#00FF00'; // 
                            break;
                        case 'Pending':
                            dropdown.style.backgroundColor = '#FFD700'; // 
                            break;
                        case 'Rejected':
                            dropdown.style.backgroundColor = '#FF0000';
                            break;
                        default:
                            dropdown.style.backgroundColor = ''; // 
                    }
                });
            });
        });

        function chkdel(){
        if(confirm(' Confirm again !!! ')){ 
            return true;
        }else{
            return false;
        }       
    }
    </script>

    <style>
        .delete-button .material-icons-outlined {
            color: red;
            /* เปลี่ยนเป็นสีที่ต้องการ */
        }
        .custom-button {
        background-color: #4CAF50; /* เปลี่ยนสีพื้นหลังปุ่ม */
        color: white; /* เปลี่ยนสีข้อความบนปุ่ม */
        padding: 10px 20px; /* เพิ่มช่องว่างรอบขอบปุ่ม */
        text-align: center; /* จัดข้อความให้อยู่ตรงกลางของปุ่ม */
        text-decoration: none; /* ลบการขีดเส้นใต้ข้อความ */
        display: inline-block; /* ทำให้ปุ่มมีขนาดที่พอดีกับข้อความ */
        border: none; /* ลบเส้นขอบของปุ่ม */
        border-radius: 5px; /* กำหนดมุมขอบของปุ่ม */
        cursor: pointer; /* เปลี่ยนเคอร์เซอร์เป็นรูปแบบของปุ่ม */
        margin: 10px
        }

        .custom-button:hover {
            background-color: #45a049; /* เปลี่ยนสีพื้นหลังปุ่มเมื่อเมาส์ผ่าน */
        }
    </style>

</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="mainAdminEdit.php">Home page</a>
                    <a class="nav-link active" href="formAddFood.php">Food</a>
                    <a class="nav-link active" href="formAddSetMenu.php">Menu Set</a>
                    <a class="nav-link active" href="formAddType.php">Type Food</a>
                </div>
            </div>
            <button class="custom-button">
            <a class="nav-link active" href="FormaddAdmin.php" style="color: inherit; text-decoration: none;">Add UserAdmin</a>
            </button>
            <a class="nav-link active" href="../logout.php">Log out</a>
        </div>
    </nav>
    
    <table class="figtable">
        <?php
            $query = "SELECT DISTINCT c.CaterID, c.FirstName, c.LastName, c.Email, c.Contact, c.Date, c.PeopleNum, c.StateCater
            LEFT JOIN foodlist fl ON c.CaterID = fl.CaterID
            GROUP BY c.CaterID;";

            $result = mysqli_query($link, $query);
            if (!$result) {
                echo "<br><br><h4>No information</h4>";
            }else{
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<div>Name: {$data['FirstName']}&nbsp;&nbsp;&nbsp;&nbsp;{$data['LastName']}
                    <a href='deleteFormcus.php?orderID={$data['CaterID']}' onclick='return chkdel();' style='float: right;' class='delete-button'><span class='material-icons-outlined'>delete</span></a>
                    </div>";
                    echo "Email : {$data['Email']}</br>";
                    echo "Contact : {$data['Contact']}</br>";
                    echo "Date : {$data['Date']}</br>";
                    echo "Number of people : {$data['PeopleNum']}</br>";
        
        
                    // Check if there are food items for this caster
                        echo "<br><div>Selected Foods:</div>";
                        echo "<table class='figtable1'>";
                        echo "<td>No.</td>";
                        echo "<td> </td>";
                        echo "<td>Food Name</td>";
                        $i = 1;
                        $foodQuery = "SELECT f.FoodName, f.Image 
                                        FROM food f 
                                        INNER JOIN foodlist fl ON f.FoodID = fl.FoodID 
                                        WHERE fl.CaterID = {$data['CaterID']}";
                        $foodResult = mysqli_query($link, $foodQuery);
                        while ($foodData = mysqli_fetch_assoc($foodResult)) {
                          
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>";
                            echo "<img src='image/{$foodData['Image']}' alt='{$foodData['FoodName']}' width='100'>";
                            echo "</td>";
                            echo "<td>";
                            echo "<div>{$foodData['FoodName']}</div>";
                            echo "</td>";
                            echo "</tr>";
                    
                            $i = $i + 1;
                        }
                        echo "</table>";
                    
                    
                    echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Status";
                            
                    // สร้างตัวแปรสำหรับเก็บสีของ dropdown
                    $selectColor = '';
                    // ตรวจสอบค่าของ $data['StateCater'] เพื่อกำหนดสีของ dropdown
                    switch ($data['StateCater']) {
                        case 'Complete':
                            $selectColor = '#00FF00'; // สีเขียว
                            break;
                        case 'Pending':
                            $selectColor = '#FFD700'; // สีทอง
                            break;
                        case 'Rejected':
                            $selectColor = '#FF0000'; // สีแดงอมเนื้อ
                            break;
                        default:
                            $selectColor = ''; // ไม่มีสี
                            break;
                    }
                    echo "<br>";
                    echo "<br>";
                    // เริ่มต้นทำ select เพื่อเลือก status
                    echo "<select name='status' class='form-select status-select' style='background-color: $selectColor;'>";
                    // เพิ่มตัวเลือกสำหรับ dropdown
                    echo "<option value='Rejected' data-cater-id='{$data['CaterID']}' " . ($data['StateCater'] == "Rejected" ? "selected" : "") . ">Rejected</option>";
                    echo "<option value='Pending' data-cater-id='{$data['CaterID']}' " . ($data['StateCater'] == "Pending" ? "selected" : "") . ">Pending</option>";
                    echo "<option value='Complete' data-cater-id='{$data['CaterID']}' " . ($data['StateCater'] == "Complete" ? "selected" : "") . ">Complete</option>";
                    // ปิด dropdown
                    echo "</select>";
                    echo "========================================================================";
                    echo "</td>";
                    echo "</tr>";
                    }
        
            }
        ?>
    </table>


    <?php require("../smgAlert.php"); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</body>

</html>