<?php
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Castering Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="configProfile.css">
    <link rel="stylesheet" type="text/css" href="NavST.css">
    <link rel="stylesheet" type="text/css" href="BG_body.css">

</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
        <a class="logo" href="index2.php">
        <img src="logo/logo.png" alt="Catering Logo" width="75px">
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
    
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Welcome to Catering Food</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Are you ready to experience the deliciousness and
                            specialness of Thai food? Come and enjoy a variety of
                            exciting experiences with our cooking style! Every dish is ready and
                            waiting for you to experience true Thai deliciousness. Come try and get addicted to our big
                            flavors here!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-warning btn-lg px-4 me-sm-3" href="orderCus.php">My Orders</a>
                        </div>
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
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-collection"></i></div>
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

</body>

</html>