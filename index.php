<?php
    
    error_reporting(0);
    session_start();
    session_destroy();

    if($_SESSION['message'])
    {
        $message=$_SESSION['message'];


        echo "<script type='text/javascript'>

        alert('$message');
        
        </script>";
    }

    if($_SESSION['wronglogin'])
    {
        $wronglogin=$_SESSION['wronglogin'];


        echo "<script type='text/javascript'>

        alert('$wronglogin');
        
        </script>";
    }


    $host="localhost";
    $user="root";
    $password="";

    $db="event_management";

    $data=mysqli_connect($host,$user,$password,$db);

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
    <title>Event Managment Site </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>

    <!--Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!--Custom Css File link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
    <!-- Header Section start -->

    <header>

        <div id="menu-ber" class="fas fa-bars"></div>

        <a href="#" class="logo"> <span>PLAN</span>Pro</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#services">services</a>
            <a href="#packages">Packages</a>
            <a href="#gallery">Gallery</a>
            <a href="#review">Review</a>
            <a href="#contact">Contact</a>
        </nav>

        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div>

        <form action="" class="search-bar-container">
            <input type="search" id="search-br" placeholder="search here...">
            <label for="search-bar" class="fas fa-search"></label>
        </form>

    </header>

    <!-- Header Section end -->

    <!-- Login form container -->

<div class="login-form-container">
 
        <i class="fas fa-times" id="form-close"></i>

        <form action="login_check.php" method="POST">
            <h3>Login</h3>
            <input type="email" class="box" name="email" placeholder="Enter your email" required>
            <input type="password" class="box" name="password" placeholder="Enter your password" required>
            <input type="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">remember me </label>
            <p>Forget password? <a href="#">Click here</a></p>
            <p>don't have an account? <a href="#">register now</a></p>

        </form>
    </div>

<!-- Home Section Start  -->

<section class="home" id="home">
    <div class="content">
        <h3> Every Event Is Worthwhile</h3>
        <p> Discover unforgettable moments with us</p>
        <a href="#" class="btn"> Discover More</a>
    </div>

    <div class="controls">
        <span class="vid-btn active" data-src="images/vid-1.mp4"></span>
        <span class="vid-btn " data-src="images/vid-2.mp4"></span>
        <span class="vid-btn " data-src="images/vid-3.mp4"></span>
        <span class="vid-btn" data-src="images/vid-4.mp4"></span>
        <span class="vid-btn" data-src="images/vid-5.mp4"></span>
    </div>

    <div class="video-container">
        <video src="images/vid-1.mp4" id="video-slider" loop autoplay muted></video>
    </div>



</section>

<!-- Home Section End -->

<!-- Services section Start -->
<section class="services" id="services">

     <h1 class="heading">
        <span>s</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-hotel"></i>
            <h3> Event Venue Selection</h3>
            <p> We help you find the perfect venue for your event by matching your budget, location, capacity, and style. </p>
        </div>

         <div class="box">
            <i class="fas fa-envelope-open-text"></i>
            <h3> invitation card</h3>
            <p> A beautifully designed invitation card that shares essential event details such as date, location, and purpose, helping guests feel welcomed and informed at a glance.</p>
        </div>

        <div class="box">
            <i class="fas fa-utensils"></i>
            <h3> Food and Drinks</h3>
            <p> We offer a variety of delicious meals, snacks, desserts, and drinks, bringing fresh flavors and great taste to every occasion.</p>
        </div>

        <div class="box">
            <i class="fas fa-music"></i>
            <h3> Entertainment</h3>
            <p> We provide music, games, and fun activities to make every event program lively, enjoyable, and memorable for all guests.</p>
        </div>

        <div class="box">
            <i class="fas fa-video"></i>
            <h3> Photos & Videos </h3>
            <p> We capture beautiful photos and high-quality videos to preserve every special and memorable moment of your events.</p>
        </div>

        <div class="box">
            <i class="fas fa-wine-glass"></i>
            <h3> Custom Foods </h3>
            <p> We prepare personalized meals and treats to suit your taste and event theme.</p>
        </div>

    </div>

</section>

<!-- Services section End -->

<!-- Packages Section Start  -->
<section class="packages" id="packages">
    <h1 class="heading">
        <span>p</span>
        <span>a</span>
        <span>c</span>
        <span>k</span>
        <span>a</span>
        <span>g</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/p-1.jpg" alt="">
            <div class="content">
                <h3>For Birthday</h3>
                
                <?php
                while($birthday=$result_bir -> fetch_assoc())
                {
                ?>
                <ul>
                <p><?php echo "{$birthday['fac1']}"; ?></p>
                <p><?php echo "{$birthday['fac2']}"; ?></p>
                <p><?php echo "{$birthday['fac3']}"; ?></p>
                <p><?php echo "{$birthday['fac4']}"; ?></p>
                <p>For <?php echo "{$birthday['people']}"; ?> Peoples</p>
                </ul>

                <div class="price">BDT <?php echo "{$birthday['dprice']}"; ?> <span> BDT <?php echo "{$birthday['rprice']}"; ?></span></div>

                 <?php
                }
                ?>
                <a href="#" class="btn">Book now</a>
            </div>
        </div>
        
        <div class="box">
            <img src="images/p-2.jpg" alt="">
            <div class="content">
                <h3>for wedding</h3>
                <?php
                while($wedding=$result_wed -> fetch_assoc())
                {
                ?>
                <ul>
                <p><?php echo "{$wedding['fac1']}"; ?></p>
                <p><?php echo "{$wedding['fac2']}"; ?></p>
                <p><?php echo "{$wedding['fac3']}"; ?></p>
                <p><?php echo "{$wedding['fac4']}"; ?></p>
                <p>For <?php echo "{$wedding['people']}"; ?> Peoples</p>
                </ul>

                <div class="price">BDT <?php echo "{$wedding['dprice']}"; ?> <span> BDT <?php echo "{$wedding['rprice']}"; ?></span></div>

                 <?php
                }
                ?>
                <a href="#" class="btn">Book now</a>
            </div>
        </div>

        <div class="box">
            <img src="images/p-3.jpg" alt="">
            <div class="content">
                <h3>for concert</h3>
                <?php
                while($concert=$result_conc -> fetch_assoc())
                {
                ?>
                <ul>
                <p><?php echo "{$concert['fac1']}"; ?></p>
                <p><?php echo "{$concert['fac2']}"; ?></p>
                <p><?php echo "{$concert['fac3']}"; ?></p>
                <p><?php echo "{$concert['fac4']}"; ?></p>
                <p>For <?php echo "{$concert['people']}"; ?> Peoples</p>
                </ul>

                <div class="price">BDT <?php echo "{$concert['dprice']}"; ?> <span> BDT <?php echo "{$concert['rprice']}"; ?></span></div>

                 <?php
                }
                ?>
                
                <a href="#" class="btn">Book now</a>
            </div>
        </div>

        <div class="box">
            <img src="images/p-4.jpg" alt="">
            <div class="content">
                <h3>for anniversary</h3>
                <?php
                while($anniversary=$result_anni -> fetch_assoc())
                {
                ?>
                <ul>
                <p><?php echo "{$anniversary['fac1']}"; ?></p>
                <p><?php echo "{$anniversary['fac2']}"; ?></p>
                <p><?php echo "{$anniversary['fac3']}"; ?></p>
                <p><?php echo "{$anniversary['fac4']}"; ?></p>
                <p>For <?php echo "{$anniversary['people']}"; ?> Peoples</p>
                </ul>

                <div class="price">BDT <?php echo "{$anniversary['dprice']}"; ?> <span> BDT <?php echo "{$anniversary['rprice']}"; ?></span></div>

                 <?php
                }
                ?>
                
                <a href="#" class="btn">Book now</a>
            </div>
        </div>

        <div class="box">
            <img src="images/p-5.jpg" alt="">
            <div class="content">
                <h3>for picnic</h3>
                <?php
                while($picnic=$result_pic -> fetch_assoc())
                {
                ?>
                <ul>
                <p><?php echo "{$picnic['fac1']}"; ?></p>
                <p><?php echo "{$picnic['fac2']}"; ?></p>
                <p><?php echo "{$picnic['fac3']}"; ?></p>
                <p><?php echo "{$picnic['fac4']}"; ?></p>
                <p>For <?php echo "{$picnic['people']}"; ?> Peoples</p>
                </ul>

                <div class="price">BDT <?php echo "{$picnic['dprice']}"; ?> <span> BDT <?php echo "{$picnic['rprice']}"; ?></span></div>

                 <?php
                }
                ?>
                
                <a href="#" class="btn">Book now</a>
            </div>
        </div>

        <div class="box">
            <img src="images/p-6.jpg" alt="">
            <div class="content">
                <h3>others Event</h3>
                <?php
                while($others=$result_others -> fetch_assoc())
                {
                ?>
                <ul>
                <p><?php echo "{$others['fac1']}"; ?></p>
                <p><?php echo "{$others['fac2']}"; ?></p>
                <p><?php echo "{$others['fac3']}"; ?></p>
                <p><?php echo "{$others['fac4']}"; ?></p>
                <p>For <?php echo "{$others['people']}"; ?> Peoples</p>
                </ul>

                <div class="price">BDT <?php echo "{$others['dprice']}"; ?> <span> BDT <?php echo "{$others['rprice']}"; ?></span></div>

                 <?php
                }
                ?>
                
                <a href="#" class="btn">Book now</a>
            </div>
        </div>

        
    </div>


</section>

<!-- Packages Section end -->

<!-- Gallary Section Start -->
 <section class="gallery" id="gallery">
    
    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>a</span>
        <span>r</span>
        <span>y</span>
    </h1>

    <div class="box-container">
        <div class="box">
            <img src="images/g-1.jpg" alt="">
            <div class="content">
                <h3>Amazing event </h3>
                <p>your special moments into unforgettable experiences</p>
                <a href="#" class="btn">See More</a>
            </div>

        </div>

        <div class="box">
            <img src="images/g-2.jpg" alt="">
            <div class="content">
                <h3>Amazing Event </h3>
                <p>your special moments into unforgettable experiences</p>
                 <a href="#" class="btn">See More</a>
            </div>

        </div>

        <div class="box">
            <img src="images/g-3.jpg" alt="">
            <div class="content">
                <h3>Amazing Event </h3>
                 <p>your special moments into unforgettable experiences</p>
                 <a href="#" class="btn">See More</a>
            </div>

        </div>

        <div class="box">
            <img src="images/g-4.jpg" alt="">
            <div class="content">
                <h3>Amazing Event </h3>
                 <p>your special moments into unforgettable experiences</p>
                 <a href="#" class="btn">See More</a>
            </div>

        </div>

        <div class="box">
            <img src="images/g-5.jpg" alt="">
            <div class="content">
                <h3>Amazing event </h3>
                 <p>your special moments into unforgettable experiences</p>
                <a href="#" class="btn">See More</a>
            </div>
        </div>

        <div class="box">
            <img src="images/g-6.jpg" alt="">
            <div class="content">
                <h3>Amazing event </h3>
                <p>your special moments into unforgettable experiences</p>
                 <a href="#" class="btn">See More</a>
            </div>
        </div>

        <div class="box">
            <img src="images/g-7.jpg" alt="">
            <div class="content">
                <h3>Amazing event </h3>
                 <p>your special moments into unforgettable experiences</p>
                 <a href="#" class="btn">See More</a>
            </div>
        </div>

        <div class="box">
            <img src="images/g-8.jpg" alt="">
            <div class="content">
                <h3>Amazing Event </h3>
                <p>your special moments into unforgettable experiences</p>
                 <a href="#" class="btn">See More</a>
            </div>
        </div>

        <div class="box">
            <img src="images/g-9.jpg" alt="">
            <div class="content">
                <h3>Amazing Event </h3>
                <p>your special moments into unforgettable experiences</p>
                <a href="#" class="btn">See More</a>
            </div>
        </div>

    </div>

 </section>

<!-- Gallary Section Ends -->

<!-- Review section starts -->
<section class="review" id="review">
    <h1 class="heading">
        <span>r</span>
        <span>e</span>
        <span>v</span>
        <span>i</span>
        <span>e</span>
        <span>w</span>
    </h1>

    <div class="swiper mySwiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/s-1.jpg" alt="">
                    <h3>Abu Bakar Miaji</h3>
                    <p>Excellent coordination and friendly team. Our event was truly memorable because of them.</p>
                       <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                       </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/s-2.jpg" alt="">
                    <h3>David Williams</h3>
                   <p>From decoration to food and entertainment, every detail was outstanding. Highly recommended!</p>
                       <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                       </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/s-3.jpg" alt="">
                    <h3>Anna Maria Wilson</h3>
                    <p>From decoration to food and entertainment, every detail was outstanding. Highly recommended!</p>
                       <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                       </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/s-4.jpg" alt="">
                    <h3>James Alexander Brown</h3>
                    <p>Outstanding planning and execution. The atmosphere, music, and coordination were spot on.</p>
                       <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                       </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/s-5.jpg" alt="">
                    <h3>Alex Jonathan Miller</h3>
                    <p>Exceptional service from start to finish. The team managed everything beautifully and exceeded our expectations.</p>
                       <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                       </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/s-6.jpg" alt="">
                    <h3>Daniel Robert Smith</h3>
                    <p>Excellent coordination and friendly team. Our event was truly memorable because of them.</p>
                       <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                       </div>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- Review section Ends -->

<!-- Contact Section Starts -->
<section class="contact" id="contact" >
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

    <div class="container">
    <form action="contact_data_input.php" method="POST">

        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name..">

        <label for="number">Mobile Number</label>
        <input type="number" id="number" name="number" placeholder="+880 01838796365" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="abc@gmail.com" required>

         <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Enter your subject.." required>


        <label for="description">Description </label>
        <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>

        <input type="submit" name="submit" value="Submit">

    </form>
    </div>

</section>

<!-- Contact Section Ends -->

<!-- Footer Section  --> 

 <section class="footer">

    <div class="box-container">

        <div class="box">
            <h3> about us</h3>
            <p>PLANPro simplifies event planning by offering tailored packages for weddings, birthdays, and corporate events. With professional coordination, creative execution, and reliable service, we ensure every event is smooth, memorable, and stress-free.</p>
        </div>

        <div class="box">
           <h3>Contact Us</h3>
    <p><i class="fas fa-phone"></i> +880 1234 567890</p>
    <p><i class="fas fa-envelope"></i> info@planpro.com</p>
    <p><i class="fas fa-map-marker-alt"></i> 123 Event Street, Dhaka, Bangladesh</p>
        </div>

        <div class="box">
            <h3> quick link</h3>
           <a href="#home">Home</a>
            <a href="#services">services</a>
            <a href="#packages">Packages</a>
            <a href="#gallery">Gallery</a>
        </div>

        <div class="box">
            <h3> Follow us</h3>
              <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

    </div>

    <h1 class="credit"> Created by <span>abu bakar Miaji</span> | all rights reserved</h1>

 </section>


    <!--Custom Js file link-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="script.js"> </script>

</body>
</html>