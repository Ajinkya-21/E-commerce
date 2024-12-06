<?php
    session_start();
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $usertype=$_POST['typee'];
    $con=new mysqli("localhost","root","","acmeintern",3306);
    $cipherPass=md5($pass);
    $query="insert into user(username,password,usertype) values('$name','$cipherPass','$usertype')";
    mysqli_query($con,$query);
    $_SESSION["login_status"]=true;
    if($usertype=="Customer"){
        $_SESSION['usertype']='Customer';
        header("location:../customer/home.php");
    }else{
        header("location:../vendor/home.php");
    }
?>