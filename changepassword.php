<?php
  if(!isset($_COOKIE['userid']) && isset($_COOKIE['password'])){
        echo "<script>alert('You Need To Login To Access This Page'); window.location.href = 'index.php';</script>";
        exit;
  }

  else{

    if(isset($_POST['submit'])){

        $conn = mysqli_connect("localhost","root","","book_store");

        if($conn){
            $userid = $_POST['userinput'];
            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['newpassword'];
        
            $sql = "SELECT * FROM users;";
            $result = mysqli_query($conn,$sql);

            $flag1 = FALSE;
            $flag2 = FALSE;

            while($row = mysqli_fetch_assoc($result)){
                // check if user actually exists or not
                if(($row["userid"] == $userid) || $row["email"] == $userid){
                    $flag1 = TRUE;

                    //  check if password is correct or not
                    if($row["password"] == $oldpassword){
                        $flag2 = TRUE;

                        $updatesql = "UPDATE users SET password = '$newpassword' WHERE userid = '$userid' OR email = '$userid';";
                        $updateresult = mysqli_query($conn,$updatesql);
                        if($updateresult){
                            // after updating password redirected to profile.php
                            setcookie("password",$newpassword,time() + 60 * 60);
                            echo "<script>alert('Password Changed Successfully'); window.location.href = 'profile.php';</script>";
                        }
                        else{
                            // if password not update 
                            echo "<script>alert('Password Cannot Changed , Something Went Wrong From Our Side');</script>";
                        }     
                    }
                }
            }
            if(!$flag1){
                echo "<script>alert('User Not Found');</script>";
                
            }
            elseif(!$flag2){
                echo "<script>alert('Password Is Wrong');</script>";
            }
        }
        // if connection to database failed
        else{
            echo "<script>alert('Connection To Database Failed');</script>";
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
    <link rel="icon" type="image/png" href="IMAGES/CHANGE_PASSWORD.png"/>
    <title>Chnage Password</title>
    <link rel="stylesheet" href="formstyle.css">
    <link rel="stylesheet" href="buttonstyle.css">
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
    </style>
  </head>

  <body>
  <div class="signupFrm">
    <form action="" method="POST" class="form" onsubmit="return validateForm()">
      <h1 class="title">Change Password</h1>

      <div class="inputContainer">
        <input type="text" name="userinput" class="input" placeholder="a" required>
        <label for="" class="label">Username Or Email</label>
      </div>

      <div class="inputContainer">
        <input type="password" name="oldpassword" class="input" placeholder="a" required>
        <label for="" class="label">Old Password</label>
      </div>

      <div class="inputContainer">
        <input type="password" name="newpassword" class="input" placeholder="a" required>
        <label for="" class="label">New Password</label>
      </div>

      <input type="submit" name="submit" class="submitBtn" value="Login">
      <span id="error" class="error"></span>
    </form>
  </div>

  <div class="buttoncontainer">
    <a href="index.php"class="button-30" role="button">Home Page</a>
  </div> <div class="buttoncontainer">
    <a href="profile.php"class="button-30" role="button">Profile</a>
  </div>
  <script>
  function validateForm() {
    var userinput = document.forms[0]["userinput"].value;
    var oldpassword = document.forms[0]["newpassword"].value;
    var newpassword = document.forms[0]["oldpassword"].value;
    var errorElement = document.getElementById("error");

    if (userinput === "" || newpassword === "" || oldpassword === "") {
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