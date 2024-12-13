<?php
// Start the session
session_start();

// Destroy the session to log the user out
session_unset();  // Remove all session variables
session_destroy(); // Destroy the session

// Redirect to ao customer log in
header("Location: /Ao_Japanese/admin/Ao_admin.php");
exit();
?>