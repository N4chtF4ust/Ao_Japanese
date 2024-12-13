<?php
    
    session_start();
    include ("/Ao_Japanese/admin/Ao_connect.php");

 if(!isset($_SESSION['adminName'])) {
    header("Location: /Ao_Japanese/admin/Ao_admin.php");
    exit();
 }

// Store the logged-in username
    $adminName = $_SESSION['adminName'];
    echo "<script>console.log('This the username: '+'$adminName')</script>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="/Ao_Japanese/admin/accountsAdmin/accounts_admin.css">
    <script src="/Ao_Japanese/admin/assets/links.js"></script>
    <!-- <script src="/Ao_Japanese/admin/productAdmin/product_admin.js" defer></script> -->

   
</head>


<body>



    <nav >
        <div class="logo_wrapper">
            <img src="\Ao_Japanese\admin\assets\logo_processed.png" alt="AoLogo">

        </div>


        <div class="customer_acc_wrapper" onclick="redirect(this)">
            <h1>Accounts</h1>

        </div>

        <div class="product_wrapper" onclick="redirect(this)">
            <h1>Product</h1>

        </div>

        <div class="staffs_wrapper" onclick="redirect(this)">
            <h1>Staffs</h1>

        </div>

        <div class="transaction_wrapper" onclick="redirect(this)">
            <h1>Transactions</h1>


        </div>

        <div class="settings_wrapper" onclick="redirect(this)">
            <h1>Settings</h1>

        </div>

        <div class="signout_wrapper">
           <button onclick="window.location.href='/Ao_Japanese/admin/AdminOut.php'">Sign Out</button>
         

        </div>

    </nav>

    <main>
        <div class="page_title">
            <br>
            <h1>Account List</h1>

        </div>

        <div class="content_wrapper">

            <br><br>
            <table border="2">
            <thead>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Timestamp</th>
            </tr>
            </thead>
                     <?php

                        $showCust = "SELECT * FROM customers";
                        $result = mysqli_query($conn, $showCust);

                        while ($row = mysqli_fetch_array($result)){
                                $custID = $row["ID"];
                                $custUser = $row["username"];
                                $checkIn = $row["logtime"];
                                $formattedCheckIn = date("Y-m-d H:i:s", strtotime($checkIn));


                       echo "
                            <tbody>
                            <tr>
                            <td>  $custID   </td>
                            <td>  $custUser </td>
                            <td>  $formattedCheckIn  </td>
                            </tr>
                            </tbody>
                            ";

                        }
                     
                        
                    ?>
            </table>
        </div>
    </main>

  
</body>
</html>
