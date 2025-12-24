<?php

session_start();

    if(!isset($_SESSION['usermail']))
    {
        header("location:index.php");
    }

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
                    <h3>Total Users</h3>
                    <p>150</p>
                </div>
                <div class="card">
                    <h3>Upcoming Events</h3>
                    <p>12</p>
                </div>
                <div class="card">
                    <h3>Tickets Sold</h3>
                    <p>420</p>
                </div>
                <div class="card">
                    <h3>Revenue</h3>
                    <p>$5200</p>
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
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>01838796365</td>
                    <td>Mohammadpur dhaka 1207</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
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
                    <td>1</td>
                    <td>john@example.com</td>
                    <td>Attendee</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Add order Section -->
        <div id="order" class="section" style="display:none;">
            <h2>Add New Order</h2> <br>
            <form id="event-form">
                <div class="form-group">
                    <label>Event Name:</label>
                    <input type="text" placeholder="Event Name">
                </div>
                <div class="form-group">
                    <label>Customer Name:</label>
                    <input type="text" placeholder="Customer Name">
                </div>
                <div class="form-group">
                    <label>Customer Number:</label>
                    <input type="text" placeholder="Customer Name">
                </div>
                <div class="form-group">
                    <label>Customer Address:</label>
                    <input type="text" placeholder="Customer Address">
                </div>
                <div class="form-group">
                    <label>Date:</label>
                    <input type="date">
                </div>
                <div class="form-group">
                    <label>Time:</label>
                    <input type="time">
                </div>
                <div class="form-group">
                    <label>Venue:</label>
                    <input type="text" placeholder="Venue">
                </div>
                <div class="form-group">
                    <label>Total amount:</label>
                    <input type="text" placeholder="Customer Address">
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea placeholder="Event Description"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Add Event</button>
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
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Birthday</td>
                    <td>Miaji</td>
                    <td>01611820481</td>
                    <td>Mohammadpur, Dhaka-1207</td>
                    <td>12.12.2025</td>
                    <td>10:10AM</td>
                    <td>Bangladesh University</td>
                    <td>10,000BDT </td>
                    <td>Hello do this </td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
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
                <tr>
                    <td>Decoration</td>
                    <td>Music and Photos</td>
                    <td>Food and Drinks</td>
                    <td>Invitation Card</td>
                    <td>100</td>
                    <td>120</td>
                    <td>90</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
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
                <tr>
                    <td>Decoration</td>
                    <td>Music and Photos</td>
                    <td>Food and Drinks</td>
                    <td>Invitation Card</td>
                    <td>100</td>
                    <td>120</td>
                    <td>90</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
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
                <tr>
                    <td>Decoration</td>
                    <td>Music and Photos</td>
                    <td>Food and Drinks</td>
                    <td>Invitation Card</td>
                    <td>100</td>
                    <td>120</td>
                    <td>90</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
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
                <tr>
                    <td>Decoration</td>
                    <td>Music and Photos</td>
                    <td>Food and Drinks</td>
                    <td>Invitation Card</td>
                    <td>100</td>
                    <td>120</td>
                    <td>90</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
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
                <tr>
                    <td>Decoration</td>
                    <td>Music and Photos</td>
                    <td>Food and Drinks</td>
                    <td>Invitation Card</td>
                    <td>100</td>
                    <td>120</td>
                    <td>90</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
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
                <tr>
                    <td>Decoration</td>
                    <td>Music and Photos</td>
                    <td>Food and Drinks</td>
                    <td>Invitation Card</td>
                    <td>100</td>
                    <td>120</td>
                    <td>90</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
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
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>01611820481</td>
                    <td>john@example.com</td>
                    <td>Attendee</td>
                    <td>Attendee</td>
                    <td>Done</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </table>
    
        </div>


    </div>

    <!-- ===== JavaScript ===== -->

    <script src="admin_dashbord.js"></script>

</body>
</html>