<?php
session_start();
require("../connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Set</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="formTypeAndSet.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <script language="JavaScript">
        function Checkform() {
            var Mname = document.add.Mname.value;

            if (Mname.trim() === "") {
                alert("Please enter the name of the Menu set.");
                document.add.Mname.focus();
                return false;
            }
            document.add.submit();
        }

        function Checkform2() {
            var Mname2 = document.update.Mname2.value;

            if (Mname2.trim() === "") {
                alert("Please enter the name of the Menu set.");
                document.update.Mname2.focus();
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

        .figtable {
            margin: auto;
            /* ทำให้ตารางอยู่ตรงกลางของ Body */
            background-color: #F5DEB3;
            /* เปลี่ยนสีพื้นหลังของตาราง */
            width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* เพิ่มเงาให้กับตาราง */
            border-radius: 10px;
            /* ปรับขอบของตารางให้เป็นรูปโค้ง */
        }

        .figtable tr {
            margin: auto;
            /* ทำให้ตารางอยู่ตรงกลางของ Body */
            background-color: #F5DEB3;
            /* เปลี่ยนสีพื้นหลังของตาราง */
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* เพิ่มเงาให้กับตาราง */

        }



        /* กำหนดสีไอคอน "edit" */
        .edit-button .material-icons-outlined {
            color: #4682B4;
            /* เปลี่ยนเป็นสีที่ต้องการ */
        }

        /* กำหนดสีไอคอน "delete" */
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

    <br>&nbsp;&nbsp;<a class="btn btn-warning" id="openFormSet" role="button">Add Menu Set</a>

    <form action="addMenu.php" id="cardFormSet" name="add" method="POST" enctype="multipart/form-data"
        onsubmit="return Checkform();">
        <credit-card>
            <table>
                <tr>
                    <td class="col1">
                        <label>Menu set :</label>
                    </td>
                    <td class="col2">
                        <input type="text" size="20" name="Mname" id="Mname" maxlength="50">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" height="100px">
                        <input type="submit" name="submit" value="Save" class="btn btn-sm btn-primary mb-3"
                            style="width: 70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" id="closeFormCardBtn" value="Cancel" class="btn btn-sm btn-primary mb-3"
                            style="width: 70px;">
                    </td>
                </tr>
            </table>
        </credit-card>
    </form>

    <form action="addMenu.php" id="formUpdate" name="update" method="POST" enctype="multipart/form-data"
        onsubmit="return Checkform2();">
        <credit-card>
            <input type="hidden" name="MenuSetID" id="editMenuSetID" value="">
            <table>
                <tr>
                    <td class="col1">
                        <label>Menu set :</label>
                    </td>
                    <td class="col2">
                        <input type="text" size="20" name="Mname2" id="Mname2" maxlength="50" value="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" height="100px">
                        <input type="submit" name="submit" value="Save" class="btn btn-sm btn-primary mb-3"
                            style="width: 70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" id="closeFormCardBtn2" value="Cancel" class="btn btn-sm btn-primary mb-3"
                            style="width: 70px;">
                    </td>
                </tr>
            </table>
        </credit-card>
    </form>

    <?php require("../smgAlert.php"); ?>

    <table class="figtable">
        <tr align='center'>
            <td>Menu set Name</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php
$query = "select MenuSetID, NameSet from menuset";
$result = mysqli_query($link, $query);
while ($data = mysqli_fetch_row($result)) {
    echo "<tr>";
    echo "<td>";
    echo "$data[1]";
    echo "</td>";
    echo "<td  align='center'><a class='edit-button' role='button' data-menu-id='$data[0]' data-menu-name='$data[1]'><span class='material-icons-outlined'>edit</span></a></td>";
    echo "<td  align='center'><a href='deleteMenu.php?MenuSetID=$data[0]' onclick='return chkdel();' class='delete-button'><span class='material-icons-outlined'>delete</span></a></td>";
    echo "</tr>";
}
    ?>
    </table>

    <script>
        function openForm2(menuID, menuName) {
            document.getElementById('editMenuSetID').value = menuID;
            document.getElementById('Mname2').value = menuName; // ตั้งค่าค่า NameSet ที่มาจาก data-menu-name
            document.getElementById('formUpdate').style.display = 'block';
            document.getElementById('cardFormSet').style.display = 'none';
        }


        document.getElementById('openFormSet').addEventListener('click', function () {
            document.getElementById('cardFormSet').style.display = 'block';
            document.getElementById('formUpdate').style.display = 'none';
        });

        var editButtons = document.getElementsByClassName('edit-button');

        for (var i = 0; i < editButtons.length; i++) {
            editButtons[i].addEventListener('click', function () {
                var menuID = this.getAttribute('data-menu-id');
                var menuName = this.getAttribute('data-menu-name');
                openForm2(menuID, menuName);
            });
        }

        document.getElementById('closeFormCardBtn2').addEventListener('click', function () {
            document.getElementById('formUpdate').style.display = 'none';
        });
    </script>


    <script src="closeFormSet.js" type="text/javascript" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>