

<?php


session_start();

include("../PHP/Ao_connect.php");



// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../PHP/Ao_customer.php");
    exit();
}

// Store the logged-in username
$username = $_SESSION['username'];
$last = $_SESSION['last'];
echo "<script>console.log('This the Id: '+'$last')</script>";
echo "<script>console.log('This the username: '+'$username')</script>";


?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../CSS/tab-icon/logo.ico">
    <link rel="stylesheet" href="../CSS/homepage.css">
    <script src="../JSC/homepage.js" defer></script>
    <title>AO Japanese Cuisine</title>
</head>
<body>

    <nav>
        <div class="logo_wrapper">
            <img src="..\CSS\product-asset\logo_processed.png" alt="">
        </div>
        
        <div class="menu_logo_wrapper" onclick="menu_click(document.getElementById('nav_wrapper'),document.getElementById('menu_logo'))">
            <div class="menu_logo" id="menu_logo"></div>
            <div class="menu_logo_center" id="menu_logo_center"></div>
        </div>

        <div class="nav_wrapper" id="nav_wrapper">
            <h3 onclick="window.location.href='#'">Home</h3>
            <h3 onclick="window.location.href='../PHP/Ao_about.php'">About Us</h3>
            <h3 onclick="window.location.href='../PHP/Ao_product.php'">Products</h3>
            <h3 onclick="window.location.href='../PHP/Ao_contacts.php'">Contacts</h3>
           
        </div>

      <!-- <img src="..\CSS\product-asset\cart.svg" alt=""  id="cart" onclick="toggleCart(document.getElementById('cart_wrapper'))"> -->
       <button onclick="window.location.href='../PHP/Userpage_out.php'"> 

        <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
          <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
        </svg> 

        <h3>Out</h3>
       </button>


    </nav>

    <div class="section-container">
        <div class="content">

            <h1 class="username">    
            <?php
            echo "Welcome $username";
            ?>
            </h1>


            <h1 class="title">AO Japanese Cuisine</h1>
            <p class="description">Blends traditional Japanese flavors with modern artistry. 
                Enjoy expertly crafted sushi, ramen, and more, made with the finest ingredients 
                for an authentic dining experience.
            </p>
            <div class="action-btn">
                <button class="order-now"><a href="../PHP/Ao_product.php" class="order-now">Order Now</a></button>
            </div>
        </div>
        <div class="image">
            <img src="../CSS/homepage-assets/ramen.png" alt="ramen" />
        </div>
    </div>

    <div class="bg_wrapper">
        <img src="..\CSS\bg-assets\leftcontainer.svg" alt="" id="leftcontainer">
        <img src="..\CSS\bg-assets\leftgrass.svg" alt="" id="leftgrass">
        <img src="..\CSS\bg-assets\rightcontainer.svg" alt="" id="rightcontainer">
        <img src="..\CSS\bg-assets\rightgrass.svg" alt="" id="rightgrass">
        <img src="..\CSS\bg-assets\Shrine.svg" alt="" id="Shrine">
        <img src="..\CSS\bg-assets\water.svg" alt="" id="water">
        <img src="..\CSS\bg-assets\waterreflect.svg" alt="" id="waterreflect">
    </div>

    <footer>
        <div class="bottom-bar">
            <p>&copy; AO Japanese Cuisine. All rights reserved</p>
        </div>
    </footer> 

    <!-- <div class="cart_wrapper" id="cart_wrapper">
        <button id="cart_buy">Buy</button>
    </div> -->
    
</body>


</html>