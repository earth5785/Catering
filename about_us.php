<?php
session_start();
require("connect.php");
?>

<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Castering Food</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Google Fonts Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="configProfile.css">
  <link rel="stylesheet" type="text/css" href="NavST.css">
  <link rel="stylesheet" type="text/css" href="BG_body.css">

  <style>
    .custom-button {
      background-color: #4CAF50;
      /* เปลี่ยนสีพื้นหลังปุ่ม */
      color: white;
      /* เปลี่ยนสีข้อความบนปุ่ม */
      padding: 10px 20px;
      /* เพิ่มช่องว่างรอบขอบปุ่ม */
      text-align: center;
      /* จัดข้อความให้อยู่ตรงกลางของปุ่ม */
      text-decoration: none;
      /* ลบการขีดเส้นใต้ข้อความ */
      display: inline-block;
      /* ทำให้ปุ่มมีขนาดที่พอดีกับข้อความ */
      border: none;
      /* ลบเส้นขอบของปุ่ม */
      border-radius: 5px;
      /* กำหนดมุมขอบของปุ่ม */
      cursor: pointer;
      /* เปลี่ยนเคอร์เซอร์เป็นรูปแบบของปุ่ม */
    }

    .custom-button:hover {
      background-color: #45a049;
      /* เปลี่ยนสีพื้นหลังปุ่มเมื่อเมาส์ผ่าน */
    }

    .fixcon {
      margin: auto;
      /* ทำให้ตารางอยู่ตรงกลางของ Body */
      background-color: #F5DEB3;
      /* เปลี่ยนสีพื้นหลังของตาราง */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* เพิ่มเงาให้กับตาราง */
      border-radius: 10px;
      /* ปรับขอบของตารางให้เป็นรูปโค้ง */
      margin-top: 20px;
      padding: 20px;
      /* เพิ่มระยะห่างของพื้นหลังกับตัวหนังสือ */
      width: 350px;
    }

    /* CSS code */

    .image-size {
      width: 590px; /* กำหนดความกว้างของรูปภาพ */
      height: 590px; /* กำหนดให้สูงปรับขนาดตามอัตราส่วน */
      border-radius: 10px; /* ปรับขอบของรูปให้เป็นรูปโค้ง */
      position: absolute; /* กำหนดตำแหน่งแบบเป็น absolute */
      top: 55%; /* ตำแหน่งด้านบน */
      right: 0; /* ตำแหน่งด้านขวา */
      transform: translateY(-50%); /* ย้ายตำแหน่งให้อยู่ตรงกลางตามแนวดิ่ง */
      z-index: 1; /* กำหนดลำดับการทับซ้อน */

      /* กำหนดค่า opacity ในแต่ละส่วนของรูปภาพ */
      background: linear-gradient(to left, rgba(255,255,255,0.2), rgba(255,255,255,0) 0%),
                  linear-gradient(to left, rgba(255,255,255,0.5), rgba(255,255,255,0) 50%),
                  linear-gradient(to left, rgba(255,255,255,0.9), rgba(255,255,255,0) 100%);
    }



    .section-over-image {
      position: absolute;
      top: 50%;
      left: 30%;
      transform: translate(-50%, -50%);
      z-index: 2;
    }

    /* CSS code */
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var navbarElement = document.querySelector('nav');
      navbarElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  </script>

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


  <div>
    <div>
      <div>
        <section class="py-5 section-over-image">
          <div class="row gx-5 row-cols-1 row-cols-md-2">
            <div class="col mb-5 h-100">
              <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
              <h2 class="h5">Contact</h2>
              <p class="fixcon">
                Ning's Thai kitchen<br>
                101 station Road Poleaate<br>
                07773 844 732<br>
                Email : Suchila@Ningthaitakeaway.co.uk
              </p>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="col-lg-4">
      <img class="image-size" src="logo/logo.png">
    </div>
  </div>

  <!-- Bootstrap CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>
