
<?php

  if(isset($_POST["enter"])){

  $sel = $_POST["type_user"];

  if($sel === "Admin"){
    header("location: ../Ao_Japanese/admin/Ao_admin.php");
  } else if($sel === "Customer") {
    header("location: ../Ao_Japanese/user/PHP/Ao_customer.php ");
  } else if($sel === "Dashboard") {
    header("location: ../Ao_Japanese/user/PHP/dashboard.php ");
  }
  else{
    header("location: index.php ");
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ao Restaurant</title>
<link rel="stylesheet" href="../Ao_Japanese/user/CSS/selectUser.css">
<link rel="icon" href="logo.png" type="image/x-icon">
<script src="../Ao_Japanese/user/JSC/signin_signup.js" defer></script>

</head>
<body>
  <div class="homepage">
          <div class="right_container" id="right_container">

            <div id="sign_in">
              <img src="logo.png" alt="AOLogo" id="logo">
              <h1>Please select</h1>


              <form action=" " method="post">
                <div id="select-option-container">
                    <div class="select-container">
                      
                      <select name="type_user" id="select-user">
                      <option value="" disabled selected> --select-- </option>
                      <option value="Admin"> Admin</option>
                      <option value="Customer"> Customer</option>
                      <option value="Dashboard"> Dashboard</option>

                      </select>

                 
                      
                    </div>
            
                  </div>
                <input type="submit" name="enter" value = "Enter">
              </form>


              <div id="form_lower_wrapper">            
              </div>       
            </div>

  
              </div>
             
            </div>
          </div>

          

          <div class="bg">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\land.png" alt="land" id="land">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\obj1.svg" alt="temple" id="obj1">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\obj2.svg" alt="shinto" id="obj2">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\obj3.svg" alt="temple" id="obj3">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\obj4.svg" alt="temple" id="obj4">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\Fujjjii.svg" alt="mountain" id="Mountain">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\cloud1.svg" alt="cloud" id="cloud1">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\cloud2.svg" alt="cloud" id="cloud2">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\cloud3.svg" alt="cloud" id="cloud3">
                  <img src="\Ao_Japanese\user\CSS\homepage_photo\moon.svg" alt="moon" id="moon">
          </div>

  </div>

  <div class="Footer">
    <p>&#169; 2024 AO Japanese Cuisine</p>
  </div>
  
</body>
</html>
