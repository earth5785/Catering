<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <META charset="UTf-8">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
        <link rel="stylesheet" type="text/css" href="formLogin.css">
        <link rel="stylesheet" type="text/css" href="BG_body.css">


    <script language="JavaScript">
      function Checkform(){
        if(document.login.user.value==""){
                alert("Please enter your username.");
                document.login.user.focus();
                return false;
            }
            if(document.login.pass.value==""){
                alert("Please enter your password.");
                document.login.pass.focus();
                return false;
            }
            document.sear.submit();
      }
      </script>



</head>
<body>
    <div class="login-container">
    
        <form action="checklogin.php" name="login" method="post" onsubmit="JvaScript:return Checkform();">
                <h3 style="margin-left: 6%;">Login</h3>
                Username<input type="text" size="20" name="user" id="user" maxlength="20">
                Password<input type="password" size="20" name="pass" id="pass" maxlength="20"><br><br>
                <button type="submit">Login</button>
                <button type="reset" >Reset</button>
                
        </form>
    </div>

          <br>
          <center><button class="btn btn-success" onclick="location.href='SingUp.php'">SingUp</button><center> 

          <?php 
          require("smgAlert.php"); 
          ?>
</body>
</html>