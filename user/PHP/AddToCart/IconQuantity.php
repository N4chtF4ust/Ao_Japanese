<?php
session_start();

$userId = $_SESSION['last'];

$jsonFilePath = "../ProductJson/Cart.json";

// Load the existing cart data if the file exists
if (file_exists($jsonFilePath)) {
    $user = json_decode(file_get_contents($jsonFilePath), true);
  //  echo json_encode($deduct, JSON_PRETTY_PRINT);
  //  echo "\n\n";
  //  echo json_encode($user, JSON_PRETTY_PRINT);
}
else{
    echo "0";
}

//echo json_encode($user, JSON_PRETTY_PRINT);
//echo $userId;
//echo "<br><br><br>";

$sum=0;
if(isset($user[$userId])){
    foreach ($user[$userId] as $products) {

        // echo   json_encode($products['QUANTITY'], JSON_PRETTY_PRINT)."<br>";
         $sum += $products['QUANTITY'];
     
     
     }
     echo $sum;
     $_SESSION['Product_Quantity'] = $sum;
}

else{
    echo $sum;
}





?>
