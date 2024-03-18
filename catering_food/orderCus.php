<?php
session_start();
require("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Google Fonts Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="configProfile.css">
    <link rel="stylesheet" type="text/css" href="NavST.css">
    <link rel="stylesheet" type="text/css" href="BG_body.css">


    <script src="configCaster.js" type="text/javascript" defer></script>

    <style>

        .moved-element {
            margin-left: 100px;
            /* ขยับไปทางขวา 50px */
        }

        .moved {
            margin-left: 50px;
        }

        #formUpdate {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            display: none;
            background-color: rgb(241, 228, 181);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Change background color here */
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 52%; 

        }

        .table-custom {
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: 0 auto;
            background-color: #FFFFE0;
            border-collapse: collapse;
        }

        .table-custom th,
        .table-custom td {
            padding: 8px;
            /* การระบุระยะห่างระหว่างขอบและเนื้อหาของเซลล์ */
        }

        .table-custom th {
            background-color: #333;
            /* สีพื้นหลังสำหรับส่วนหัวตาราง */
            color: white;
            /* สีข้อความในส่วนหัวตาราง */
        }

        .custom-table {
            background-color: #DEB887;
            text-align: center;
            width: 119.5%;
            /* กำหนดความกว้างของตารางให้เต็มระบบ */
            height: auto;
            /* กำหนดความสูงของตารางให้พอดีกับเนื้อหาภายใน */
            margin: auto;
            /* กำหนดความสูงของตารางให้พอดีกับเนื้อหาภายใน */
            border-radius: 10px;
            /* เพิ่มขอบโค้ง */
        }

        .custom-table th,
        .custom-table td {
            padding: 10px;
            /* กำหนดระยะห่างของขอบเซลล์ */

        }
        .delete-button .material-icons-outlined {
            color: red;
            /* เปลี่ยนเป็นสีที่ต้องการ */
        }
    </style>


</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
        <a class="logo" href="index2.php">
        <img src="logo/logo.png" alt="Catering Logo" width="60px">
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index2.php">Home</a>
                    <a class="nav-link active" href="formCaster.php">Form Catering</a>
                    <a class="nav-link active" href="menu.php">Menu</a>
                    <a class="nav-link active" href="about_us.php">About Us</a>
                </div>
            </div>
            <div> 
                <?php 
                $customerID = $_SESSION['CustomerID'];
                $query = "SELECT FirstName, LastName FROM user WHERE UserID = $customerID";
                $result = mysqli_query($link, $query);
                $data = mysqli_fetch_assoc($result);
                echo "<h6>{$data['FirstName']}&nbsp;&nbsp;{$data['LastName']}</h6>";
                ?>
            </div>
            <div class="btn-group">
                <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="images2/profile.png" class="profile" alt="Profile image">
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="orderCus.php">
                            <span class="material-icons-outlined">format_list_bulleted</span>
                            <p>My Orders</p>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="logout.php">
                            <span class="material-icons-outlined">logout</span>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <script src="order.js" type="text/javascript" defer></script>

    <form action="addFormCaster.php" id="formUpdate" name="update" method="POST" enctype="multipart/form-data"
        onsubmit="return Checkform();">
        <credit-card>
            <input type="hidden" name="orderID" id="editorderID" value="">
            <table>
                <tr>
                    <td>First Name :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"
                            name="Fname"></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Name : <input type="text" name="Lname"></td>
                </tr>
                <tr>
                    <td>Email :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                            type="email" name="email" size="30"></td>
                </tr>
                <tr>
                    <td>Contact :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                            type="tel" name="phone" pattern="[0-9]{10}" placeholder="Enter phone number" required></td>
                </tr>
                <tr>
                    <td>Dete of event : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" required></td>
                </tr>
                <tr>
                    <td>How many people? : <input type="number" name="numPeo"
                            oninput="this.value = Math.abs(this.value)" min="1"></td>
                </tr>
                <td colspan="2" align="center" height="100px">
                    <input type="submit" name="submit" value="Save" class="btn btn-sm btn-primary mb-3"
                        style="width: 70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" id="closeFormCardBtn2" value="Cancel" class="btn btn-sm btn-primary mb-3"
                        style="width: 70px;">
                </td>
                </tr>
            </table>
        </credit-card>
    </form>

    <?php require("smgAlert.php"); ?>
    <br><br>

    <table class="table-custom">
        <?php
        $customerID = $_SESSION['CustomerID'];
        $query = "SELECT DISTINCT c.UserID, c.CaterID, c.FirstName, c.LastName, c.Email, c.Contact, c.Date, c.PeopleNum, c.StateCater
                    FROM caster c
                    LEFT JOIN foodlist fl ON c.CaterID = fl.CaterID
                    WHERE c.UserID = $customerID
                    GROUP BY c.CaterID;";

        $result = mysqli_query($link, $query);
        if (!$result) {
            echo "<br><br><h4>No information</h4>";
        }else{
            while ($data = mysqli_fetch_assoc($result)) {
 
                echo "<tr>";
                echo "<td>";
                echo "<div>Name : {$data['FirstName']}&nbsp;&nbsp;&nbsp;&nbsp;{$data['LastName']}</br>";
                echo "Email : {$data['Email']}</br>";
                echo "Contact : {$data['Contact']}</br>";
                echo "Date : {$data['Date']}</br>";
                echo "Number of people : {$data['PeopleNum']}</br>";
                echo "Status : {$data['StateCater']} </div>";
    
                // Check if there are food items for this caster
                    echo "<center><table class='custom-table '>";
                    echo "<div>Selected Foods</div>";
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
                        echo "<img src='admin/image/{$foodData['Image']}' alt='{$foodData['FoodName']}' width='150px' high='100px'>";
                        echo "</td>";
                        echo "<td>";
                        echo "<div>{$foodData['FoodName']}</div>";
                        echo "</td>";
                        echo "</tr>";
    
                        $i = $i + 1;
                    }
                    echo "</table></center>";
                
                echo "<hr noshade width=100% color=blue>";
                echo "</td>";
    
                echo "<td valign='top' class='col2'>";
                echo "<a class='edit-button' role='button' data-order-id='{$data['CaterID']}' data-order-Fname='{$data['FirstName']}' data-order-Lname='{$data['LastName']}' data-order-email='{$data['Email']}' data-order-contact='{$data['Contact']}' data-order-date='{$data['Date']}' data-order-numP='{$data['PeopleNum']}'><span class='material-icons-outlined'>edit</span></a>";
                echo "<a href='deleteOrder.php?orderID={$data['CaterID']}' onclick='return chkdel();' class='delete-button'><span class='material-icons-outlined'>delete</span></a>";
                echo "</td>";
                echo "</tr>";
    
            }    
        }
        ?>
    </table>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</body>

</html>