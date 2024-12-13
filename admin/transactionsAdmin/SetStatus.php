<?php
session_start();
include("../assets/connect.php");

if (!isset($_SESSION['SetStatusID'])) {
    // If no session variable is set, initialize it as an empty string or handle accordingly
    $primary_id = "";
} else {
    // Use the session variable
    $primary_id = $_SESSION['SetStatusID'];
}

// Proceed only if a primary_id exists
if (!empty($primary_id)) {
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM transaction WHERE primary_id = ?");
    $stmt->bind_param("i", $primary_id);  // Bind the primary_id as an integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any results are returned
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display the data from the transaction
            echo "<h2><p>CustomerID: <span>" . htmlspecialchars($row['id']) . "</span></p></h2>";
            echo "<h3><p>Name: <span>" . htmlspecialchars($row['name']) . "</span></p></h3>";
            echo "<h3><p>Status: <span>" . htmlspecialchars($row['status']) . "</span></p></h3>";
            echo "<input id='primary_id' type='hidden' value='" . htmlspecialchars($primary_id) . "'>";
        }
    } else {
        echo "<p>No transaction found for the given primary ID.</p>";
    }



} 
?>
