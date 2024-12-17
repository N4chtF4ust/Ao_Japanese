<?php
session_start();

include("../PHP/Ao_connect.php");

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../PHP/Ao_customer.php");
    exit();
}

$username = $_SESSION['username'];
$userId = $_SESSION['last'];
echo "<script>console.log('This the Id: '+'$userId')</script>";

echo "<script>console.log('This the username: '+'$username')</script>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../CSS/tab-icon/logo.ico">
    <link rel="stylesheet" href="../CSS/product.css">
    <script src="../JSC/product.js" defer></script>
    
    <title>Products</title>
  
</head>
<body onload="table();">

    <nav>
        <div class="logo_wrapper">
            <img src="..\CSS\product-asset\logo_processed.png" alt="">
        </div>
        
        <div class="menu_logo_wrapper" onclick="menu_click(document.getElementById('nav_wrapper'),document.getElementById('menu_logo'))">
            <div class="menu_logo" id="menu_logo"></div>
            <div class="menu_logo_center" id="menu_logo_center"></div>
        </div>

        <div class="nav_wrapper" id="nav_wrapper">
            <h3 onclick="window.location.href='../PHP/Ao_homepage.php'">Home</h3>
            <h3 onclick="window.location.href='../PHP/Ao_about.php'">About Us</h3>
           
            <h3 onclick="window.location.href='../PHP/Ao_product.php'">Products</h3>
            <h3 onclick="window.location.href='../PHP/Ao_contacts.php'">Contacts</h3>
           
        </div>

        <div class="cart_icon_wrapper" onclick="toggleCart(document.getElementById('cart_wrapper'))">

          <img src="../CSS/product-asset/cart.svg" alt=""  id="cart" >
          <h3 id="CartIconQuantity"></h3>

        </div>

        <button onclick="window.location.href='../PHP/Userpage_out.php'"> 

<svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
 <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
</svg> 

<h3>Out</h3>
</button>
    </nav>

    
    <div class="slideshow-container">
        <div class="myslides fade">
            <div class="number-text"> 1 / 3</div>
            <img src="../CSS/product-asset/Banner 1.jpg" class="slide-image">
        </div>

        <div class="myslides fade">
            <div class="number-text"> 2 / 3</div>
            <img src="../CSS/product-asset/Banner 2.jpg" class="slide-image">
        </div>

        <div class="myslides fade">
            <div class="number-text"> 3 / 3</div>
            <img src="../CSS/product-asset/Banner 3.jpg" class="slide-image">
        </div> 
    </div>


    <div class="container_wrapper">
        <div class="choice">

          
            <select id="choices"  oninput="displayChoice(this)">
                        <option value="choice1">Must Try</option>
                        <option value="choice2">Starters</option>
                        <option value="choice3">Japanese</option>
                        <option value="choice4">Korean</option>
                        <option value="choice5">Ramen</option>
                        <option value="choice6">Chinese/Filipino</option>
                        <option value="choice7">Rice</option>
                        <option value="choice8">Soup</option>
                        <option value="choice9">Desserts</option>
                        <option value="choice10">Drinks</option>
              </select>
        </div>

   
        <div class="menu_choice_wrapper">
            <div class="wrapper_container" id="wrapper_container">
            <?php 


for ($i=1; $i <=10 ; $i++) { 

    echo "<div class='choice_content' id='choice_content$i' >";
    echo    "<div class='choice_content_wrapper' id='choice_content_wrapper$i'>";
           
    echo    "</div>";
    echo  "</div>";

}?>

            </div>
            
        </div>

    </div>

    <div class="cart_wrapper" id="cart_wrapper">

        <div class="cart_container" id="cart_container">
          
        </div>

        <?php
        
            if(isset($_SESSION['TotalOfCart'])){
               $haha = $_SESSION['TotalOfCart'];
            }
        ?>

           
    </div>
<script>
  //to make the table realtime from databse
  //Table1
function buy(userId) {
  
    let userResponse = window.confirm("After purchasing, your account will be logged out automatically in 10 seconds \n\nDo you want to proceed?");
   
if (userResponse) {
 //   console.log("The Buyer UserId is: " + userId);

    fetch("Transaction/buy.php", {  // This fetches the same page
    method: 'POST',
    headers: {
        'Content-Type': 'application/json; charset=utf-8'
    },
     body: JSON.stringify(userId)  // Send the data in the request body
     })
       .then(function(response){
     return response.text();
  }).then(function(data) {
    console.log(data);
    
  })

    window.location.href='../PHP/ThankYou.php';
  


} else {

}



    
}

  function table(){
    
  for (let i = 1; i <= 10; i++) {
  const xhr = new XMLHttpRequest();
  xhr.onload = function () {
    document.getElementById(`choice_content_wrapper${i}`).innerHTML = this.responseText;
  };
  xhr.open("POST", `content_product_table/table${i}.php`, true);
  xhr.send();
  }

//For Cart
  const xhttp2 = new XMLHttpRequest();
  xhttp2.onload = function(){
    document.getElementById("cart_container").innerHTML = this.responseText;
  }
  xhttp2.open("POST", "Ao_cart.php",true);
  xhttp2.send();
//Icon Quantity
  const xhttp3 = new XMLHttpRequest();
  xhttp3.onload = function(){
    document.getElementById("CartIconQuantity").innerHTML = this.responseText;
  }
  xhttp3.open("POST", "AddToCart/IconQuantity.php",true);
  xhttp3.send();

} 




setInterval(function(){table();}, 1000);



function testing(product_id,product_name,price,fileName,table){
    var userId = <?php echo json_encode($userId); ?>;
    var username = <?php echo json_encode($username); ?>;
    var quantity = 1;

    let CartInfo = {
    
          USER_ID: userId,
          USERNAME: username,
          PRODUCT_ID:product_id,
          TABLE: table ,
          IMG_FILENAME: fileName,
          PRODUCT: product_name,
          QUANTITY: quantity,
          PRICE: price,

      }

 //  console.log('DATA: ',CartInfo);
  fetch("AddToCart/AddToCart.php", {  // This fetches the same page
    method: 'POST',
    headers: {
        'Content-Type': 'application/json; charset=utf-8'
    },
    body: JSON.stringify(CartInfo)  // Send the data in the request body
  })
  
  /*.then(function(response){
     return response.text();
  }).then(function(data) {
    console.log(data);
    
  })*/

   }

   function delete_product(delete_userid,delete_table,delete_product_id){

   console.log("The delete button is working");


   let Delete_info = {
    
    USER_ID: delete_userid,
    TABLE: delete_table,
    PRODUCT_ID: delete_product_id
 
   }

    fetch("AddToCart/CartDelete.php", {  // This fetches the same page
    method: 'POST',
    headers: {
        'Content-Type': 'application/json; charset=utf-8'
    },
    body: JSON.stringify(Delete_info)  // Send the data in the request body
    })
    /*.then(function(response){
       return response.text();
    }).then(function(data) {
      console.log(data);
      
    })*/
   }

   function deduct_product(deduct_userid,deduct_table,deduct_product_id){
    
   console.log("The deduct button is working");

   let Deduct_info = {
    
    USER_ID: deduct_userid,
    TABLE: deduct_table,
    PRODUCT_ID: deduct_product_id
 
   }

   fetch("AddToCart/DeductQuantity.php", {  // This fetches the same page
    method: 'POST',
    headers: {
        'Content-Type': 'application/json; charset=utf-8'
    },
    body: JSON.stringify(Deduct_info)  // Send the data in the request body
    })
    .then(function(response){
       return response.text();
    }).then(function(data) {
      console.log(data);
      
    })

   }

   function add_product(add_userid,add_table,add_product_id){
    
    console.log("The Add button is working");

    let Add_info = {
    
    USER_ID: add_userid,
    TABLE: add_table,
    PRODUCT_ID: add_product_id
   }

   fetch("AddToCart/AddQuantity.php", {  // This fetches the same page
    method: 'POST',
    headers: {
        'Content-Type': 'application/json; charset=utf-8'
    },
    body: JSON.stringify(Add_info)  // Send the data in the request body
    })
    .then(function(response){
       return response.text();
    }).then(function(data) {
      console.log(data);
      
    })
 }

   

</script>
    
</body>


</html>