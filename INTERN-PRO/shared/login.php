<?php
    session_start();
    $_SESSION["login_status"]=false;
    $_SESSION['payment']=0;
    $name=$_POST["username"];
    $pass=$_POST["password"];
    $con=new mysqli('localhost','root','','acmeintern',3306);
    $cipherPass=md5($pass);
    $queryResult=mysqli_query($con,"select * from user where username='$name' and password='$cipherPass'");
    if(mysqli_num_rows($queryResult)>0){
        $dbrow=mysqli_fetch_assoc($queryResult);
        $_SESSION["login_status"]=true;
        $_SESSION['usertype']=$dbrow['usertype'];
        $_SESSION['userid']=$dbrow['userID'];
        if($dbrow['usertype']=="Customer"){
            header("location:../customer/home.php");
        }else{
            header("location:../vendor/home.php");
        } 
        $_SESSION['userid']=$dbrow['userID'];
        print_r($_SESSION['userid']);
    }else{
        echo "login failed";
        
    }
?>