<?php



 $host="localhost";
    $user="root";
    $password="";

    $db="event_management";

    $data=mysqli_connect($host,$user,$password,$db);

    if($_GET['order_sl'])
    {
        $user_id=$_GET['order_sl'];

        $sql="DELETE FROM orders WHERE sl='$user_id'";

        $result=mysqli_query($data,$sql);

        if($result)
        {
            header("location: admin_dashbord.php");
        }
    }


?>