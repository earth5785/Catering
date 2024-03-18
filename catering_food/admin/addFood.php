<?php 

session_start();
require("../connect.php");

// File upload path
$targetDir = "image/";

if (isset($_POST['submit'])) {
    if (isset($_POST['FoodID'])) {
        $foodID = $_POST['FoodID'];
        $Fname = $_POST["Fname2"];
        $des = $_POST["des2"];
        $Mset = $_POST["Mset2"];
        $typeID = $_POST["typeID2"];

        // Check if the updated Fname already exists in the database
        $queryCheckFname = "SELECT * FROM food WHERE FoodName='$Fname' AND FoodID != '$foodID'";
        $queryCheckFnameResult = mysqli_query($link, $queryCheckFname);
        $num = mysqli_num_rows($queryCheckFnameResult);

        if ($num >= 1) {
            $_SESSION['statusMsg'] = "Food name already exists in the system.";
        } else {
            if (!empty($_FILES["file2"]["name"])) {
                $fileName = basename($_FILES["file2"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    
                if (in_array($fileType, $allowTypes)) {
                    // Get the old image name
                    $queryGetOldImage = "SELECT Image FROM food WHERE FoodID='$foodID'";
                    $resultOldImage = mysqli_query($link, $queryGetOldImage);
                    if ($rowOldImage = mysqli_fetch_assoc($resultOldImage)) {
                        $oldImage = $rowOldImage['Image'];
                        // Delete the old image file
                        unlink($targetDir . $oldImage);
                    }
    
                    if (move_uploaded_file($_FILES['file2']['tmp_name'], $targetFilePath)) {
                        // Update the record with the new image
                        $update = "UPDATE food SET FoodName='$Fname', Image='$fileName', Description='$des', MenuSetID='$Mset', TypeFoodID='$typeID' WHERE FoodID='$foodID'";
                        $queryUpdate = mysqli_query($link, $update);
    
                        if (!$queryUpdate) {
                            $_SESSION['statusMsg'] = "Error updating data, please try again.";
                        } else {
                            $_SESSION['statusMsg'] = "Data has been updated successfully.";
                        }
                    } else {
                        $_SESSION['statusMsg'] = "Sorry, there was an error adding information.";
                    }
                } else {
                    $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
                }
            } else {
                // No new image uploaded, proceed with updating other data
                $update = "UPDATE food SET FoodName='$Fname', Description='$des', MenuSetID='$Mset', TypeFoodID='$typeID' WHERE FoodID='$foodID'";
                $queryUpdate = mysqli_query($link, $update);
    
                if (!$queryUpdate) {
                    $_SESSION['statusMsg'] = "Error updating data, please try again.";
                } else {
                    $_SESSION['statusMsg'] = "Data has been updated successfully.";
                }
            }
        }
    } else {
        $Fname = $_POST["Fname"];
        $des = $_POST["des"];
        $Mset = $_POST["Mset"];
        $typeID = $_POST["typeID"];

        // Check if the Fname already exists in the database
        $queryCheckFname = "SELECT * FROM food WHERE FoodName='$Fname'";
        $queryCheckFnameResult = mysqli_query($link, $queryCheckFname);
        $num = mysqli_num_rows($queryCheckFnameResult);

        if ($num >= 1) {
            $_SESSION['statusMsg'] = "Food name already exists in the system.";
        } else {
            if (!empty($_FILES["file"]["name"])) {
                $fileName = basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

                if (in_array($fileType, $allowTypes)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                        $insert = "INSERT INTO food(FoodName, Image, Description, MenuSetID, TypeFoodID) VALUES ('$Fname', '$fileName', '$des', '$Mset', '$typeID')";
                        $queryadd = mysqli_query($link, $insert);

                        if (!$queryadd) {
                            $_SESSION['statusMsg'] = "File Add data, please try again.";
                        } else {
                            $_SESSION['statusMsg'] = "Data has been uploaded successfully.";
                        }
                    } else {
                        $_SESSION['statusMsg'] = "Sorry, there was an error adding information.";
                    }
                } else {
                    $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
                }
            } else {
                $_SESSION['statusMsg'] = "Please fill in complete information.";
            }
        }
    }

    header("location: formAddFood.php");
}

?>
