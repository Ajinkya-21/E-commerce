<?php
    session_start();
    $pid=$_GET['pid'];
    include "../shared/connection.php";
    $q=mysqli_query($con,"insert into cart(userid,pid) values($_SESSION[userid],$pid)");
    header("location:home.php")
?>