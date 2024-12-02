<?php

// Check if CartInfo is sent via POST
if(isset($_POST)){
    $data =file_get_contents("php://input");

    $cart = json_decode($data,true);
   
    $jsonFilePath = "../ProductJson/Cart.json";

    // Load the existing cart data if the file exists
    if (file_exists($jsonFilePath)) {
        $user = json_decode(file_get_contents($jsonFilePath), true);
      
    } else {
        $user = []; // If no file exists, start with an empty array
    }
    
    // Prepare the new product data to add to the cart
    $productKey = $cart["TABLE"] . "_" . $cart['PRODUCT_ID']; // Create a unique key for the product
    $AddToCart = [
        $productKey => [
            'TABLE' => $cart["TABLE"] ,
            'PRODUCT_ID' => $cart["PRODUCT_ID"],
            'IMG_FILENAME' => $cart["IMG_FILENAME"],
            'PRODUCT' => $cart["PRODUCT"],
            'QUANTITY' => $cart["QUANTITY"],
            'PRICE' => $cart["PRICE"]
        ]
    ];
    
    // Check if the user already has a cart
    if (!isset($user[$cart["USER_ID"]])) {
        // If no cart exists for this user, create a new cart for them
        $user[$cart["USER_ID"]] = $AddToCart;
    } else {
        // If the user has a cart, check if the product already exists in the cart
        if (isset($user[$cart["USER_ID"]][$productKey])) {
            // If the product exists, update the quantity
            $user[$cart["USER_ID"]][$productKey]['QUANTITY'] += $cart['QUANTITY'];
            $user[$cart["USER_ID"]][$productKey]['PRICE'] = $cart['PRICE']* $user[$cart["USER_ID"]][$productKey]['QUANTITY'] ;
        } else {
            // If the product does not exist, add it as a new entry
            $user[$cart["USER_ID"]] += $AddToCart;
        }
    }
    
    // Encode the updated array and save it back to the file
    $Add = json_encode($user, JSON_PRETTY_PRINT);
    file_put_contents($jsonFilePath, $Add);

}
?>