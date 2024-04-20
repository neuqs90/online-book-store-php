<?php
  if( isset($_COOKIE['userid']) && isset($_COOKIE['password'])){

    header("location:index.php");
    exit;
  }

  else{

    if(isset($_POST['submit'])){

      $conn = mysqli_connect("localhost","root","","book_store");

      $userid = $_POST['userinput'];
      $password = $_POST['password'];

      if($conn){
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn,$sql);

        $flag1 = FALSE;
        $flag2 = FALSE;

        while($row = mysqli_fetch_assoc($result)){

          if(($userid == $row['email']) || ($userid == $row["userid"])){

            $flag1 = TRUE;

            if($password == $row['password']){

              $flag2 = TRUE;

              setcookie("userid",$userid,time() + 60 * 60);
              setcookie("password",$password,time() + 60 * 60);

              echo "<script>alert('Login Successfully'); window.location.href = 'index.php';</script>";
          
            }
          }
        }
      }
      else{
        echo "<script>alert('Connection To Database Failed'); window.location.href = 'index.php';</script>";
       
      }

      if(!$flag1){
        echo "<script>alert('User Not Found');</script>";
        
      }
      if(!$flag2){
        echo "<script>alert('Password Is Wrong');</script>";
      }

    }
  }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" type="image/png" href="IMAGES/LOGIN.png"/>
    <link rel="stylesheet" href="buttonstyle.css">
    <link rel="stylesheet" href="formstyle.css">
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
    </style>
  </head>

  <body>
  <div class="signupFrm">
    <form action="login.php" method="POST" class="form" onsubmit="return validateForm()">
      <h1 class="title">Login</h1>

      <div class="inputContainer">
        <input type="text" name="userinput" class="input" placeholder="a" required>
        <label for="" class="label">Username Or Email</label>
      </div>

      <div class="inputContainer">
        <input type="password" name="password" class="input" placeholder="a" required>
        <label for="" class="label">Password</label>
      </div>

      <input type="submit" name="submit" class="submitBtn" value="Login">
      <span id="error" class="error"></span>
    </form>
  </div>

  <div class="buttoncontainer">
    <a href="index.php"class="button-30" role="button">Home</a>
  </div>
  <script>
  function validateForm() {
    var userinput = document.forms[0]["userinput"].value;
    var password = document.forms[0]["password"].value;
    var errorElement = document.getElementById("error");

    if (userinput === "" || password === "") {
      errorElement.innerText = "Please fill in all fields";
      return false;
    } else {
      errorElement.innerText = ""; 
      return true; 
    }
  }

  </script>
  </body>
</html>