<?php

    session_start();
    session_destroy();

    if(isset($_SESSION['message']))
    {
        $message=$_SESSION['message'];


        echo "<script type='text/javascript'>

        alert('$message');
        
        </script>";
    }
  
    $host="localhost";
    $user="root";
    $password="";

    $db="event_management";

    $data=mysqli_connect($host,$user,$password,$db);

    $sql="SELECT * from contact";
    $result=mysqli_query($data, $sql);

    $sql1="SELECT * from user";
    $result1=mysqli_query($data, $sql1);

    $sql2="SELECT * from orders";
    $result2=mysqli_query($data, $sql2);

    $sql_anni="SELECT * from anniversary";
    $result_anni=mysqli_query($data, $sql_anni);

    $sql_bir="SELECT * from birthday";
    $result_bir=mysqli_query($data, $sql_bir);

    $sql_conc="SELECT * from concert";
    $result_conc=mysqli_query($data, $sql_conc);

    $sql_pic="SELECT * from picnic";
    $result_pic=mysqli_query($data, $sql_pic);

    $sql_wed="SELECT * from wedding";
    $result_wed=mysqli_query($data, $sql_wed);

    $sql_others="SELECT * from others";
    $result_others=mysqli_query($data, $sql_others);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashbord.css">  
</head>
<body>

    <!-- ===== Sidebar ===== -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li onclick="showSection('dashboard')">Dashboard</li>
            <li onclick="showSection('account')">My Account</li>
            <li onclick="showSection('order')">Add New Order</li>
            <li onclick="showSection('orders')">View Orders</li>
            <li onclick="showSection('packages')">Event Packages</li>
            <li onclick="showSection('contact')">View Contact</li>
            <li onclick="window.location.href='logout.php'">Logout</li>
        </ul>
    </div>

    <!-- ===== Main Content ===== -->
    <div class="main-content">
        <div class="header">
            <h1 id="section-title">Dashboard</h1>
            <span>Admin</span>
        </div>

        <!-- Dashboard Cards -->
        <div id="dashboard" class="section">
            <div class="cards">
                
                <div class="card">
                    <h3>Revenue</h3>
                    <p>BDT 5200</p>
                </div>

                <div class="card">
                    <h3>Total Event</h3>
                    <p>200</p>
                </div>

                <div class="card">
                    <h3>Active Event</h3>
                    <p>200</p>
                </div>

                <div class="card">
                    <h3>Complete Event</h3>
                    <p>200</p>
                </div>

                <div class="card">
                    <h3>Delete Event</h3>
                    <p>200</p>
                </div>

                <div class="card">
                    <h3>Inactive Event</h3>
                    <p>200</p>
                </div>

                <div class="card">
                    <h3>Panding Event</h3>
                    <p>200</p>
                </div>
            </div>
        </div>

        <!-- My account Section -->
         <div id="account" class="section" style="display:none;">
            <h3>Account Details</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php
                while($info1=$result1 -> fetch_assoc())
                {
                ?>

                <tr>
                    <td> <?php echo "{$info1['id']}"; ?> </td>
                    <td> <?php echo "{$info1['name']}"; ?> </td>
                    <td> <?php echo "{$info1['phone']}"; ?> </td>
                    <td> <?php echo "{$info1['address']}"; ?> </td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                </tr>


            </table>
            <br><br><br><br>

            <h3>User and Password </h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>

               
                <tr>
                    <td> <?php echo "{$info1['id']}"; ?> </td>
                    <td> <?php echo "{$info1['email']}"; ?> </td>
                    <td> <?php echo "{$info1['password']}"; ?> </td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                </tr>
                <?php
                }
                ?>

            </table>
        </div>

        <!-- Add order Section -->
        <div id="order" class="section" style="display:none;">
            <h2>Add New Order</h2> <br>

            <form id="event-form" action="order_data_input.php" method="POST">
                <div class="form-group">
                    <label>Event Name:</label>
                    <input type="text" name="ename" placeholder="Event Name">
                </div>
                <div class="form-group">
                    <label>Customer Name:</label>
                    <input type="text" name="cname" placeholder="Customer Name">
                </div>
                <div class="form-group">
                    <label>Customer Number:</label>
                    <input type="text" name="cnumber" placeholder="Customer Name">
                </div>
                <div class="form-group">
                    <label>Customer Address:</label>
                    <input type="text" name="address" placeholder="Customer Address">
                </div>
                <div class="form-group">
                    <label>Date:</label>
                    <input type="date" name="date">
                </div>
                <div class="form-group">
                    <label>Time:</label>
                    <input type="time" name="time">
                </div>
                <div class="form-group">
                    <label>Venue:</label>
                    <input type="text" name="venue" placeholder="Venue">
                </div>
                <div class="form-group">
                    <label>Total amount:</label>
                    <input type="text" name="amount" placeholder="Customer Address">
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea name="description" placeholder="Event Description"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-success">Add Event</button>
            </form>
        </div> 

        <!-- View Order Section -->

        <div id="orders" class="section" style="display:none;">
            
            <br>
            <h2>Total Orders</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Customer Name</th>
                    <th>Customer Number</th>
                    <th>Customer Address</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Event Venue</th>
                    <th>Total Amount</th>
                    <th>Event Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php
                while($info2=$result2 -> fetch_assoc())
                {
                ?>
                <tr>
                     <td> <?php echo "{$info2['sl']}"; ?> </td>
                     <td> <?php echo "{$info2['e_name']}"; ?> </td>
                     <td> <?php echo "{$info2['c_name']}"; ?> </td>
                     <td> <?php echo "{$info2['c_number']}"; ?> </td>
                     <td> <?php echo "{$info2['c_address']}"; ?> </td>
                     <td> <?php echo "{$info2['date']}"; ?> </td>
                     <td> <?php echo "{$info2['time']}"; ?> </td>
                     <td> <?php echo "{$info2['venue']}"; ?> </td>
                     <td> <?php echo "{$info2['amount']}"; ?> </td>
                     <td> <?php echo "{$info2['description']}"; ?> </td>
                     <td> <?php echo "{$info2['status']}"; ?> </td>
                    
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <a href="delete.php?order_sl=<?php echo $info2['sl']; ?>" 
                        class="btn btn-danger" 
                        onclick="return confirm('Are you sure to delete this?');"> Delete </a>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
        </div>


        <!-- Packages Section -->
        <div id="packages" class="section" style="display:none;">
            
            <h2>For Birthday</h2>
            <table>
                <tr>
                    <th>Facility-1</th>
                    <th>Facility-2</th>
                    <th>Facility-3</th>
                    <th>Facility-4</th>
                    <th>Number of People</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Action</th>
                </tr>
                
                <?php
                while($birthday=$result_bir -> fetch_assoc())
                {
                ?>
                <tr>
                    <td> <?php echo "{$birthday['fac1']}"; ?> </td>
                    <td> <?php echo "{$birthday['fac2']}"; ?> </td>
                    <td> <?php echo "{$birthday['fac3']}"; ?> </td>
                    <td> <?php echo "{$birthday['fac4']}"; ?> </td>
                    <td> <?php echo "{$birthday['people']}"; ?> </td>
                    <td> <?php echo "{$birthday['rprice']}"; ?> </td>
                    <td> <?php echo "{$birthday['dprice']}"; ?> </td>
                    
                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
            
            <h2>For Wedding</h2>
            <table>
                <tr>
                    <th>Facility-1</th>
                    <th>Facility-2</th>
                    <th>Facility-3</th>
                    <th>Facility-4</th>
                    <th>Number of People</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Action</th>
                </tr>

                <?php
                while($wedding=$result_wed -> fetch_assoc())
                {
                ?>
                <tr>
                    <td> <?php echo "{$wedding['fac1']}"; ?> </td>
                    <td> <?php echo "{$wedding['fac2']}"; ?> </td>
                    <td> <?php echo "{$wedding['fac3']}"; ?> </td>
                    <td> <?php echo "{$wedding['fac4']}"; ?> </td>
                    <td> <?php echo "{$wedding['people']}"; ?> </td>
                    <td> <?php echo "{$wedding['rprice']}"; ?> </td>
                    <td> <?php echo "{$wedding['dprice']}"; ?> </td>
                    
                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
            
            <h2>For Concert</h2>
            <table>
                <tr>
                    <th>Facility-1</th>
                    <th>Facility-2</th>
                    <th>Facility-3</th>
                    <th>Facility-4</th>
                    <th>Number of People</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Action</th>
                </tr>

                   <?php
                while($concert=$result_conc -> fetch_assoc())
                {
                ?>
                <tr>
                    <td> <?php echo "{$concert['fac1']}"; ?> </td>
                    <td> <?php echo "{$concert['fac2']}"; ?> </td>
                    <td> <?php echo "{$concert['fac3']}"; ?> </td>
                    <td> <?php echo "{$concert['fac4']}"; ?> </td>
                    <td> <?php echo "{$concert['people']}"; ?> </td>
                    <td> <?php echo "{$concert['rprice']}"; ?> </td>
                    <td> <?php echo "{$concert['dprice']}"; ?> </td>
                    
                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
            
            <h2>For Anniversary</h2>
            <table>
                <tr>
                    <th>Facility-1</th>
                    <th>Facility-2</th>
                    <th>Facility-3</th>
                    <th>Facility-4</th>
                    <th>Number of People</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Action</th>
                </tr>
                <?php
                while($anniversary=$result_anni -> fetch_assoc())
                {
                ?>
                <tr>
                    <td> <?php echo "{$anniversary['fac1']}"; ?> </td>
                    <td> <?php echo "{$anniversary['fac2']}"; ?> </td>
                    <td> <?php echo "{$anniversary['fac3']}"; ?> </td>
                    <td> <?php echo "{$anniversary['fac4']}"; ?> </td>
                    <td> <?php echo "{$anniversary['people']}"; ?> </td>
                    <td> <?php echo "{$anniversary['rprice']}"; ?> </td>
                    <td> <?php echo "{$anniversary['dprice']}"; ?> </td>
                    
                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
            
            <h2>For Picnic</h2>
            <table>
                <tr>
                    <th>Facility-1</th>
                    <th>Facility-2</th>
                    <th>Facility-3</th>
                    <th>Facility-4</th>
                    <th>Number of People</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Action</th>
                </tr>

                 <?php
                while($picnic=$result_pic -> fetch_assoc())
                {
                ?>
                <tr>
                    <td> <?php echo "{$picnic['fac1']}"; ?> </td>
                    <td> <?php echo "{$picnic['fac2']}"; ?> </td>
                    <td> <?php echo "{$picnic['fac3']}"; ?> </td>
                    <td> <?php echo "{$picnic['fac4']}"; ?> </td>
                    <td> <?php echo "{$picnic['people']}"; ?> </td>
                    <td> <?php echo "{$picnic['rprice']}"; ?> </td>
                    <td> <?php echo "{$picnic['dprice']}"; ?> </td>
                    
                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
            
            <h2>Others Event</h2>
            <table>
                <tr>
                    <th>Facility-1</th>
                    <th>Facility-2</th>
                    <th>Facility-3</th>
                    <th>Facility-4</th>
                    <th>Number of People</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Action</th>
                </tr>
                <?php
                while($others=$result_others -> fetch_assoc())
                {
                ?>
                <tr>
                    <td> <?php echo "{$others['fac1']}"; ?> </td>
                    <td> <?php echo "{$others['fac2']}"; ?> </td>
                    <td> <?php echo "{$others['fac3']}"; ?> </td>
                    <td> <?php echo "{$others['fac4']}"; ?> </td>
                    <td> <?php echo "{$others['people']}"; ?> </td>
                    <td> <?php echo "{$others['rprice']}"; ?> </td>
                    <td> <?php echo "{$others['dprice']}"; ?> </td>
                    
                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
    
        </div>

<!-- Contact View section -->

        <div id="contact" class="section" style="display:none;">
            <h2>Event Packages Managment</h2>
        
            <table>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php

                while($info=$result->fetch_assoc())
                {
                ?>

                <tr>
                    <td> <?php echo "{$info['sl']}"; ?></td>
                    <td><?php echo "{$info['name']}"; ?></td>
                    <td><?php echo "{$info['phone']}"; ?></td>
                    <td><?php echo "{$info['email']}"; ?></td>
                    <td><?php echo "{$info['subject']}"; ?></td>
                    <td><?php echo "{$info['description']}"; ?></td>
                    <td><?php echo "{$info['status']}"; ?></td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
    
        </div>


    </div>

    <!-- ===== JavaScript ===== -->

    <script src="admin_dashbord.js"></script>

</body>
</html>