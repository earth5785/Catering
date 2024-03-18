<?php
session_start();
include 'connect.php';

if(isset($_GET['foodId'])) {
    $foodId = $_GET['foodId'];

    // Query เพื่อดึงข้อมูลจากฐานข้อมูล
    $query = "SELECT FoodName, Description, Image FROM food WHERE FoodID = $foodId";
    $result = mysqli_query($link, $query);
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // นำข้อมูลในคอลัมน์ Description มาทำการ word wrap เพื่อขึ้นบรรทัดใหม่หากมีความยาวเกิน 15 คำ
        $description = $row['Description'];
        $max_words_per_line = 12; // จำนวนคำสูงสุดต่อบรรทัด
        $wrapped_description = wordwrap($description, $max_words_per_line * 5, "\n", true);
        $row['Description'] = $wrapped_description;
        
        // ส่งข้อมูลกลับเป็น JSON
        echo json_encode($row);
    } else {
        // ถ้าไม่พบข้อมูล
        echo json_encode(array('error' => 'Data not found'));
    }
} else {
    // ถ้าไม่ได้รับค่า FoodID
    echo json_encode(array('error' => 'FoodID is required'));
}
?>
