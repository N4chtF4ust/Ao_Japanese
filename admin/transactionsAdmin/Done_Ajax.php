<?php 
$Done_Quantity_user = 1;
for ($i = 1; $i <= $Done_Quantity_user; $i++) { 
?>

<table border="0">
    <tbody>
        <tr>
            <th colspan="4">
                <p> CustomerID: <span>1</span> </p>
            </th>
        </tr>

        <tr>
            <th colspan="4">
                <p> Customer Name: <span>Robert</span> </p>  
            </th>
        </tr>

        <tr>
            <th>
                <p> Product  </p> 
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

        <?php for ($j = 1; $j <= 1; $j++) {  ?>
            <tr>
                <td>
                    <p>Name</p>
                </td>

                <td>
                    <img src="../assets/uploaded_img/chicken-katsudon-removebg-preview.png" alt="images">
                </td>

                <td>
                    <p>Price</p>
                </td>

                <td>
                    <p>Quantity</p>
                </td>
            </tr>
        <?php } ?>

        <tr>
            <td colspan="2">
                <p>Total Quantity: 99</p>
            </td>

            <td colspan="2">
                <p>Total Price: Php 99</p>
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <button>Undone</button> 
            </td>
            <!-- Waiting or To Receive -->
        </tr>

    </tbody>
</table>

<br>

<?php } ?>
