<?php
session_start();
include "db.php";

$sl = intval($_POST['sl']);
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$description = $_POST['description'];
$status = $_POST['status'];

$sql = "UPDATE contact SET
        name='$name',
        phone='$phone',
        email='$email',
        subject='$subject',
        description='$description',
        status='$status'
        WHERE sl=$sl";

if(mysqli_query($data, $sql)){
    $_SESSION['message'] = "Contact updated successfully";
}else{
    $_SESSION['message'] = "Update failed";
}

header("location:admin_dashboard.php");
