<?php
session_start();
require("../connect.php");

if (isset($_POST['submit'])) {
    // Check if TypeFoodID is set (for update)
    if (isset($_POST['TypeFoodID'])) {
        $Tname = $_POST["Tname2"];
        $TypeFoodID = $_POST['TypeFoodID'];

        // Check if the updated Tname2 already exists in the database
        $queryCheckTname = "SELECT * FROM typefood WHERE TypeFoodName='$Tname' AND TypeFoodID != '$TypeFoodID'";
        $queryCheckTnameResult = mysqli_query($link, $queryCheckTname);
        $num = mysqli_num_rows($queryCheckTnameResult);

        if ($num >= 1) {
            $_SESSION['statusMsg'] = "Type name already exists in the system.";
        } else {
            $update = "UPDATE typefood SET TypeFoodName='$Tname' WHERE TypeFoodID=$TypeFoodID";
            $queryupdate = mysqli_query($link, $update);

            if (!$queryupdate) {
                $_SESSION['statusMsg'] = "Error updating data, please try again.";
            } else {
                $_SESSION['statusMsg'] = "Data has been updated successfully.";
            }
        }
    } else {
        // Insert new data
        $Tname = $_POST["Tname"];

        // Check if the Tname already exists in the database
        $queryCheckTname = "SELECT * FROM typefood WHERE TypeFoodName='$Tname'";
        $queryCheckTnameResult = mysqli_query($link, $queryCheckTname);
        $num = mysqli_num_rows($queryCheckTnameResult);

        if ($num >= 1) {
            $_SESSION['statusMsg'] = "Type name already exists in the system.";
        } else {
            $insert = "INSERT INTO typefood(TypeFoodName) VALUES ('$Tname')";
            $queryadd = mysqli_query($link, $insert);

            if (!$queryadd) {
                $_SESSION['statusMsg'] = "Error adding data, please try again.";
            } else {
                $_SESSION['statusMsg'] = "Data has been added successfully.";
            }
        }
    }

    header("location: formAddType.php");
}
?>
