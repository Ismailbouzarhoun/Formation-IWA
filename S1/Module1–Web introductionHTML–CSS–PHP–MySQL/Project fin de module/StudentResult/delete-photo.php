<?php
session_start();
include('includes/config.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $photoId = $_GET['id'];

    // Retrieve the file name from the database
    $sql = "SELECT imges FROM tblGalerie WHERE id = :id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $photoId, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    if($result) {
        $fileName = $result['imges'];

        // Delete the file from the folder
        $filePath = "uploads/" . $fileName;
        if(file_exists($filePath)) {
            unlink($filePath); // Deletes the file
        }

        // Delete the record from the database
        $deleteSql = "DELETE FROM tblGalerie WHERE id = :id";
        $deleteQuery = $dbh->prepare($deleteSql);
        $deleteQuery->bindParam(':id', $photoId, PDO::PARAM_INT);
        
        if($deleteQuery->execute()) {
            // Deletion successful
            $_SESSION['success'] = "Photo and record deleted successfully.";
        } else {
            // Deletion failed
            $_SESSION['error'] = "Failed to delete photo and record. Please try again.";
        }
    } else {
        // Photo record not found in the database
        $_SESSION['error'] = "Photo record not found.";
    }
} else {
    // No photo ID provided
    $_SESSION['error'] = "Invalid photo ID.";
}

// Redirect back to the page displaying the list of photos
header("Location: manage-photos.php");
exit();
?>
