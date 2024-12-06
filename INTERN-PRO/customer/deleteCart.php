<?php
    $cartid=$_GET['cartid'];
    session_start();
    include "../shared/connection.php";
    mysqli_query($con,"delete from cart where cartid=$cartid");
    header("location:viewCart.php");
?>