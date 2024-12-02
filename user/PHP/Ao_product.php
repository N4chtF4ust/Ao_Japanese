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

      <img src="..\CSS\product-asset\cart.svg" alt=""  id="cart" onclick="toggleCart(document.getElementById('cart_wrapper'))">
      
        <button  onclick="window.location.href='../PHP/Userpage_out.php'">Back</button>
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

        <div class="button_wrapper">

           <button id="cart_buy">

            <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
            </svg> 

            <h4> Buy </h4> 

          </button>
           <button id="cart_close" onclick="toggleCart(document.getElementById('cart_wrapper'))">

           <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="50%" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
           <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
           <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
           
          </svg>
           <h4>Close</h4>
          </button>

        </div>
           
    </div>
<script>
  //to make the table realtime from databse
  //Table1
  function table(){
  const table1 = new XMLHttpRequest();
  table1.onload = function(){ 
    document.getElementById("choice_content_wrapper1").innerHTML = this.responseText;
  }
  table1.open("POST","content_product_table/table1.php",true);
  table1.send();
  

  //Table2
  const table2 = new XMLHttpRequest();
  table2.onload = function(){  
    document.getElementById("choice_content_wrapper2").innerHTML = this.responseText;  
  }
  table2.open("POST","content_product_table/table2.php",true);
  table2.send();

  
  //Table3
  const table3 = new XMLHttpRequest();
  table3.onload = function(){  
    document.getElementById("choice_content_wrapper3").innerHTML = this.responseText;  
  }
  table3.open("POST","content_product_table/table3.php",true);
  table3.send();

//Table4
    const table4 = new XMLHttpRequest();
  table4.onload = function(){  
    document.getElementById("choice_content_wrapper4").innerHTML = this.responseText;  
  }
  table4.open("POST","content_product_table/table4.php",true);
  table4.send();

//Table5
const table5 = new XMLHttpRequest();
  table5.onload = function(){  
    document.getElementById("choice_content_wrapper5").innerHTML = this.responseText;  
  }
  table5.open("POST","content_product_table/table5.php",true);
  table5.send();

//Table6
const table6 = new XMLHttpRequest();
  table6.onload = function(){  
    document.getElementById("choice_content_wrapper6").innerHTML = this.responseText;  
  }
  table6.open("POST","content_product_table/table6.php",true);
  table6.send();

//Table7
const table7 = new XMLHttpRequest();
  table7.onload = function(){  
    document.getElementById("choice_content_wrapper7").innerHTML = this.responseText;  
  }
  table7.open("POST","content_product_table/table7.php",true);
  table7.send();

  //Table8
const table8 = new XMLHttpRequest();
  table8.onload = function(){  
    document.getElementById("choice_content_wrapper8").innerHTML = this.responseText;  
  }
  table8.open("POST","content_product_table/table8.php",true);
  table8.send();

  //Table9
  const table9 = new XMLHttpRequest();
  table9.onload = function(){  
    document.getElementById("choice_content_wrapper9").innerHTML = this.responseText;  
  }
  table9.open("POST","content_product_table/table9.php",true);
  table9.send();

    //Table10
    const table10 = new XMLHttpRequest();
  table10.onload = function(){  
    document.getElementById("choice_content_wrapper10").innerHTML = this.responseText;  
  }
  table10.open("POST","content_product_table/table10.php",true);
  table10.send();


 
//For Cart
  const xhttp2 = new XMLHttpRequest();
  xhttp2.onload = function(){
    document.getElementById("cart_container").innerHTML = this.responseText;
  }
  xhttp2.open("POST", "Ao_Cart.php",true);
  xhttp2.send();
} 

setInterval(function(){table();}, 1000);

function testing(product_id,product_name,price,fileName,table){
    var userId = <?php echo json_encode($userId); ?>;
    var username = <?php echo json_encode($username); ?>;
    var quantity = 1;

   // Log the values to the console
   // console.log('The button working');
   // console.log('USER ID: ' + userId);
   // console.log('USERNAME: ' + username);
   // console.log('PRODUCT ID: ' + product_id);
   // console.log('PRODUCT NAME: ' + product_name);
   // console.log('PRICE: ' + price);
   // console.log('IMG FILE NAME: ' + fileName);
   // console.log('     ');
    // Define the URL of the JSON data

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
 //  console.log(delete_userid);
 //  console.log(delete_table);
 //  console.log(delete_product_id);

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