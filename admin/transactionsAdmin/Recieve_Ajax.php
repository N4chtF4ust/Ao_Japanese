<?php 
include("../assets/connect.php");
function find_from_db($col_name,$table,$productId,$conn ){

    // Safely extract values from $product array
    // Safely extract values from $product array
    // Get the table name
    // Get the product ID
    
    // Use prepared statement for security
    
    $find_product =  "SELECT * FROM `$table` WHERE id = ? ";  // Use ? for binding the product ID
    $stmt = $conn->prepare($find_product); // Prepare the statement
    
    // Bind the product ID parameter (assuming it's an integer)
    $stmt->bind_param("i", $productId);
    
    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result(); // Get the result from the prepared statement
    
    // Check if any rows are returned
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $found = $row["$col_name"] ;
    }
    }
    
    return $found;
    
}

$To_Recieve_Quantity_user = 1;
$find_product = "SELECT * FROM transaction where progress = 'Undone' AND payment = 'Paid' order by primary_id desc; ";
$result = mysqli_query($conn, $find_product);



if ($result->num_rows>0) {
    
  while($row = mysqli_fetch_array($result)){

    $jsonData = json_decode($row['products'], true);
  //  print_r($jsonData);
  $total = 0;

?>
    <table border="0">
        <tbody>
            <tr>
                <th colspan="4">
                    <p> CustomerID:  <span id="CustomerID" > <?php echo $row["id"]; ?> </p>
                </th>
            </tr>

            <tr>
                <th colspan="4">
                    <p> Customer Name: <span> <?php echo $row["name"]; ?> </span> </p>
                </th>
            </tr>

            <tr>
                <th>
                    <p> Product </p> 
                </th>
                <th>
                    <p> Image </p> 
                </th>
                <th>
                    <p> Price </p>
                </th>
                <th>
                    <p> Quantity </p> 
                </th>
            </tr>

            <?php foreach ($jsonData as $product ) { 
            $total += find_from_db("price",$product['TABLE'],$product['PRODUCT_ID'],$conn  ) * $product['QUANTITY'];  ;
       
           ?>

            <tr>
                <td>
                    <p><?php echo find_from_db("name",$product['TABLE'],$product['PRODUCT_ID'],$conn  ); ?></p>
                </td>
                <td>
                    <img src="../assets/uploaded_img/<?php echo find_from_db("img",$product['TABLE'],$product['PRODUCT_ID'],$conn  ); ?>" alt="">
                </td>
                <td>
                    <p><?php echo find_from_db("price",$product['TABLE'],$product['PRODUCT_ID'],$conn  ); ?></p>
                </td>
                <td>
                    <p><?php echo $product['QUANTITY'];  ?></p>
                </td>
            </tr>
        <?php } ?>
    

            <tr>
                <td colspan="2">
                    <p>Total Quantity:  <?php echo $row["total_quantity"]; ?> </p>
                </td>
                <td colspan="2">
                    <p>Total Price: Php <?php echo  $total; ?> </p>
                </td>
            </tr>
            <tr>
                
               <td colspan="2">
                 <p>Status:  <?php echo $row["status"]; ?> </p>
               </td>

             
                <td colspan="2">
                    <button onclick="SetStatus(document.getElementById('SetStatus'), <?php echo $row['primary_id'];   ?> )">Set Status</button> 
                </td> 
            </tr>

            <tr >


                <td colspan="2">
                    <button  onclick="not_paid(<?php  echo $row['primary_id']; ?>)" >Not Paid</button> 
                </td>

                <td colspan="2">

                     <?php if($row['status'] == "To Receive" ){  ?>
                    <button  onclick="done(<?php  echo $row['primary_id']; ?>)" >Done</button> 
                    <?php } else{  ?>
                        <button disabled>Done</button>

                    <?php  } ?>

            

                </td>
            </tr>
        </tbody>
    </table>
    <br>

<?php  }   }

else{


?>
<h3>No Tables Available</h3>

<?php }?>
