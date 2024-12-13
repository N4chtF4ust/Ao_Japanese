<?php
include("../Ao_connect.php");
session_start();
$username = $_SESSION['username'];
$userId = $_SESSION['last'];

$Product_Quantity = $_SESSION['Product_Quantity'];
$total = $_SESSION['total_price'];

if(isset($_POST)){
    $data =file_get_contents("php://input");

    $id = json_decode($data,true);

    $jsonFilePath = "../ProductJson/Cart.json";

// Load the existing cart data if the file exists
if (file_exists($jsonFilePath)) {
    $user = json_decode(file_get_contents($jsonFilePath), true);

}
else{
    
}
if(isset($user[$userId])){
        $jsonData =  json_encode($user[$userId], JSON_PRETTY_PRINT);

         $stmt = $conn->prepare("INSERT INTO transaction (id,name,products,total_quantity,total_price) VALUES (?,?,?,?,?)");
         $stmt->bind_param("issii", $userId ,$username,$jsonData,$Product_Quantity,$total );

         if ($stmt->execute()) {
            echo "Data inserted successfully!";
            $_SESSION['BuyClicked'] = true;
        } else {
            echo "Error: " . $stmt->error;
        }
}


}
?>