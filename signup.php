<?php
  if(isset($_COOKIE["userid"]) && isset($_COOKIE["password"])){
    header("location:index.php");
    exit;
  }
  
  else{
    if(isset($_POST["submit"])){

      $conn = mysqli_connect("localhost","root","","book_store");

      $userid = $_POST["username"];
      $email = $_POST["email"];
      $password = $_POST["password"];

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Enter Valid Email');</script>";
      }

      else{

      $sql0 = "SELECT email FROM users WHERE email = '$email';";
      $result0 = mysqli_query($conn,$sql0);

      $sql01 = "SELECT userid FROM users WHERE userid = '$userid';";
      $result01 = mysqli_query($conn,$sql01);

      if(mysqli_num_rows($result0) != 0){
        echo "<script>alert('Email Is Already In Use');</script>";
      }
      else if(mysqli_num_rows($result01) != 0){
        echo "<script>alert('Username Is Already Taken');</script>";
      }
      else{

      $a = scandir("./PROFILES");
      $c = 0;

      foreach ($a as $item=>$name) {
        if (str_contains($name, ".jpg")) {
            $c++;
        }
      }

      $randomnum = rand(1,$c);
      
      $defauly_dp_location = "profile" . $randomnum . ".jpg";

      if($conn){
          $sql = "INSERT INTO users VALUES('$userid','$password','$email','$defauly_dp_location');";

          $result = mysqli_query($conn,$sql);

          if($result){
              echo "<script>alert('Sign Up Successfull'); window.location.href = 'index.php';</script>";
          }
      }
      else{
        echo "<script>alert('Database Connection Failed');</script>";
      }
    }
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
    <title>Sign Up</title>
    <link rel="icon" type="image/png" href="IMAGES/SIGNUP.png"/>
    <link rel="stylesheet" href="formstyle.css">
    <link rel="stylesheet" href="buttonstyle.css">
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
    </style>
  </head>

  <body>
  <div class="signupFrm">
    <form action="" method="POST" class="form" onsubmit="return validateForm()">
      <h1 class="title">Sign up</h1>

      <div class="inputContainer">
        <input type="text" name="email" class="input" placeholder="a">
        <label for="" class="label">Email</label>
      </div>

      <div class="inputContainer">
        <input type="text" name="username" class="input" placeholder="a">
        <label for="" class="label">Username</label>
      </div>

      <div class="inputContainer">
        <input type="password" name="password" class="input" placeholder="a">
        <label for="" class="label">Password</label>
      </div>

      <input type="submit" name="submit" class="submitBtn" value="Sign up">
      <span id="error" class="error"></span>
    </form>
  </div>

  <div class="buttoncontainer">
    <a href="index.php"class="button-30" role="button">Home</a>
  </div>

  <script>
    function validateForm() {
      var email = document.forms[0]["email"].value;
      var username = document.forms[0]["username"].value;
      var password = document.forms[0]["password"].value;
      var errorElement = document.getElementById("error");

      if (email === "" || username === "" || password === "") {
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