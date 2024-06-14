<?php
session_start();
include('includes/config.php');

if(isset($_GET['stid']) && !empty($_GET['stid'])) {
    $studentId = $_GET['stid'];
    
    // Perform the deletion query
    $sql = "DELETE FROM tblstudents WHERE StudentId = :studentId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':studentId', $studentId, PDO::PARAM_INT);
    $query->execute();
    
    if($query) {
        // Deletion successful
        $_SESSION['msg'] = "Student deleted successfully";
        header("Location: manage-students.php");
        exit();
    } else {
        // Deletion failed
        $_SESSION['error'] = "Failed to delete student";
        header("Location: manage-students.php");
        exit();
    }
} else {
    // If student ID is not provided, redirect back to the previous page
    header("Location: manage-students.php");
    exit();
}
?>
