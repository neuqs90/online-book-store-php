<?php
  if(!isset($_COOKIE['userid']) && isset($_COOKIE['password'])){
        echo "<script>alert('You Need To Login To Access This Page'); window.location.href = 'index.php';</script>";
        exit;
  }

  else{

    if(isset($_POST['submit'])){

        $conn = mysqli_connect("localhost","root","","book_store");

        if($conn){
            $olduserid = $_POST['olduserid'];
            $newusername = $_POST['newusername'];
            $password = $_POST['password'];
        
            $sql = "SELECT * FROM users;";
            $result = mysqli_query($conn,$sql);

            $flag1 = FALSE;
            $flag2 = FALSE;

            while($row = mysqli_fetch_assoc($result)){
                // check if user actually exists or not
                if(($row["userid"] == $olduserid) || $row["email"] == $olduserid){
                    $flag1 = TRUE;

                    //  check if password is correct or not
                    if($row["password"] == $password){
                        $flag2 = TRUE;

                        $updatesql = "UPDATE users SET userid = '$newusername' WHERE userid = '$olduserid' OR email = '$olduserid';";
                        $updateresult = mysqli_query($conn,$updatesql);
                        if($updateresult){
                            // after updating password redirected to profile.
                            setcookie("userid",$newusername,time() + 60 * 60);
                            echo "<script>alert('Username Changed Successfully'); window.location.href = 'profile.php';</script>";
                        }
                        else{
                            // if password not update 
                            echo "<script>alert('Username Cannot Changed , Something Went Wrong From Our Side');</script>";
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
    <link rel="icon" type="image/png" href="IMAGES/CHANGE_USERNAME.png"/>
    <title>Change Username</title>
    <link rel="stylesheet" href="formstyle.css">
    <link rel="stylesheet" href="buttonstyle.css">
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
    </style>
  </head>

  <body>
  <div class="signupFrm">
    <form action="" method="POST" class="form" onsubmit="return validateForm()">
      <h1 class="title">Chang Username</h1>

      <div class="inputContainer">
        <input type="text" name="olduserid" class="input" placeholder="a" required>
        <label for="" class="label">Old Username Or Email</label>
      </div>

      <div class="inputContainer">
        <input type="text" name="newusername" class="input" placeholder="a" required>
        <label for="" class="label">New Username</label>
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
    <a href="index.php"class="button-30" role="button">Home Page</a>
  </div> <div class="buttoncontainer">
    <a href="admin.php"class="button-30" role="button">Profile</a>
  </div>
  <script>
  function validateForm() {
    var olduserid = document.forms[0]["oldusername"].value;
    var newusername = document.forms[0]["newusername"].value;
    var password = document.forms[0]["oldpassword"].value;
    var errorElement = document.getElementById("error");

    if (olduserid === "" || newusername === "" || password === "") {
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