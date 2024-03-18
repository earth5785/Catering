<!DOCTYPE html>
<html>
<head>
    <META charset="UTf-8">
        <title>Singin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
        <link rel="stylesheet" type="text/css" href="formSingup.css">
        <link rel="stylesheet" type="text/css" href="BG_body.css">
    <script language="JavaScript">
      function Checkform(){
        var pass = document.getElementById("pass").value;
        var pass2 = document.getElementById("pass2").value;

            if(document.singup.user.value==""){
                alert("Please enter your username.");
                document.singup.user.focus();
                return false;
            }
            if(document.singup.pass.value==""){
                alert("Please enter your password.");
                document.singup.pass.focus();
                return false;
            }
            if(document.singup.Fname.value==""){
                alert("Please enter your name.");
                document.singup.Fname.focus();
                return false;
            }
            if(document.singup.Lname.value==""){
                alert("Please enter last name.");
                document.singup.Lname.focus();
                return false;
            }
            if (pass != pass2) {
            alert("Password and Confirm Password must match");
            return false;
        }
            document.sear.submit();
      }
      </script>
    <style>

button.btn-primary:hover {
    background-color: darkred; /* สีพื้นหลังเมื่อ Hover */
    color: lightgray; /* สีของข้อความเมื่อ Hover */
}

    .button1 {background-color: #04AA6D;}
    </style>

</head>
<body>
    <div class="login-container">
    <form action="addUer.php" name="singup" method="post" onsubmit="JvaScript:return Checkform();">
        <table>
            <h3 style="margin-left: 6%;">Singup</h3>
            User Name<input type="text" size="20" name="user" id="user" maxlength="50">
            Password<input type="password" size="20" name="pass" id="pass" maxlength="20">
            Confirm Password<input type="password" size="20" name="pass2" id="pass2" maxlength="20">
            Frist Name<input type="text" size="20" name="Fname" id="Fname" maxlength="100">
            Last Name<input type="text" size="20" name="Lname" id="Lname" maxlength="100">
            <br>
           <button  type="submit" >Sing Up</button> 
           <button type="reset" >Reset</button><br>
        </table>
    </form>
    <button class="btn btn-primary" onclick="location.href='login.php'" style="background-color: #009900; color: white;">Login</button>

    </div>

    <?php 
    session_start();
    require("smgAlert.php"); 
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 

</body>
</html>