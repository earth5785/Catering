<?php
session_start();
require("../connect.php");

// ตรวจสอบว่า FoodID ถูกตั้งค่าใน URL หรือไม่
if (isset($_GET["FoodID"])) {
    $foodID = $_GET["FoodID"];

    // Check if FoodID is used as a foreign key in another table
    $queryCheckFK = "SELECT * FROM foodlist WHERE FoodID='$foodID'";
    $resultCheckFK = mysqli_query($link, $queryCheckFK);

    if (mysqli_num_rows($resultCheckFK) > 0) {
        $_SESSION['statusMsg'] = "Unable to delete data. It is being used as a foreign key in another table.";
    } else {
        // Get the image file name associated with the foodID
        $queryGetImage = "SELECT Image FROM food WHERE FoodID='$foodID'";
        $resultGetImage = mysqli_query($link, $queryGetImage);

        if ($row = mysqli_fetch_assoc($resultGetImage)) {
            $imageFileName = $row['Image'];

            // If not used as a foreign key, proceed with deletion
            $queryDeleteFood = "DELETE FROM food WHERE food.FoodID='$foodID' ";
            $resultDeleteFood = mysqli_query($link, $queryDeleteFood);

            if (!$resultDeleteFood) {
                $_SESSION['statusMsg'] = "Unable to delete data.";
            } else {
                // Delete the image file from the 'image' folder
                $imageFilePath = "image/" . $imageFileName;
                if (file_exists($imageFilePath)) {
                    unlink($imageFilePath);
                }

                $_SESSION['statusMsg'] = "Data has been successfully deleted.";
            }
        }
    }
} else {
    $_SESSION['statusMsg'] = "FoodID Not designated for deletion.";
}

header("location: formAddFood.php");
?>
