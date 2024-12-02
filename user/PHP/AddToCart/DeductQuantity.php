<?php
if(isset($_POST)){
    $data =file_get_contents("php://input");

    $deduct = json_decode($data,true);
   
    $jsonFilePath = "../ProductJson/Cart.json";

    // Load the existing cart data if the file exists
    if (file_exists($jsonFilePath)) {
        $user = json_decode(file_get_contents($jsonFilePath), true);
      //  echo json_encode($deduct, JSON_PRETTY_PRINT);
      //  echo "\n\n";
      //  echo json_encode($user, JSON_PRETTY_PRINT);

      
    } else {
        $user = []; // If no file exists, start with an empty array
    }

    if (isset( $user[$deduct["USER_ID"]] )) {
      
        if($user[$deduct["USER_ID"]][$deduct["TABLE"] . "_" . $deduct['PRODUCT_ID']]['QUANTITY'] > 1){
       $user[$deduct["USER_ID"]][$deduct["TABLE"] . "_" . $deduct['PRODUCT_ID']]['QUANTITY']--;
        }
    } 

    $Minus = json_encode($user, JSON_PRETTY_PRINT);
    file_put_contents($jsonFilePath, $Minus);
}
?>