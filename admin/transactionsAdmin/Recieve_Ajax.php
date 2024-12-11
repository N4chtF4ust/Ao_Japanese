<?php 
$To_Recieve_Quantity_user = 1;
for ($i = 1; $i <= $To_Recieve_Quantity_user; $i++) { 
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

            <tr>
                <td>
                    <p>Name</p>
                </td>
                <td>
                    <img src="../assets/uploaded_img/chicken-katsudon-removebg-preview.png" alt="">
                </td>
                <td>
                    <p>Price</p>
                </td>
                <td>
                    <p>Quantity</p>
                </td>
            </tr>

    

            <tr>
                <td colspan="2">
                    <p>Total Quantity: 99</p>
                </td>
                <td colspan="2">
                    <p>Total Price: Php 99</p>
                </td>
            </tr>

            <tr >

               <td>
                 <p>Status: ?</p>
               </td>

             
                <td>
                    <button onclick="SetStatus(document.getElementById('SetStatus'))">Set Status</button> 
                </td> 

                <td>
                    <button>Not Paid</button> 
                </td>

                <td>
                    <button>Done</button> 
                </td>
            </tr>
        </tbody>
    </table>
    <br>
<?php } ?>
