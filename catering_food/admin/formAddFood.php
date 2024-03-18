<?php
session_start();
require("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="formFood.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

  <script language="JavaScript">
    function Checkform() {
      var Fname = document.add.Fname.value;
      var des = document.add.des.value;

      if (Fname.trim() === "") {
        alert("Please enter the name of the food.");
        document.add.Fname.focus();
        return false;
      }

      if (des.trim() === "") {
        alert("Please enter a description.");
        document.add.des.focus();
        return false;
      }

      document.add.submit();
    }

    function Checkform2() {
      var Fname2 = document.update.Fname2.value;
      var des2 = document.update.des2.value;

      if (Fname2.trim() === "") {
        alert("Please enter the name of the food.");
        document.update.Fname2.focus();
        return false;
      }

      if (des2.trim() === "") {
        alert("Please enter a description.");
        document.update.des2.focus();
        return false;
      }

      document.update.submit();
    }

    function chkdel() {
      if (confirm(' Confirm again !!! ')) {
        return true;
      } else {
        return false;
      }
    }

  </script>
  <style>
    .navbar-custom {
      background-color: #8B4513;
      /* เปลี่ยนสี Nav */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);
      /* เพิ่มเงาให้ Navbar */
    }

    /* สีของลิงค์ใน Navbar */
    .navbar-custom .nav-link {
      color: #000000;
      /* เปลี่ยนสีตัวอักษร */
    }

    /* สีของลิงค์ที่เมาส์ hover อยู่ */
    .navbar-custom .nav-link:hover {
      color: #F5F5DC;
      /* เปลี่ยนสีตัวอักษรเมื่อ hover */
    }

    body {
      background-color: #DEB887;
      /* เปลี่ยนสีพื้นหลังเป็นสีเทาอ่อน */
    }

    .container {
      background-color: #F5DEB3;
      /* กำหนดสีพื้นหลังเป็นสีเทาอ่อน */
      padding: 15px;
      /* เพิ่ม padding เพื่อให้เนื้อหาไม่ติดกับขอบ */
      border-radius: 10px;
      /* เพิ่มขอบมนต์ให้มีรูปร่างโค้ง */
    }


    .table-striped.table-bordered th {
      background-color: #DEB887;
    }

    .table-striped.table-bordered td {
      background-color: #F5DEB3;
      padding: 15px;
      border-radius: 5px;
    }

    #cardForm {
      background-color: #F5F5DC;
      /* เปลี่ยนสีพื้นหลังของแบบฟอร์ม */
      width: 650px;
    }

    .credit-card {
      padding: 20px;
      /* เพิ่มการเติมส่วนของแบบฟอร์ม */
      background-color: white;
      /* สีพื้นหลังของแบบฟอร์ม */
      border-radius: 10px;
      /* เพิ่มเส้นขอบโค้งของแบบฟอร์ม */
    }

    .credit-card table {
      width: 100%;
      /* กำหนดความกว้างของตารางให้เต็ม */
    }

    .credit-card table td,
    .credit-card table th {
      padding: 10px;
      /* เพิ่มการเติมส่วนของเซลล์ในตาราง */
    }

    .btn-primary {
      background-color: green;
      border-color: green;
    }

    #closeFormCardBtn {
      background-color: red;
      border-color: red;
    }

    #closeFormCardBtn2 {
      background-color: red;
      /* เปลี่ยนสีพื้นหลังของปุ่ม "Cancel" เป็นสีแดง */
      color: white;
      /* เปลี่ยนสีข้อความของปุ่ม "Cancel" เป็นสีขาว */
    }

    #cardForm2 {
      background-color: #F5F5DC;
      width: 650px;
    }

    .delete-button .material-icons-outlined {
            color: red;
            /* เปลี่ยนเป็นสีที่ต้องการ */
        }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="mainAdminEdit.php">Home page</a>
          <a class="nav-link active" href="formAddFood.php">Food</a>
          <a class="nav-link active" href="formAddSetMenu.php">Menu Set</a>
          <a class="nav-link active" href="formAddType.php">Type Food</a>
        </div>
      </div>
      <a class="nav-link active" href="../logout.php">Log out</a>
    </div>
  </nav>
  <br>
  &nbsp;&nbsp;<a class="btn btn-warning" id="checkCardBtn" role="button">Add Food</a><span
    class='glyphicon glyphicon-trash'></span>


  <!--Form Edit data-->
  <form id="cardForm" name="add" action="addFood.php" method="POST" enctype="multipart/form-data"
    onsubmit="return Checkform();">
    <credit-card>
      <table>
        <tr>
          <td class="col1">
            <label>Food Name :</label>
          </td>
          <td class="col2">
            <input type="text" size="20" name="Fname" id="Fname" maxlength="50">
          </td>
        </tr>
        <tr>
          <!--<td colspan="2"> กำหนดให้ขนาดของ td ขยายไปครอบ 2 columns -->
          <td class="col1" valign="top">
            <label for="myfile">Food image :</label>
          </td>
          <td>
            <div class="col2 border-2 border-dashed rounded-3">
              <input type="file" name="file" class="form-control streched-link"
                accept="image/gif, image/jpeg, image/png">
              <small class="warning-text">Note: Only JPG, JPEG, PNG & GIF files are allowed to upload</small>
            </div>
          </td>
        </tr>
        <tr>
          <td class="col1" valign="top">
            <label>Description :</label>
          </td>
          <td class="col2">
            <textarea id="des" name="des" rows="4" cols="50"></textarea>
          </td>
        </tr>
        <tr>
          <td class="col1">
            <label>Food type :</label>
          </td>
          <td class="col2">
            <Select name="typeID" id="typeID">
              <?php
                  $query = "select TypeFoodID, TypeFoodName from typefood";
                  $result = mysqli_query($link, $query);
                  while ($data = mysqli_fetch_row($result)) {
                      ?>
              <option value="<?php echo $data[0]; ?>">
                <?php echo $data[1]; ?>
              </option>
              <?php
                  }
                  ?>
            </Select>

          </td>
        </tr>
        <tr>
          <td class="col1" style="height: 20px;"> <!--valign="top" กำหนดให้ label อยู่ตำแหน่ง บน-->
            <label>Menu Set :</label>
          </td>
          <td class="col2">
            <Select name="Mset" id="Mset">
              <?php
                    $query="select MenuSetID, NameSet from menuset";
                    $result = mysqli_query($link, $query);
                    while ($data = mysqli_fetch_row($result)) {
                        ?>
              <option value="<?php echo $data[0]; ?>">
                <?php echo $data[1]; ?>
              </option>
              <?php
                    }
                    ?>
            </Select>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <br><input type="submit" name="submit" value="Save" class="btn btn-sm btn-primary mb-3"
              style="width: 70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" id="closeFormCardBtn" value="Cancel" class="btn btn-sm btn-primary mb-3"
              style="width: 70px;">
          </td>
        </tr>
      </table>
    </credit-card>
  </form>

  <?php require("../smgAlert.php"); ?>

  <form action="addFood.php" id="cardForm2" name="update" method="POST" enctype="multipart/form-data"
    onsubmit="return Checkform2();">
    <credit-card>
      <input type="hidden" name="FoodID" id="editFoodID" value="">
      <table>
        <tr>
          <td class="col1">
            <label>Food Name :</label>
          </td>
          <td class="col2">
            <input type="text" size="20" name="Fname2" id="Fname2" maxlength="50">
          </td>
        </tr>
        <tr>
          <!--<td colspan="2"> กำหนดให้ขนาดของ td ขยายไปครอบ 2 columns -->
          <td class="col1" valign="top">
            <label for="myfile">Food image :</label>
          </td>
          <td>
            <div class="col2 border-2 border-dashed rounded-3">
              <input type="file" name="file2" id="file2" class="form-control streched-link"
                accept="image/gif, image/jpeg, image/png">
              <small class="warning-text">Note: Only JPG, JPEG, PNG & GIF files are allowed to upload</small>
            </div>
          </td>
        </tr>
        <tr>
          <td class="col1" valign="top">
            <label>Description :</label>
          </td>
          <td class="col2">
            <textarea id="des2" name="des2" rows="4" cols="50"></textarea>
          </td>
        </tr>
        <tr>
          <td class="col1">
            <label>Food type :</label>
          </td>
          <td class="col2">
            <Select name="typeID2" id="typeID2">
              <?php
        $query = "select TypeFoodID, TypeFoodName from typefood";
        $result = mysqli_query($link, $query);
        while ($data = mysqli_fetch_row($result)) {
            ?>
              <option value="<?php echo $data[0]; ?>">
                <?php echo $data[1]; ?>
              </option>
              <?php
        }
        ?>
            </Select>
          </td>
        </tr>
        <tr>
          <td class="col1" style="height: 20px;"> <!--valign="top" กำหนดให้ label อยู่ตำแหน่ง บน-->
            <label>Menu Set :</label>
          </td>
          <td class="col2">
            <Select name="Mset2" id="Mset2">
              <?php
        $query="select MenuSetID, NameSet from menuset";
        $result = mysqli_query($link, $query);
        while ($data = mysqli_fetch_row($result)) {
            ?>
              <option value="<?php echo $data[0]; ?>">
                <?php echo $data[1]; ?>
              </option>
              <?php
        }
        ?>
            </Select>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><br>
            <input type="submit" name="submit" value="Save" class="btn btn-sm btn-primary mb-3"
              style="width: 70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" id="closeFormCardBtn2" value="Cancel" class="btn btn-sm btn-primary mb-3"
              style="width: 70px;">
          </td>
        </tr>
      </table>
    </credit-card>
  </form>
  <br>
  <div class="container">
    <h2 class="text-center">Food List</h2>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Food Name</th>
          <th>Image</th>
          <th>Description</th>
          <th>Type</th>
          <th>Menu Set</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
              $query = "SELECT FoodName, Image, Description, TypeFoodName, NameSet, FoodID, f.TypeFoodID, f.MenuSetID FROM food AS f INNER JOIN typefood AS t ON f.TypeFoodID = t.TypeFoodID INNER JOIN menuset AS m ON f.MenuSetID = m.MenuSetID";
              $result = mysqli_query($link, $query);

              while ($data = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>{$data['FoodName']}</td>";
                  echo "<td><img src='image/{$data['Image']}' width='100' height='70' alt='{$data['FoodName']}'></td>";

                  echo "<td>";

                  $description = $data['Description'];
                  $max_words_per_line = 15; // จำนวนคำสูงสุดต่อบรรทัด
                  
                  $wrapped_description = wordwrap($description, $max_words_per_line * 5, "<br>\n", true);
                  echo $wrapped_description;
                                                  
                  echo "</td>";

                  echo "<td>{$data['TypeFoodName']}</td>";
                  echo "<td>{$data['NameSet']}</td>";
                  echo "<td><a class='edit-button' role='button' data-food-id='{$data['FoodID']}' data-food-name='{$data['FoodName']}' data-food-file='{$data['Image']}' data-food-des='{$data['Description']}' data-food-type='{$data['TypeFoodID']}' data-food-mset='{$data['MenuSetID']}'><span class='material-icons-outlined'>edit</span></a></td>";
                  echo "<td><a href='deleteFood.php?FoodID={$data['FoodID']}' onclick='return chkdel();' class='delete-button'><span class='material-icons-outlined'>delete</span></a></td>";
                  echo "</tr>";
              }
          ?>
      </tbody>
    </table>
  </div>

  <script>
    function openForm2(FoodID, FoodName, File, Des, Type, Mset) {
      document.getElementById('editFoodID').value = FoodID;
      document.getElementById('Fname2').value = FoodName;
      document.getElementById('des2').value = Des;
      document.getElementById('typeID2').value = Type;
      document.getElementById('Mset2').value = Mset;

      document.getElementById('cardForm2').style.display = 'block';
      document.getElementById('cardForm').style.display = 'none';
    }

    document.getElementById('closeFormCardBtn2').addEventListener('click', function () {

      document.getElementById('cardForm2').style.display = 'none';
    });

    var editButtons = document.getElementsByClassName('edit-button');


    for (var i = 0; i < editButtons.length; i++) {
      editButtons[i].addEventListener('click', function () {
        var FoodID = this.getAttribute('data-food-id');
        var FoodName = this.getAttribute('data-food-name');
        var File = this.getAttribute('data-food-file');
        var Des = this.getAttribute('data-food-des');
        var Type = this.getAttribute('data-food-type');
        var Mset = this.getAttribute('data-food-mset');
        openForm2(FoodID, FoodName, File, Des, Type, Mset);
      });
    }
  </script>

  <script src="closeFormFood.js" type="text/javascript" defer></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>