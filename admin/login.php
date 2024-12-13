<?php
    session_start();
    include ("/Ao_Japanese/admin/assets/connect.php");

if (isset($_POST['adminUser']) && isset($_POST['adminPass'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $adminUser = validate($_POST['adminUser']);
    $adminPass = validate(sha1($_POST['adminPass']));

    if (empty($adminUser)) {
        header("Location: Ao_admin.php?error=Username is required.");
        exit();
    } elseif (empty($adminPass)) {
        header("Location: Ao_admin.php?error=Password is required.");
        exit();
    } else {

        $sql = "SELECT * FROM login WHERE username = :username AND password = :password";
        
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=Ao", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $adminUser);
            $stmt->bindParam(':password', $adminPass);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['adminName'] = $row['username'];
                $_SESSION['user_id'] = $row['ID'];
                
                header("Location: /Ao_Japanese/admin/accountsAdmin/accounts_admin.php");
                exit();
            } else {
                header("Location: Ao_admin.php?error=Unknown Admin User");
                exit();
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    header("Location: ../Ao_Japanese-1/admin/Ao_admin.php");
    exit;
}

?>