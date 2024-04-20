<?php
    if(isset ($_COOKIE['admin_userid'])){
        setcookie("admin_userid","",time() - 36000);
        setcookie("admin_password","",time() - 3600);

        echo "<script>alert('Admin Logout Successfully'); window.location.href = 'index.php';</script>";
        exit;
    }
    else{
        exit;
    }
?>