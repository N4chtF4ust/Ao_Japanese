<?php
session_start();

 /*$BuyClick = $_SESSION['BuyClick']  ;

 if(isset($BuyClick)){
    header("Location: Userpage_out.php");
    exit();
 }*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../CSS/tab-icon/logo.ico">
    <link rel="stylesheet" href="../CSS/thankyou.css">
    <title>Thank You</title>
</head>
<body>

<main>

    <h1> <span>Robert</span>, Thank You For Purchasing </h1>
    <br>

    <div class="Timer_wrapper">

      <h1  id="timer"> 10 </h1>

    </div>
   <br>

   
    <button> Return Log in </button>

</main>

<script>
// Set the starting time (10 seconds)
let timeLeft = 10;

// Function to update the timer
function updateTimer() {
    if (timeLeft > 0) {
        document.getElementById('timer').innerText = timeLeft;
        timeLeft--;
    } else {
        document.getElementById('timer').innerText = "Time's up!";
        // Optionally, you could redirect the user after the timer ends:
        // window.location.href = "redirect_page.html"; 
    }
}

// Update the timer every 1000ms (1 second)
setInterval(updateTimer, 1000);
</script>
    
</body>
</html>