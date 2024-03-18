<?php
session_start();
require("../connect.php");

if (isset($_POST['submit'])) {
    // Check if MenuSetID is set (for update)
    if (isset($_POST['MenuSetID'])) {
        $Mname = $_POST["Mname2"];
        $MenuSetID = $_POST['MenuSetID'];

        // Check if the updated Mname2 already exists in the database
        $queryCheckMname = "SELECT * FROM menuset WHERE NameSet='$Mname' AND MenuSetID != '$MenuSetID'";
        $queryCheckMnameResult = mysqli_query($link, $queryCheckMname);
        $num = mysqli_num_rows($queryCheckMnameResult);

        if ($num >= 1) {
            $_SESSION['statusMsg'] = "Menu set name already exists in the system.";
        } else {
            $update = "UPDATE menuset SET NameSet='$Mname' WHERE MenuSetID=$MenuSetID";
            $queryupdate = mysqli_query($link, $update);

            if (!$queryupdate) {
                $_SESSION['statusMsg'] = "Error updating data, please try again.";
            } else {
                $_SESSION['statusMsg'] = "Data has been updated successfully.";
            }
        }
    } else {
        // Insert new data
        $Mname = $_POST["Mname"];

        // Check if the Mname already exists in the database
        $queryCheckMname = "SELECT * FROM menuset WHERE NameSet='$Mname'";
        $queryCheckMnameResult = mysqli_query($link, $queryCheckMname);
        $num = mysqli_num_rows($queryCheckMnameResult);

        if ($num >= 1) {
            $_SESSION['statusMsg'] = "Menu set name already exists in the system.";
        } else {
            $insert = "INSERT INTO menuset (NameSet) VALUES ('$Mname')";
            $queryadd = mysqli_query($link, $insert);

            if (!$queryadd) {
                $_SESSION['statusMsg'] = "Error adding data, please try again.";
            } else {
                $_SESSION['statusMsg'] = "Data has been added successfully.";
            }
        }
    }

    header("location: formAddSetMenu.php");
}
?>
