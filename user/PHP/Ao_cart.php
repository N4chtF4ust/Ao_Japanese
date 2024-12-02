<?php 
include("..\PHP\Ao_connect.php");
session_start();

$username = $_SESSION['username'];
$userId = $_SESSION['last'];

// Use proper PHP syntax inside JavaScript
echo "<script>console.log('This is the Id: " . $userId . "');</script>";
echo "<script>console.log('This is the username: " . $username . "');</script>";

function img_path($TABLE,$PRODUCT_ID,$conn){
 // echo "<script>console.log('This is the Table: " . $TABLE . "');</script>";
  //echo "<script>console.log('This is the p id: " . $PRODUCT_ID . "');</script>";

  $find_product = "SELECT * FROM $TABLE WHERE id = $PRODUCT_ID"; //." WHERE availability = 'Available' ";
  $result = mysqli_query($conn, $find_product);

  if ($result->num_rows>0) {
    while($row = mysqli_fetch_array($result)){

      $img = $row["img"];
  
  
    }
  }
  echo $img;

}

function product_name($TABLE,$PRODUCT_ID,$conn){
  // echo "<script>console.log('This is the Table: " . $TABLE . "');</script>";
   //echo "<script>console.log('This is the p id: " . $PRODUCT_ID . "');</script>";
 
   $find_product = "SELECT * FROM $TABLE WHERE id = $PRODUCT_ID"; //." WHERE availability = 'Available' ";
   $result = mysqli_query($conn, $find_product);
 
   if ($result->num_rows>0) {
     while($row = mysqli_fetch_array($result)){
 
       $name = $row["name"];
   
   
     }
   }
   echo $name;
 
 }

 function price($TABLE,$PRODUCT_ID,$QUANTITY,$conn){
  // echo "<script>console.log('This is the Table: " . $TABLE . "');</script>";
   //echo "<script>console.log('This is the p id: " . $PRODUCT_ID . "');</script>";
 
   $find_product = "SELECT * FROM $TABLE WHERE id = $PRODUCT_ID"; //." WHERE availability = 'Available' ";
   $result = mysqli_query($conn, $find_product);
 
   if ($result->num_rows>0) {
     while($row = mysqli_fetch_array($result)){
 
       $price = $row["price"];
   
   
     }
   }
   echo $price * $QUANTITY ;
 
 }
 

$jsonFilePath = "../PHP/ProductJson/Cart.json";

// Load the cart data from the file
if (file_exists($jsonFilePath)) {
  $user = json_decode(file_get_contents($jsonFilePath), true);
} else {
  $user = [];
}

// Check if the user has cart items
if (isset($user[$userId])) {
    // Loop through the cart items for this user
    foreach ($user[$userId] as $cartItems) {
        // Loop through the individual items in the cart

       
    
?>

<div class="product">

    <div class="img_cart_wrapper">
      <!-- Set the image source dynamically -->
      <img src="/Ao/admin/assets/uploaded_img/<?php  img_path($cartItems["TABLE"],$cartItems["PRODUCT_ID"],$conn); ?>" alt="<?php  img_path($cartItems["TABLE"],$cartItems["PRODUCT_ID"],$conn); ?>">
    </div>
    
    <div class="product_name_wrapper">
         <h4><?php product_name($cartItems["TABLE"],$cartItems["PRODUCT_ID"],$conn);  ?></h4>
    </div>

    <div class="product_price_wrapper">
         <h4>PHP <?php price($cartItems["TABLE"],$cartItems["PRODUCT_ID"],$cartItems["QUANTITY"],$conn); ?></h4>
    </div>
    
    <button id="minus" onclick="deduct_product(<?php echo $userId . ',\'' . addslashes($cartItems['TABLE']) . '\',' . $cartItems['PRODUCT_ID']; ?>)">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/></svg>
    </button>

    <div class="product_quantity_wrapper">
         <h4><?php echo  $cartItems["QUANTITY"];?></h4>
    </div>

    <button onclick="add_product(<?php echo $userId . ',\'' . addslashes($cartItems['TABLE']) . '\',' . $cartItems['PRODUCT_ID']; ?>)">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
        </svg>
    </button>


    <button onclick="delete_product(<?php echo $userId . ',\'' . addslashes($cartItems['TABLE']) . '\',' . $cartItems['PRODUCT_ID']; ?>)">

      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
      </svg>
    </button>

</div>



<?php
        }
    }

?>
