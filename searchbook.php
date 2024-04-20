
<?php
ob_start();
if (!isset($_COOKIE["userid"])) {
    echo '<script>alert("You Need To Login To Search Books");</script>';
    echo '<script>window.location.href = "index.php";</script>';
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search A Book</title>
    <link rel="icon" type="image/png" href="IMAGES\SEARC_ICON.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    <style>
        body{
            background-color:
        }
        .form{
            margin:0px auto 0px auto;
            width:75%;
        }
        .bookname{
            margin:0px auto 0px auto;
            width:50%;
            height:60px;
            min-width:170px;
        }
        h1{
            text-align:center;
            margin:20px 0px 0px 0px;
        }
        .submitbtn{
            width:110px;
        }
        .container {
            padding: 20px; 
        }
        .container .row{
            margin:0px;
            padding:0px;
        }
        .col{
            border:1px solid black;
        }
        .row{
            align-items: flex-start;
        }
        .box{
            height:auto;
            width:75%;
            box-sizing: border-box;
            margin:80px auto 30px auto;
            padding-bottom:20px;
            border-radius:20px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
        }
        .box img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width:170px;
            height:200px;
            border-radius:20px;
        }
        .text{
            margin-top:25px;
            text-align:center;
        }

        .button-30 {
            align-items: center;
            appearance: none;
            background-color: #FCFCFD;
            border-radius: 4px;
            border-width: 0;
            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px,rgba(45, 35, 66, 0.3) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
            box-sizing: border-box;
            color: #36395A;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono",monospace;
            height: 35px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: center;
            text-decoration: none;
            transition: box-shadow .15s,transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow,transform;
            font-size: 15px;
        }

        .button-30:focus {
            box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        }

        .button-30:hover {
            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
            transform: translateY(-2px);
            color:blue;
        }

        .button-30:active {
            box-shadow: #D6D6E7 0 3px 7px inset;
            transform: translateY(2px);
        }
        .btn{
            margin-right:15px;
        }
        .homePageButton{
            margin-top:80px;
        }
        footer{
            margin:50px;
        }
        .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 250px;
        height:150px;
        margin-right:auto;
        margin-left:auto;
        border-radius:20px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
        }

        .buttontext{
            margin-top:10px;
            height:50px;
            border-bottom:1px solid black;
            font-family: 'VT323', monospace;
            font-size:25px;
            letter-spacing:1px;
        }

        .button{
            margin-top:0px;
            position: absolute;
            margin-left:28%;
            margin-right:22%;
            font-family: "JetBrains Mono",monospace;
            letter-spacing:1px;
            font-size:25px;   
        }
    </style>
  </head>
  <body>

    <h1 class="title center">Krishna Book Store</h1> <br><br>
    <div class="form">
        <form action="" method="GET">

            <input type="text" placeholder="Enter Book Name" name="userinputbook" class="form-control bookname"> <br><br><br>

            <input type="submit" class="position-absolute start-50 translate-middle btn btn-outline-dark submitbtn" value="Search" name="submitbutton">
        </form>
    </div>

    <div class="container">
        <div class="row d-flex">

        <?php

            $conn = mysqli_connect("localhost", "root", "", "book_store");

            function displayBooks($name,$fullName,$authorName,$posterLocation,$bookLocation){

                echo '<div class="col-lg-4">';
                echo '<div class="w3-card-4 box">';
                echo '<img src="' . $posterLocation . '" title="' .$fullName .' - '. $authorName . '">';
                echo '<div class="w3-container w3-center text">';
                echo '<p>' . $name . '</p>';
                echo '<a href="http://localhost/online-book-store-php/' . $bookLocation . '" class="button-30 btn" role="button" target="_blank">View</a>';
                echo '<a href="http://localhost/online-book-store-php/' . $bookLocation . '" class="button-30" download=' . $fullName . '>Download</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            if (isset($_GET['submitbutton'])) {

                if(empty($_GET['userinputbook'])){

                    echo "<script>alert('Please Enter Keyword Or Book Name To Search');</script>";
                }

                else{

                    if ($conn) {

                        $sql = "SELECT * FROM booksdata";
                        $result1 = mysqli_query($conn, $sql);
    
                        $flag = FALSE;

                        $inputKeyword = $_GET["userinputbook"];
                        $inputKeyword = strtolower($inputKeyword);

                        if(empty($_COOKIE["searchKeywords"])){

                            $inputKeyword = $inputKeyword . ",";
                            setcookie("searchKeywords",$inputKeyword,time() + 3600);
                        }
                        else{
                            
                            $flag = FALSE;

                            $srchKeywords = explode(",",$_COOKIE["searchKeywords"]);

                            foreach($srchKeywords as $kyWord){

                                if(!($kyWord == $inputKeyword)){
                                    $flag = TRUE;
                                }
                            }

                            if($flag){

                                $inputKeyword = $_COOKIE["searchKeywords"] . $inputKeyword . ",";
                                setcookie("searchKeywords",$inputKeyword,time() +3600);
                            }
                                       
                        }

                        while ($data = mysqli_fetch_assoc($result1)) {
                            $keywords = explode(",", $data['keywords']);
    
                            foreach ($keywords as $keyword) {
    
                                $keyword = trim($keyword);
                                $input = strtolower($_GET['userinputbook']);
    
                                if ($input == $keyword) {
    
                                    $flag = TRUE;
                                    displayBooks($data["book_name"],$data["fullname"],$data['author_name'],$data['poster_location'],$data['book_location']);
                                    
                                }
                            }
                        }
    
                        if(!$flag){
    
                            echo "<script>alert('Sorry :) , Book Not Found ');</script>";
                        }
                    }
                } 
            }

            else{

                if(isset($_COOKIE["searchKeywords"])){

                    if ($conn) {

                        
                        $sql = "SELECT * FROM booksdata";                                     
                        $result1 = mysqli_query($conn, $sql);
                                    
                        $displayedBooks = array(); // Array to store displayed book names

                        while ($data = mysqli_fetch_assoc($result1)) {
                            $keywords = explode(",", $data['keywords']);
                            $searchedKeywords = explode(",", $_COOKIE["searchKeywords"]);

                            foreach ($searchedKeywords as $sechKeywrds) {
                                foreach ($keywords as $keyword) {
                                    $sechKeywrds = trim($sechKeywrds);

                                    if ($sechKeywrds == $keyword && !in_array($data['book_name'], $displayedBooks)) {
                                        displayBooks($data["book_name"], $data["fullname"], $data['author_name'], $data['poster_location'], $data['book_location']);
                                        $displayedBooks[] = $data['book_name']; // Add displayed book name to the array
                                    }
                                }
                            }
                        }
                    }
                }  
            }

        ?>

        </div>
    </div>
    <footer>
    <div class="card text-center card-body">
        
            <div class="buttontext">
                <p class="card-text">Return To Home Page</p>
            </div>
          
            <div class="button">
                <button class="btn btn-outline-dark homePageButton" id="homePage">Home</button>
            </div>
    
    </div>

    
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script type="text/javascript">
    document.getElementById("homePage").onclick = function () {
        location.href = "index.php";
    };
</script>
  </body>
</html>