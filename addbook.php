<?php
  if( isset( $_POST['submit'])){
    
    $r1 = move_uploaded_file($_FILES['poster']['tmp_name'],"C:/xampp/htdocs/online-book-store-php/POSTER/" . $_POST['book_name'] . ".png");
    $r2 = move_uploaded_file($_FILES['pdf']['tmp_name'],"C:/xampp/htdocs/online-book-store-php/BOOKS_PDF/" . $_POST['book_name'] . ".pdf");

    if($r1 & $r2){

      $conn = mysqli_connect("localhost","root","","book_store");


      $sql = "SELECT * FROM booksdata";
      $reply = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($reply);

      $sql2 = "INSERT INTO booksdata VALUES ('".$_POST['book_name']."','".$_POST['author_name']."','BOOKS_PDF/".$_POST['book_name'] . '.pdf'."','POSTER/".$_POST['book_name'].'.png'."','".$_POST['book_name']."','".$_POST['keywords']."',$count+1)";
      $reply2 = mysqli_query($conn, $sql2);

      echo "<script>alert('File Inserted Successfully');</script>";
    }
    else{
      echo "<script>alert('Something Went Wrong');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="IMAGES/ADD_BOOK.png"/>
    <link rel="stylesheet" href="buttonstyle.css">
    <title>Add Book</title>
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

      body {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        background-color: white;
        font-family: "lato", sans-serif;
      }
      .signupFrm {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .form {
  background-color: white;
  width: 400px;
  border-radius: 8px;
  padding: 20px 40px;
  box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
}

.title {
  font-size: 50px;
  margin-bottom: 50px;
}
.inputContainer {
  position: relative;
  height: 45px;
  width: 90%;
  margin-bottom: 17px;
}
.input {
  position: absolute;
  top: 0px;
  left: 0px;
  height: 100%;
  width: 100%;
  border: 1px solid #DADCE0;
  border-radius: 7px;
  font-size: 16px;
  padding: 0 20px;
  outline: none;
  background: none;
  z-index: 1;
}
::placeholder {
  color: transparent;
}
.label {
  position: absolute;
  top: 15px;
  left: 15px;
  padding: 0 4px;
  background-color: white;
  color: #DADCE0;
  font-size: 16px;
  transition: 0.5s;
  z-index: 0;
}
.submitBtn {
  display: block;
  margin-left: auto;
  padding: 15px 30px;
  border: none;
  background-color: purple;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 30px;
}

.submitBtn:hover {
  background-color: #9867C5;
  transform: translateY(-2px);
}
.input:focus + .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
  color: purple;
}

label.l input[type="file"] {
  position: absolute;
  top: -1000px;
}
.l {
  width:100px;
  height:25px;
  cursor: pointer;
  border: 1px solid #cccccc;
  border-radius: 5px;
  padding: 15px 35px 10px 35px;
  margin: 5px;
  background: #dddddd;
  display: inline-block;
}
.l:hover {
  background: #5cbd95;
}
.l:active {
  background: #9fa1a0;
}
.l:invalid+span {
  color: #000000;
}
.l:valid+span {
  color: #ffffff;
}
    </style>
  </head>

  <body>
  <div class="signupFrm">
    <form action="" method="POST" class="form" enctype="multipart/form-data">
      <h1 class="title">Insert Book</h1>

      <div class="inputContainer">
        <input type="text" name="book_name" class="input" placeholder="a">
        <label for="" class="label">Book Name</label>
      </div>

      <div class="inputContainer">
        <input type="text" name="author_name" class="input" placeholder="a">
        <label for="" class="label">Author Name</label>
      </div>

      <div class="inputContainer">
        <input type="text" name="keywords" class="input" placeholder="a" required>
        <label for="" class="label">Keywords (Comma Seperated)</label>
      </div>

      <div class="inputContainer">
        <label class="l">
                <input type="file" name="poster" required/>
                <span>Book Poster</span>
        </label>
      </div>

      <div class="inputContainer">
        <label class="l">
                <input type="file" name="pdf"required/>
                <span>Book File</span>
        </label>
      </div> <br>

      <input type="submit" name="submit" class="submitBtn" value="Insert">
      <span id="error" class="error"></span>
    </form>
  </div>
  <div class="buttoncontainer">
    <a href="index.php"class="button-30" role="button">Home Page</a>
  </div> <div class="buttoncontainer">
    <a href="admin.php"class="button-30" role="button">Profile</a>
  </div>
  </body>
</html>