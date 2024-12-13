<?php
session_start();
include("Config.php");

$timeout_duration = 300; 

if (!isset($_SESSION['user_id'])) {
    header("Location: Settings_Admin_AddUser.php");
    exit;
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: Settings_Admin_AddUser.php");
    exit;
}

$_SESSION['last_activity'] = time();

$user_id = $_SESSION['user_id'];
$username = $_SESSION['adminName'];

$sql = "SELECT ID, username FROM login WHERE ID = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$current_user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$current_user) {
    echo "Error fetching user details.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = sha1($_POST['current_password']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (strlen($new_password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } elseif ($new_password !== $confirm_password) {
        $error = "New password and confirm password do not match.";
    } else {
        $sql = "SELECT password FROM login WHERE ID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($current_password === $row['password']) {
            $hashed_password = sha1($new_password);

            $sql = "UPDATE login SET password = :password WHERE ID = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
            $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $success = "Password changed successfully!";
               echo '<script>
                  alert("Password Changed Successfully!.");
                  </script>';
            } else {
                $error = "Error updating password. Please try again.";
            }
        } else {
            $error = "Incorrect current password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product</title>
    <link rel="stylesheet" href="Settings_Change_Pass.css">
    <script src="../assets/links.js" defer></script>
    <script>
        var timeout;
        function startTimer() {
            timeout = setTimeout(function() {
                alert("Session expired due to inactivity.");
                window.location.href = "logout.php";
            }, 300000);
        }

        document.onmousemove = document.onkeypress = function() {
            clearTimeout(timeout);
            startTimer();
        };

        window.onload = startTimer;

        function change() {
            var section = document.getElementById('change');
            if (section.style.display === 'none' || section.style.display === '') {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        }

        function closeSection() {
            document.getElementById('change').style.display = 'none';
        }
        
        // Create a draggable div
document.addEventListener('DOMContentLoaded', () => {
  const draggable = document.getElementById('change');

  let offsetX = 0;
  let offsetY = 0;
  let isDragging = false;

  // Function to handle drag start (common for mouse and touch)
  function startDrag(event) {
    //event.preventDefault();
    isDragging = true;

    const clientX = event.type === 'touchstart' ? event.touches[0].clientX : event.clientX;
    const clientY = event.type === 'touchstart' ? event.touches[0].clientY : event.clientY;

    offsetX = clientX - draggable.offsetLeft;
    offsetY = clientY - draggable.offsetTop;
  }

  // Function to handle dragging (common for mouse and touch)
  function drag(event) {
    if (!isDragging) return;

    const clientX = event.type === 'touchmove' ? event.touches[0].clientX : event.clientX;
    const clientY = event.type === 'touchmove' ? event.touches[0].clientY : event.clientY;

    draggable.style.left = `${clientX - offsetX}px`;
    draggable.style.top = `${clientY - offsetY}px`;
  }

  // Function to handle drag end
  function endDrag() {
    isDragging = false;
  }

  // Event listeners for mouse
  draggable.addEventListener('mousedown', startDrag);
  document.addEventListener('mousemove', drag);
  document.addEventListener('mouseup', endDrag);

  // Event listeners for touch
  draggable.addEventListener('touchstart', startDrag);
  document.addEventListener('touchmove', drag);
  document.addEventListener('touchend', endDrag);
});

                
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
            <h1>Change Password</h1>
        </div>
        
        <br>

        <div class="content_wrapper">
            <div class="change-pass-wrapper">
            <h2>Change Password for Admin, <?php echo htmlspecialchars($username); ?>!</h2>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Reset Password</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($current_user['username']); ?></td>
                        <td>
                            <button onclick="change()">Change Password</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" value="Back" onclick="window.location.href='Settings_Admin_AddUser.php'" class="back-btn"></td>
                    </tr>
                </tbody>
            </table>
            </div>



            <div id="change">
                <h2>Change Password for Admin, <?php echo htmlspecialchars($username); ?>!</h2>
                <form action="Settings_Change_Pass.php" method="POST">
                    <label for="current_password">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" required>
                    <br>
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                    <br>
                    <label for="confirm_password">Confirm New Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    <br>
                    <input type="submit" value="Change Password">
                    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                    <?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
                </form>
                <br>
                <button onclick="closeSection()">Close</button >
            </div>
        </div>
    </main>
</body>
</html>
