<?php
session_start();
include("../assets/connect.php");

$primary_id = $_SESSION['SetStatusID']  ;
//echo $primary_id;

$find_product = "SELECT * FROM transaction where primary_id = $primary_id;";
$result = mysqli_query($conn, $find_product);



if ($result->num_rows>0) {
    
  while($row = mysqli_fetch_array($result)){

?>

    <h2> <p> CustomerID: <span> <?php echo $row['id'];   ?></span> </p></h2>
    <h3>  <p> Name: <span> <?php echo $row['name'];   ?> </span> </p></h3>         
    <h3><p>Status: <span>  <?php echo $row['status'];   ?> </span></p></h3> 
    <input id="primary_id" type="hidden" name="" value=" <?php echo $primary_id;?> " >     


<?php  
        
  }

}

?>