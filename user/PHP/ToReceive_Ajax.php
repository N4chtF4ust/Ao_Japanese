<?php 
include("../PHP/Ao_connect.php");


?>
<?php $query = "SELECT * FROM `transaction` WHERE status = 'To Receive' AND progress= 'Undone' ORDER BY primary_id desc ";
$result = mysqli_query($conn, $query);

if ($result->num_rows>0) {
  while($row = mysqli_fetch_array($result)){
 ?>
<tr>
    <td> <?php echo $row['id']; ?> </td>
    <td> <?php echo $row['name']; ?> </td>
</tr>
<?php }
 } ?>