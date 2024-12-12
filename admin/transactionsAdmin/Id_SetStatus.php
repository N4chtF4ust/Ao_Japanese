<?php
session_start();

include("../assets/connect.php");
if(isset($_POST)){
    $data =file_get_contents("php://input");

   //id = json_decode($data,true);
    $id = json_decode($data, true);
    print_r($id); 
    if (isset($id['primary_id'])) {
        $primary_id = $id['primary_id'];
    } else {
        // If primary_id doesn't exist, set a default value or handle the error
        $primary_id = "ID not found";
    }

    // Output the primary_id (you can change the way it's displayed here)
    echo "Received primary_id: " . $primary_id;

    $_SESSION['SetStatusID'] =  $primary_id ;
}

?>