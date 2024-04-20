<?php
if(!(isset($_COOKIE['admin_userid']) && isset($_COOKIE['admin_password']))){
    echo "<script>alert('You Need To Login To Access This Page'); window.location.href = 'adminlogin.php';</script>";
    exit;
} else {
    $conn = mysqli_connect("localhost", "root", "", "book_store");   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="IMAGES/ADMIN.png"/>
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Cantarell' rel='stylesheet'>

  <style>
    
    .container {
      margin-top: 50px;
    }

    img {
      height: 200px;
      width: 200px;
      border-radius: 100px;
      outline: 1px dotted black;
      outline-offset: 5px;
    }

    .text {
      display: flex;
      align-items: center; 
    }

    .text p {
      font-size: 25px;
      margin-left:auto;
      margin-right:auto;
      font-family: 'Cantarell';
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      width: 280px;
      height: 170px;
      margin-right: auto;
      margin-left: auto;
      margin-top:110px;
      border-radius: 20px;
      margin-bottom:60px;
      box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
    }

    .buttontext {
      margin-top: 10px;
      height: 50px;
      border-bottom: 1px solid black;
      font-family: 'VT323', monospace;
      font-size: 20px;
      letter-spacing: 1px;
      padding-bottom: 60px;
    }

    .button {
      margin-top: 15px;
      position: absolute;
      margin-left: 28%;
      margin-right: 22%;
      font-family: "JetBrains Mono", monospace;
      letter-spacing: 1px;
      font-size: 25px;
    }

    .btn {
      margin-right: 15px;
    }

    .homePageButton {
      margin-top: 80px;
    }

    @media (max-width: 991.98px) {
      img {
        height: 100px;
        width: 100px;
      }

      .text {
        margin-top: 60px;
      }

      .text p{
        margin-bottom:0px;
        font-size: 18px;
        margin-left:auto;
        margin-right:auto;
      }

      .card {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top:50px;
      }

      .buttontext {
        margin-top: 20px; 
        margin-bottom: 20px; 
      }

      .button {
        margin-top: 20px;
      }
    }
  </style>
</head>
<body>
    <?php
    
    if($conn){
        $sql = "SELECT userid FROM admin WHERE email = '". $_COOKIE["admin_userid"] ."' OR userid = '". $_COOKIE["admin_userid"] . "';";
        $result = mysqli_query($conn,$sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            $a = scandir("./PROFILES");
            $c = 0;

            foreach ($a as $item=>$name) {
                if (str_contains($name, ".jpg")) {
                    $c++;
                }
            }
            $randomnum = rand(1,$c);
        }
    }
    ?>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 text-center">
        <img src="PROFILES/profile<?php echo $randomnum . ".jpg"; ?>">
      </div>
      <div class="col-12 col-md-6 text">
        <p>Welcome Admin : @<?php echo $row["userid"];?></p>
        
      </div>
    </div>
  </div>

  <!-- for other options -->

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <!-- container -->
        <div class="card text-center card-body">
            
            <div class="buttontext">
                <p class="card-text">Add Book</p>
            </div>
          
            <div class="button">
                <button class="btn btn-outline-dark homePageButton" id="addBook">Add</button>
            </div>

        </div>

      </div>

      <div class="col-12 col-md-6">
        <div class="card text-center card-body">
              <!-- container -->
              <div class="buttontext">
                  <p class="card-text">Delete Book</p>
              </div>
            
              <div class="button">
                  <button class="btn btn-outline-dark homePageButton" id="deleteBook">Delete</button>
              </div>

          </div>
        </div>
    </div>

<!-- 2nd row -->
    <div class="row">
      <div class="col-12 col-md-6">
        <!-- container -->
        <div class="card text-center card-body">
            
            <div class="buttontext">
                <p class="card-text">Logout Account</p>
            </div>
          
            <div class="button">
                <button class="btn btn-outline-dark homePageButton" id="logout">Logout</button>
            </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="card text-center card-body">
              <!-- container -->
              <div class="buttontext">
                  <p class="card-text">Home Page</p>
              </div>
            
              <div class="button">
                  <button class="btn btn-outline-dark homePageButton" id="homePage">Home</button>
              </div>
          </div>
        </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script>
    document.getElementById("addBook").onclick = function() {
        location.href = "addbook.php";
    };

    document.getElementById("deleteBook").onclick = function() {
        location.href = "deletebook.php";
    };
    document.getElementById("logout").onclick = function() {
        location.href = "logoutadmin.php";
    };
    document.getElementById("homePage").onclick = function() {
        location.href = "index.php";
    };
</script>
</body>
</html>