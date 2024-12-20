<?php

session_start();
include ("../PHP/Ao_connect.php");

// Check if the user is already logged in, redirect to Ao homepage
if (isset($_SESSION['username'])) {
    header("Location: ../PHP/Ao_homepage.php");
    exit();
}

if(isset($_POST["login_user"])){


$username = $_POST["customer_name"];
$adduser = "INSERT INTO customers(username) VALUES ('$username')";
 
if(mysqli_query($conn, $adduser)){

        $_SESSION['username'] = $username;
        header("Location: ../PHP/Ao_homepage.php");
     

  } 

 $Last = "SELECT * FROM customers WHERE ID=(SELECT max(ID) FROM customers)";
 $result = mysqli_query($conn,$Last);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $_SESSION['last'] = $row["ID"];
 
  }


}

echo "<script>console.log(' $lastID ')</script>";

exit();
  
 }


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ao Restaurant</title>
<link rel="stylesheet" href="../CSS/Ao_Customer.css">
<link rel="icon" href="../CSS/homepage_photo/logo.png" type="image/x-icon">
<script src="../JSC/signin_signup.js" defer></script>

</head>
<body>
  <div class="homepage">
          <div class="right_container" id="right_container">

            <div id="sign_in">
              <img src="../CSS/homepage_photo/logo.png" alt="AOLogo" id="logo">

              <form action="Ao_customer.php" method="post">
              <h1>Please enter your name</h1>
                <div id="username-wrapper" class="outline">
                  <input type="text" id="sign_in_email" name="customer_name" placeholder="Enter name" style="order: 2" required>
                  <label for="sign_in_email" id="placehold"></label>
                  <div id="logo_user" style="order: 1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80%" height="80%" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                  </div>
                </div>
             
                <input type="submit" name="login_user" value = "Log in">

              </form>


              <div id="form_lower_wrapper">            
              </div>       
            </div>

  
              </div>
             
            </div>
          </div>

          

          <div class="bg">
                  <img src="..\CSS\homepage_photo\land.png" alt="land" id="land">
                  <img src="..\CSS\homepage_photo\obj1.svg" alt="temple" id="obj1">
                  <img src="..\CSS\homepage_photo\obj2.svg" alt="shinto" id="obj2">
                  <img src="..\CSS\homepage_photo\obj3.svg" alt="temple" id="obj3">
                  <img src="..\CSS\homepage_photo\obj4.svg" alt="temple" id="obj4">
                  <img src="..\CSS\homepage_photo\Fujjjii.svg" alt="mountain" id="Mountain">
                  <img src="..\CSS\homepage_photo\cloud1.svg" alt="cloud" id="cloud1">
                  <img src="..\CSS\homepage_photo\cloud2.svg" alt="cloud" id="cloud2">
                  <img src="..\CSS\homepage_photo\cloud3.svg" alt="cloud" id="cloud3">
                  <img src="..\CSS\homepage_photo\moon.svg" alt="moon" id="moon">
          </div>

  </div>

  <div class="Footer">
    <p>&#169; 2024 AO Japanese Cuisine</p>
  </div>
  
</body>
</html>