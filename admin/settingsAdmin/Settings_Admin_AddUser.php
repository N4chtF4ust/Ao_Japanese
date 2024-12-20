<?php

session_start();
include '..\assets\connect.php';

if(!isset($_SESSION['adminName'])) {
header("Location: /Ao_Japanese/admin/Ao_admin.php");
exit();
}

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $cpassword = sha1($_POST['cpassword']);

    $sql = "SELECT * FROM login WHERE username = '$username' && password = '$password' ";
    

     $result = mysqli_query($conn, $sql);

     if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';

     }else{

        if($password != $cpassword){
            $error[] = 'password not matched!';
        }else{
        $insert = "INSERT INTO login(username, password, usertype) VALUES ('$username', '$password', 'admin')";
        mysqli_query($conn, $insert);
     }
     $row = mysqli_fetch_array($result);
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product</title>
    <link rel="stylesheet" href="Settings_Admin_AddUser.css">
    <script src="../assets/links.js" defer></script>

    <script>
        window.onload = function() {
             document.getElementById('add-user-form').style.display = 'none';
        };

        function showAddUserForm() {
            document.getElementById('add-user-form').style.display = 'block';
            document.getElementById('button-box').style.display = 'none';
        }

        function redirectToChangePassword() {
            window.location.href = 'Settings_Change_Pass.php';
        }

        function goBackToButtonBox() {
            document.getElementById('button-box').style.display = 'block';

            document.getElementById('add-user-form').style.display = 'none';
        }
    </script>

</head>

<body>

    <nav>

    <div class="logo_wrapper">
    <img src="../assets/logo_processed.png" alt="AoLogo">
</div>


<div class="customer_acc_wrapper" onclick="redirect(this)">
 <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="100%" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
 </svg>
    <h1>Accounts</h1>
</div>

<div class="product_wrapper" onclick="redirect(this)">
 <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="100%" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
  <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
</svg>
    <h1>Product</h1>
</div>

<div class="staffs_wrapper" onclick="redirect(this)">

<svg xmlns="http://www.w3.org/2000/svg" width="50%" height="100%" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
  <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
 <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
</svg>
    <h1>Staffs</h1>
</div>

<div class="transaction_wrapper" onclick="redirect(this)">
 <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="100%" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
   <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
   <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
   <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
   <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
</svg>
    <h1>Transactions</h1>
</div>

<div class="settings_wrapper" onclick="redirect(this)">

<svg xmlns="http://www.w3.org/2000/svg"  width="50%" height="100%" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
 <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
</svg>
    <h1>Settings</h1>
</div>

<div class="signout_wrapper">
<button onclick="window.location.href='/Ao_Japanese/admin/AdminOut.php'">
<svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
     <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
     <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
    </svg> 
      Sign Out
   </button>
</div>
    </nav>

    <main>
        <div class="page_title">
            <h1>Settings</h1>
        </div>
        
        <div class="content_wrapper">

          <div class="button-wrapper">
          <div id="button-box">
                <button onclick="showAddUserForm()">Add User</button>
                <button onclick="redirectToChangePassword()">Change Password</button>
            </div>
          </div>


            <form id="add-user-form" action="Settings_Admin_AddUser.php" method="POST">
                <h3 class="header-text">ADD USER TYPE</h3>

                <label>Enter a username</label>
                <input type="text" name="username" required placeholder="Username">
                <br>
                <label>Enter a password</label>
                <input type="password" name="password" required placeholder="Password">
                <br>
                <label>Confirm a password</label>
                <input type="password" name="cpassword" required placeholder="Confirm Password">
                <br>
                <br>
                <input type="submit" name="submit" value="Add User" class="submit-btn">
                
                <input type="button" value="Back" onclick="goBackToButtonBox()" class="back-btn">
                
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    };
                }
                ?>
            </form>
        </div>
    </main>
</body>
</html>

