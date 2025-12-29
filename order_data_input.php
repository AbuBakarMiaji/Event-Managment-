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
    $d_ename=$_POST['ename'];
    $d_cname=$_POST['cname'];
    $d_cnumber=$_POST['cnumber'];
    $d_address=$_POST['address'];
    $d_date=$_POST['date'];
    $d_time=$_POST['time'];
    $d_venue=$_POST['venue'];
    $d_amount=$_POST['amount'];
    $d_description=$_POST['description'];

    $sql="INSERT INTO orders(e_name,c_name,c_number,c_address,date,time,venue,amount,description) VALUES ('$d_ename', '$d_cname', '$d_cnumber','$d_address','$d_date','$d_time','$d_venue','$d_amount','$d_description' )";

    $result=mysqli_query($data,$sql);
    
    if($result)
    {
       $_SESSION['message']="You are submitted successfully";
       header("location:admin_dashbord.php");
    }

    else
    {
        echo "Submited Failed";
    }

}



?>