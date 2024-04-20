<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="IMAGES/DELETE_BOOK.png"/>
    <link rel="stylesheet" href="buttonstyle.css">
    <title>Delete Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body{
            background-color:
        }
        .form{
            margin:100px auto 0px auto;
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
            padding: 20px; /* Add padding to create space around the cards */
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
    </style>
</head>
<body>

<div class="form">
    <form action="" method="post">

        <input type="text" placeholder="Enter Book Name" name="userinputbook" class="form-control bookname"> <br><br><br>

        <input type="submit" class="position-absolute start-50 translate-middle btn btn-outline-dark submitbtn" value="Search" name="submitbutton">
    </form>
</div>


<div class="container">
    <div class="row d-flex">
    <?php
if (isset($_POST['submitbutton'])) {
    $conn = mysqli_connect("localhost", "root", "", "book_store");
    if ($conn) {
        $sql = "SELECT * FROM booksdata";
        $result1 = mysqli_query($conn, $sql);

        while ($data = mysqli_fetch_assoc($result1)) {
            $keywords = explode(",", $data['keywords']);

            foreach ($keywords as $keyword) {
                $keyword = trim($keyword);
                $input = strtolower($_POST['userinputbook']);
                if ($input == $keyword) {
                    echo '<div class="col-lg-4">';
                    echo '<div class="w3-card-4 box">';
                    echo '<img src="' . $data['poster_location'] . '" title="' .$data['fullname'] .' BY '. $data['author_name'] . '">';
                    echo '<div class="w3-container w3-center text">';
                    echo '<p>' . $data['book_name'] . '</p>';
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="bookId" value="' . $data['id'] . '">';
                    echo '<button type="submit" class="button-30" name="deleteButton">Delete</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        }
    }
}

if (isset($_POST['deleteButton'])) {
    $bookId = $_POST['bookId'];
    $conn = mysqli_connect("localhost", "root", "", "book_store");
    if ($conn) {

        $sql1 = "SELECT booklocation,poster_location FROM booksdata WHERE id = " . $bookId;
        $reply1 = mysqli_query($conn,$sql1);
        $row = mysqli_fetch_assoc($reply1);
        if(file_exists($row['booklocation'])){
            unlink($row['booklocation']);
        }

        $sql2 = "DELETE FROM booksdata WHERE id = '$bookId'";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            echo "<script>alert('Book Deleted Successfully');</script>";
        }
    }
}
?>
    </div>
</div>

<div class="buttoncontainer">
    <a href="index.php"class="button-30" role="button">Home Page</a>
  </div> <div class="buttoncontainer">
    <a href="admin.php"class="button-30" role="button">Profile</a>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>