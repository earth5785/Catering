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
        background-color: #4CAF50; /* เปลี่ยนสีพื้นหลังปุ่ม */
        color: white; /* เปลี่ยนสีข้อความบนปุ่ม */
        padding: 10px 20px; /* เพิ่มช่องว่างรอบขอบปุ่ม */
        text-align: center; /* จัดข้อความให้อยู่ตรงกลางของปุ่ม */
        text-decoration: none; /* ลบการขีดเส้นใต้ข้อความ */
        display: inline-block; /* ทำให้ปุ่มมีขนาดที่พอดีกับข้อความ */
        border: none; /* ลบเส้นขอบของปุ่ม */
        border-radius: 5px; /* กำหนดมุมขอบของปุ่ม */
        cursor: pointer; /* เปลี่ยนเคอร์เซอร์เป็นรูปแบบของปุ่ม */
    }

    .custom-button:hover {
        background-color: #45a049; /* เปลี่ยนสีพื้นหลังปุ่มเมื่อเมาส์ผ่าน */
    }
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
        <a class="logo" href="index.php">
        <img src="logo/logo.png" alt="Catering Logo" width="60px">
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          <a class="nav-link active" href="menu2.php">Menu</a>
          <a class="nav-link active" href="about_us2.php">About Us</a>
        </div>
      </div>
      <button class="custom-button">
      <a class="nav-link active" href="login.php" style="color: inherit; text-decoration: none;">Login</a>
      </button>
    </div>
  </nav>
  <!-- Header-->
  <header class="bg-dark py-5">
    <div class="container px-5">
      <div class="row gx-5 align-items-center justify-content-center">
        <div class="col-lg-8 col-xl-7 col-xxl-6">
          <div class="my-5 text-center text-xl-start">
            <h1 class="display-5 fw-bolder text-white mb-2">Catering Food</h1>
            <p class="lead fw-normal text-white-50 mb-4">Are you ready to experience the deliciousness and specialness
              of Thai food? Come and enjoy a variety of
              exciting experiences with our cooking style! Every dish is ready and
              waiting for you to experience true Thai deliciousness. Come try and get addicted to our big flavors here!
            </p>
          </div>
        </div>
        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
            src="images2/THfood.jpeg" alt="..." /></div>
      </div>
    </div>
  </header>

  <!-- Features section-->
  <section class="py-5" id="features">
    <div class="container px-5 my-5">
      <div class="row gx-5">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h2 class="fw-bolder mb-0">Thai food catering website
          </h2>
        </div>
        <div class="col-lg-8">
          <div class="row gx-5 row-cols-1 row-cols-md-2">
            <div class="col mb-5 h-100">
              <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i>
              </div>
              <h2 class="h5">Customers can choose a food menu</h2>
              <p class="mb-0">
                - Set menu <br>
                - A la carte <br>
                - Dessert</p> <br>

            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- Bootstrap CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>