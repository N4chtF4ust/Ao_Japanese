<?php
 include '..\assets\connect.php';
$showCust = "SELECT * FROM customers order by ID desc";
$result = mysqli_query($conn, $showCust);

while ($row = mysqli_fetch_array($result)){
        $custID = $row["ID"];
        $custUser = $row["username"];
        $checkIn = $row["logtime"];


echo "
    <tr>
    <td>  $custID </td>
    <td>  $custUser </td>
    <td>   $checkIn  </td>
    </tr>
    </tbody>
    ";

}


?>