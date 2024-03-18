<?php
session_start();
require("../connect.php");

if (isset($_GET["TypeFoodID"])) {
    $TypeID = $_GET["TypeFoodID"];

    // Check if TypeFoodID is used as a foreign key in another table
    $queryCheckFK = "SELECT * FROM food WHERE TypeFoodID='$TypeID'";
    $resultCheckFK = mysqli_query($link, $queryCheckFK);

    if (mysqli_num_rows($resultCheckFK) > 0) {
        $_SESSION['statusMsg'] = "Unable to delete data. It is being used as a foreign key in another table.";
    } else {
        // If not used as a foreign key, proceed with deletion
        $query = "DELETE FROM typefood WHERE typefood.TypeFoodID='$TypeID' ";
        $result = mysqli_query($link, $query);

        if (!$result) {
            $_SESSION['statusMsg'] = "Unable to delete data.";
        } else {
            $_SESSION['statusMsg'] = "Data has been successfully deleted.";
        }
    }
} else {
    $_SESSION['statusMsg'] = "TypeFoodID Not designated for deletion.";
}

header("location: formAddType.php");
?>
