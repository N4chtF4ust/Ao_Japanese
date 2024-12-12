<?php 

include("../assets/connect.php");
if(isset($_POST)){
    $data =file_get_contents("php://input");

    $id = json_decode($data,true);

    echo $id;
    $progress = 'Undone';
    $find_product ="UPDATE transaction SET progress = ? WHERE primary_id = ?";  // Use ? for binding the product ID
    $stmt = $conn->prepare($find_product); // Prepare the statement

// Bind the product ID parameter (assuming it's an integer)
     $stmt->bind_param("si",$progress, $id);

// Execute the query
    $stmt->execute();
}

?>