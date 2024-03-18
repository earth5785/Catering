<?php 
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="configProfile.css">
    <link rel="stylesheet" type="text/css" href="popUp.css">
    <link rel="stylesheet" type="text/css" href="NavST.css">
    <link rel="stylesheet" type="text/css" href="BG_body.css">
    <link rel="stylesheet" type="text/css" href="configmenu.css">


    <script src="figmenu1.js" typr="text/javascript" defer></script>


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
    
    <main>
        <article>
            <h4 style="color: #007bff;">Filter</h4>
            <form class="filter-form">
                <label for="foodName">Food Name:</label>
                <input type="text" id="foodName" name="foodName" class="form-control">
                <br>
                <label for="foodType">Food Type:</label>
                <select name="foodType" id="foodType" class="form-control">
                    <option value="">All</option> <!-- เพิ่มตัวเลือก "All" ที่ไม่ได้มีค่า -->
                    <?php
                        $queryTypeFood = "SELECT TypeFoodID, TypeFoodName FROM typefood";
                        $resultTypeFood = mysqli_query($link, $queryTypeFood);
                        while ($typeFood = mysqli_fetch_assoc($resultTypeFood)) {
                            echo "<option value='{$typeFood['TypeFoodID']}'>{$typeFood['TypeFoodName']}</option>";
                        }
                    ?>
                </select>
                <br>
                <label for="MenuSet">Menu Set:</label>
                <select name="MenuSet" id="MenuSet" class="form-control">
                    <option value="">All</option> <!-- เพิ่มตัวเลือก "All" ที่ไม่ได้มีค่า -->
                    <?php
                        $queryMenuSet = "SELECT MenuSetID, NameSet FROM menuset";
                        $resultMenuSet = mysqli_query($link, $queryMenuSet);
                        while ($menuSet = mysqli_fetch_assoc($resultMenuSet)) {
                            echo "<option value='{$menuSet['MenuSetID']}'>{$menuSet['NameSet']}</option>";
                        }
                    ?>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Apply Filter</button>
            </form>
        </article>

        <section>
            <div class="d-flex justify-content-end mb-3">
                <form action="menu.php" method="GET">
                    <button type="submit" class="btn btn-primary">All Food</button>
                </form>
            </div>
            <table class="table">
                <?php
        $sql = "SELECT * FROM food";

        // Check if filter options are set
// Check if filter options are set
        if (isset($_GET['foodName']) || isset($_GET['foodType']) || isset($_GET['MenuSet'])) {
            $foodName = $_GET['foodName'];
            $foodType = $_GET['foodType'];
            $menuSet = $_GET['MenuSet'];

            // Add WHERE clause to filter query based on user selection
            $conditions = [];
            if (!empty($foodName)) {
                $conditions[] = "FoodName LIKE '%$foodName%'";
            }
            if ($foodType !== '' && $foodType !== 'All') {
                $conditions[] = "TypeFoodID = $foodType";
            }
            if ($menuSet !== '' && $menuSet !== 'All') {
                $conditions[] = "MenuSetID = $menuSet";
            }

            // Combine conditions with AND operator
            $conditionStr = implode(" AND ", $conditions);

            // Append WHERE clause to SQL query if conditions exist
            if (!empty($conditions)) {
                $sql .= " WHERE $conditionStr";
            }
        }
        // Execute SQL query
        $result = mysqli_query($link, $sql);
        // Check if query was successful
        if ($result) {
            $count = 0;

            // Check if there are any results
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table'>";
                echo "<tr>";

                // Loop through each food item
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($count % 3 == 0 && $count > 0) {
                        echo "</tr><tr>";
                    }

                    echo "<td class='food-container'>";
                    echo "<img class='imgF' src='admin/image/{$row['Image']}' height='200px' width='300px'><br>";
                    echo "<span class='food-name'>{$row['FoodName']}</span><br>";
                    echo "<button class='btn btn-primary detail-button' style='position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%); display: none;'
                    data-foodId='{$row['FoodID']}' 
                    data-foodName='{$row['FoodName']}' 
                    data-description='{$row['Description']}' 
                    data-imageUrl='admin/image/{$row['Image']}' >Detail</button>";
                    echo "<button class='select-button' data-food-id='{$row['FoodID']}'>Select</button></td>";

                    $count++;
                }

                echo "</tr>";
                echo "</table>";
            } else {
                // Display message if no results found
                echo "<p>No results found.</p>";
            }
        } else {
            // Display error message if query fails
            echo "Error: " . mysqli_error($link);
        }

        // Close database connection
        mysqli_close($link);
?>
            </table>
        </section>

        <aside>
            <h4 style="color: #007bff;">Selected Foods</h4>
            <form id="confirm-form" action="addformlistfood.php" method="POST">
                <table id="selected-food-table" class="selecttable">
                    <thead>
                        <tr>
                            <th>Food Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="selected-food"></tbody>
                </table>
                <button class="confirm-button" type="submit">Confirm</button>
            </form>
        </aside>
    </main>

    <div id="popup-container" class="popup-container">
        <button onclick="closePopup()" class="btn btn-danger close-button"
            style="position: absolute; top: 10px; right: 10px; font-size: 20px;"><span>&times;</span></button>
        <div class="popup-content">
            <table>
                <tr>
                    <td width='200px'>
                        <img id="popup-image" src="" alt="Food Image">
                    </td>
                    <td>
                        <div class="food-details">
                            <h2 id="popup-food-name" style="text-align: right;"></h2>
                            <p id="popup-description"></p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
      <?php if (!empty($_SESSION['statusMsg'])) { ?>
          <div>
              <?php 
                  echo "<script>alert('" . $_SESSION['statusMsg'] . "');</script>";
                  unset($_SESSION['statusMsg']);
              ?>
          </div>
      <?php } ?>
    </div>
</body>

</html>