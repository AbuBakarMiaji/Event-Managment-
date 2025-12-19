<?php

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


if(isset($_POST['submit']))
{
    $data_name=$_POST['name'];
    $data_number=$_POST['number'];
    $data_email=$_POST['email'];
    $data_subject=$_POST['subject'];
    $data_description=$_POST['description'];


    $sql="INSERT INTO contact(name,phone,email,subject,description) VALUES ('$data_name','$data_number','$data_email', '$data_subject', '$data_description')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
       $_SESSION['message']="You are submitted successfully";
       header("location:index.php");
    }

    else
    {
        echo "Submited Failed";
    }
}


?>