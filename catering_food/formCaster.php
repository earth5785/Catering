<?php
session_start();
require("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="configProfile.css">
    <link rel="stylesheet" type="text/css" href="formCaster.css">
    <link rel="stylesheet" type="text/css" href="NavST.css">
    <link rel="stylesheet" type="text/css" href="BG_body.css">
    <script src="configCaster.js" type="text/javascript" defer></script>

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

    
    <br><br>
    <?php
    // ตรวจสอบว่ามีการเข้าสู่ระบบหรือไม่
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    ?>
    <form action="addFormCaster.php" name="add" method="POST" onsubmit="return Checkform();">
        <table>
            <tr>
                <td>First Name : <input type="text" name="Fname" placeholder="Enter first name."></td>
                <td>Last Name : <input type="text" name="Lname" placeholder="Enter last name."></td>
            </tr>
            <tr>
                <td>Email : <input type="email" name="email" placeholder="Enter your email address."></td>
            </tr>
            <tr>
                <td>Contact : <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder="Enter phone number" required></td>
                <span id="phone-error" style="color: red;"></span>
            </tr>
            <tr>
                <td>Date of event: <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" required></td>
            </tr>
            <tr>
                <td>How many people of event : <input type="number" name="numPeo"
                        placeholder="Enter the number of people in the event."
                        oninput="this.value = Math.abs(this.value)" min="1"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Save" class="btn btn-sm btn-success mb-3"
                        style="width: 70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" value="Reset" class="btn btn-sm btn-danger mb-3" style="width: 70px;">
                </td>
            </tr>
        </table>
    </form>
    <?php
    } else {
   
        $_SESSION['statusMsg'] = "Please log in first. to fill in information.";
        header('Location:login.php');
        exit();
    }
    ?>
    <?php  require("smgAlert.php");?>


</body>

</html>