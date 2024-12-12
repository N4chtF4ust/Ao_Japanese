<?php

session_start();

include("../assets/connect.php");
if(isset($_POST)){
    $data =file_get_contents("php://input");

   //id = json_decode($data,true);
    $SetStatus = json_decode($data, true);
  //  print_r($SetStatus); 
    echo  $SetStatus['primary_id'];
    echo  $SetStatus['status'];

    $find_product ="UPDATE transaction SET status = ? WHERE primary_id = ?";  // Use ? for binding the product ID
    $stmt = $conn->prepare($find_product); // Prepare the statement

// Bind the product ID parameter (assuming it's an integer)
     $stmt->bind_param("si", $SetStatus['status'], $SetStatus['primary_id']);

// Execute the query
    $stmt->execute();
}
?>