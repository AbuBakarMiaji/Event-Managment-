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


    // edit action
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $type = $_POST['type'] ?? '';

    if ($type === "user") {

        $sql = "UPDATE user SET
            name='{$_POST['name']}',
            phone='{$_POST['phone']}',
            email='{$_POST['email']}',
            password='{$_POST['password']}',
            address='{$_POST['address']}'
            WHERE id='{$_POST['id']}'";

    } else {

        $table = $_POST['table'] ?? '';
        $idColumn = ($table === 'birthday') ? 'sl' : 'id';

        $sql = "UPDATE $table SET
            fac1='{$_POST['fac1']}',
            fac2='{$_POST['fac2']}',
            fac3='{$_POST['fac3']}',
            fac4='{$_POST['fac4']}',
            people='{$_POST['people']}',
            rprice='{$_POST['rprice']}',
            dprice='{$_POST['dprice']}'
            WHERE $idColumn='{$_POST['id']}'";
    }

    $data->query($sql);
    header("Location: admin_dashbord.php");
    exit;
}




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
                    <th>Email</th>
                    <th>Password</th>
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
                    <td> <?php echo "{$info1['email']}"; ?> </td>
                    <td> <?php echo "{$info1['password']}"; ?> </td>
                    <td> <?php echo "{$info1['address']}"; ?> </td>
                      <td>
                        <button class="editBtn  btn btn-primary"
                            data-type="user"
                            data-id="<?= $info1['id']; ?>"
                            data-name="<?= $info1['name']; ?>"
                            data-phone="<?= $info1['phone']; ?>"
                            data-email="<?= $info1['email']; ?>"
                            data-password="<?= $info1['password']; ?>"
                            data-address="<?= $info1['address']; ?>">
                            Edit
                        </button>
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
                        <button class="editBtn btn btn-primary"
                        data-type="event"
                        data-table="birthday"
                        data-id="<?= $birthday['sl']; ?>"
                        data-fac1="<?= $birthday['fac1']; ?>"
                        data-fac2="<?= $birthday['fac2']; ?>"
                        data-fac3="<?= $birthday['fac3']; ?>"
                        data-fac4="<?= $birthday['fac4']; ?>"
                        data-people="<?= $birthday['people']; ?>"
                        data-rprice="<?= $birthday['rprice']; ?>"
                        data-dprice="<?= $birthday['dprice']; ?>">
                        Edit
                        </button>
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
                         <button class="editBtn btn btn-primary"
                        data-type="event"
                        data-table="wedding"
                        data-id="<?= $wedding['id']; ?>"
                        data-fac1="<?= $wedding['fac1']; ?>"
                        data-fac2="<?= $wedding['fac2']; ?>"
                        data-fac3="<?= $wedding['fac3']; ?>"
                        data-fac4="<?= $wedding['fac4']; ?>"
                        data-people="<?= $wedding['people']; ?>"
                        data-rprice="<?= $wedding['rprice']; ?>"
                        data-dprice="<?= $wedding['dprice']; ?>">
                        Edit
                        </button>
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
                         <button class="editBtn btn btn-primary"
                         data-type="event"
                        data-table="concert"
                        data-id="<?= $concert['id']; ?>"
                        data-fac1="<?= $concert['fac1']; ?>"
                        data-fac2="<?= $concert['fac2']; ?>"
                        data-fac3="<?= $concert['fac3']; ?>"
                        data-fac4="<?= $concert['fac4']; ?>"
                        data-people="<?= $concert['people']; ?>"
                        data-rprice="<?= $concert['rprice']; ?>"
                        data-dprice="<?= $concert['dprice']; ?>">
                        Edit
                        </button>
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
                        <button class="editBtn btn btn-primary"
                        data-type="event"
                        data-table="anniversary"
                        data-id="<?= $anniversary['id']; ?>"
                        data-fac1="<?= $anniversary['fac1']; ?>"
                        data-fac2="<?= $anniversary['fac2']; ?>"
                        data-fac3="<?= $anniversary['fac3']; ?>"
                        data-fac4="<?= $anniversary['fac4']; ?>"
                        data-people="<?= $anniversary['people']; ?>"
                        data-rprice="<?= $anniversary['rprice']; ?>"
                        data-dprice="<?= $anniversary['dprice']; ?>">
                        Edit
                        </button>
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
                        <button class="editBtn btn btn-primary"
                        data-type="event"
                        data-table="picnic"
                        data-id="<?= $picnic['id']; ?>"
                        data-fac1="<?= $picnic['fac1']; ?>"
                        data-fac2="<?= $picnic['fac2']; ?>"
                        data-fac3="<?= $picnic['fac3']; ?>"
                        data-fac4="<?= $picnic['fac4']; ?>"
                        data-people="<?= $picnic['people']; ?>"
                        data-rprice="<?= $picnic['rprice']; ?>"
                        data-dprice="<?= $picnic['dprice']; ?>">
                        Edit
                        </button>
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
                        <button class="editBtn btn btn-primary"
                        data-type="event"
                        data-table="others"
                        data-id="<?= $others['id']; ?>"
                        data-fac1="<?= $others['fac1']; ?>"
                        data-fac2="<?= $others['fac2']; ?>"
                        data-fac3="<?= $others['fac3']; ?>"
                        data-fac4="<?= $others['fac4']; ?>"
                        data-people="<?= $others['people']; ?>"
                        data-rprice="<?= $others['rprice']; ?>"
                        data-dprice="<?= $others['dprice']; ?>">
                        Edit
                        </button>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
    
        </div>

<!-- Contact View section -->

        <div id="contact" class="section" style="display:none;">
        
            <table>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Description</th>
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
                </tr>

                <?php
                }
                ?>
            </table>
    
        </div>


    </div>

    <!-- User and event Edit and update Section -->

    <div id="overlay"></div>

<div id="editModal">
    <div class="modalHeader">
        <h3 id="modalTitle">Edit</h3>
        <span id="closeModal">&times;</span>
    </div>

    <form method="POST" action="admin_dashbord.php">

        <!-- Common -->
        <input type="hidden" name="type" id="type">
        <input type="hidden" name="table" id="table">
        <input type="hidden" name="id" id="id">

        <!-- USER FIELDS -->
        <div class="userFields">
            <input type="text" name="name" id="user_name" placeholder="Name">
            <input type="text" name="phone" id="phone" placeholder="Phone">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="text" name="password" id="password" placeholder="Password">
            <textarea name="address" id="address" placeholder="Address"></textarea>
        </div>

        <!-- EVENT FIELDS -->
        <div class="eventFields">
            <input type="text" name="fac1" id="fac1" placeholder="Facility 1">
            <input type="text" name="fac2" id="fac2" placeholder="Facility 2">
            <input type="text" name="fac3" id="fac3" placeholder="Facility 3">
            <input type="text" name="fac4" id="fac4" placeholder="Facility 4">
            <input type="number" name="people" id="people" placeholder="People">
            <input type="number" name="rprice" id="rprice" placeholder="Regular Price">
            <input type="number" name="dprice" id="dprice" placeholder="Discount Price">
        </div>

        <button type="submit">Update</button>
    </form>
</div>

<style>
    
    #overlay{
    display:none;
    position:fixed;
    top:0; left:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.6);
    z-index:999;
    }
    
     #modalOverlay{
        display:none;
        position:fixed;
        top:0; left:0;
        width:100%; height:100%;
        background:rgba(0,0,0,0.6);
        z-index:999;
    }

    #editModal{
        display:none;
        position:fixed;
        top:50%; left:50%;
        transform:translate(-50%, -50%);
        background:#fff;
        width:400px;
        padding:20px;
        z-index:1000;
        border-radius:6px;
    }

    
    .modalHeader{
        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    .modalHeader span{
        cursor:pointer;
        font-size:24px;
    }

    #editModal input,
    #editModal textarea{
        width:100%;
        margin:8px 0;
        padding:8px;
    }

    #editModal button{
        width:100%;
        padding:10px;
        background:#007bff;
        color:#fff;
        border:none;
        cursor:pointer;
    }
</style>

<!-- Java Script part for Edit model -->
 
<script>

const modal = document.getElementById("editModal");
const overlay = document.getElementById("overlay");

document.querySelectorAll(".editBtn").forEach(btn => {
    btn.onclick = () => {

        type.value = btn.dataset.type;
        id.value = btn.dataset.id;

        // Reset
        document.querySelector(".userFields").style.display = "none";
        document.querySelector(".eventFields").style.display = "none";

        if (btn.dataset.type === "user") {
            modalTitle.innerText = "Edit User";
            document.querySelector(".userFields").style.display = "block";

            document.getElementById("user_name").value = btn.dataset.name;
            phone.value = btn.dataset.phone;
            email.value = btn.dataset.email;
            password.value = btn.dataset.password;
            address.value = btn.dataset.address;
        } 
        else {
            modalTitle.innerText = "Edit Event";
            document.querySelector(".eventFields").style.display = "block";

            table.value = btn.dataset.table;
            fac1.value = btn.dataset.fac1;
            fac2.value = btn.dataset.fac2;
            fac3.value = btn.dataset.fac3;
            fac4.value = btn.dataset.fac4;
            people.value = btn.dataset.people;
            rprice.value = btn.dataset.rprice;
            dprice.value = btn.dataset.dprice;
        }

        modal.style.display = overlay.style.display = "block";
    };
});

const closeModal = document.getElementById("closeModal");

closeModal.onclick = overlay.onclick = () => {
    modal.style.display = overlay.style.display = "none";
};

</script>


    <!-- ===== JavaScript ===== -->

    <script src="admin_dashbord.js"></script>

</body>
</html>