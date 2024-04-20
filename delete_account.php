<?php
if(!isset($_COOKIE['userid']) && isset($_COOKIE['password'])){
    echo "<script>alert('You Need To Login To Access This Page !'); window.location.href = 'index.php';</script>";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_COOKIE["userid"])) {
        echo "failure";
    }
    else {
        $conn = mysqli_connect("localhost", "root", "", "book_store");
        if ($conn) {
            $userid = $_COOKIE["userid"];
            $deletesql = "DELETE FROM users WHERE userid = '$userid' OR email = '$userid';";
            $result = mysqli_query($conn, $deletesql);
            if ($result) {
                setcookie("userid", "", time() - 3600);
                setcookie("password", "", time() - 3600);
                
                echo "success";
            } else {
                echo "failure";
            }
        } else {
            echo "database_error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="IMAGES/delete-account.png"/>
    <title>Delete Account</title>
</head>
<body>
    
</body>
</html>