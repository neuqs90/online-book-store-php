<?php
    if(isset($_COOKIE['userid']) && isset($_COOKIE['password'])){

        setcookie("userid", "", time() - 3600);
        setcookie("password", "", time() - 3600);

        echo "<script>alert('Logout Successfully'); window.location.href = 'index.php';</script>";
        exit;
    }
    else{
        exit;
    } 
?>