<?php

error_reporting(0);
session_start();

$host="localhost";
$user="root";
$password="";

$db="event_management";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}


if($_SERVER["REQUEST_METHOD"]== "POST")
{
    $name=$_POST['email'] ?? '';
    $pass=$_POST['password'] ?? '';

    $sql="SELECT * FROM user WHERE email='".$name."'  AND password='".$pass."'  ";

    $result=mysqli_query($data,$sql);

    $row= mysqli_fetch_array($result);


    if ($row["usertype"] == "employee")
    {
        $_SESSION['usermail']=$name;
        header("Location:employeehome.php");
    }


    elseif($row["usertype"]=="admin")
    {
        $_SESSION['usermail']=$name;
        header("Location:admin_dashbord.php");
    }

    else
    {
        $_SESSION['wronglogin']="username or password do not match";
       header("location:index.php");
         
    }
}









?>