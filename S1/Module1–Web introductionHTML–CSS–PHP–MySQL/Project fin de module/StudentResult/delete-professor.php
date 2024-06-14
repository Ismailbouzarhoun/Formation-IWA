<?php
session_start();
include('includes/config.php');

if(isset($_GET['stid']) && !empty($_GET['stid'])) {
    $profId = $_GET['stid'];

    try {
        $sql = "DELETE FROM tblprof WHERE ProfId = :profId";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':profId', $profId, PDO::PARAM_INT);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            // Record deleted successfully
            $_SESSION['msg'] = "Professor deleted successfully";
        } else {
            // No record deleted (maybe ID not found)
            $_SESSION['error'] = "Failed to delete professor. Record not found.";
        }
    } catch (PDOException $e) {
        // Handle database errors
        $_SESSION['error'] = "Database error: " . $e->getMessage();
    }
} else {
    // Redirect if stid parameter is not provided
    $_SESSION['error'] = "Invalid request. Professor ID not provided.";
}

// Redirect back to the page where deletion was initiated
header("Location: manage-prof.php");
exit();
?>
