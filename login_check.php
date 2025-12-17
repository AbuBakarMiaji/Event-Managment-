<?php

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
        header("Location:employeehome.php");
    }


    elseif($row["usertype"]=="aadmin")
    {
        header("Location:adminhome.php");
    }

    else
    {
        echo "username or password do not match"; 
    }
}









?>