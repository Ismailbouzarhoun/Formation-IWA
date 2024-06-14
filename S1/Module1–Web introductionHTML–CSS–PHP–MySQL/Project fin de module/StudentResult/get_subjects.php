<?php
// Include your database connection and necessary configurations
include('includes/config.php');

// Get the class ID from the AJAX request
$classId = $_POST['classId'];

// Fetch subjects based on the selected class from the database
$stmt = $dbh->prepare("SELECT id, SubjectName FROM tblsubjects WHERE id IN (SELECT SubjectId FROM tblsubjectcombination WHERE ClassId = :classId)");
$stmt->execute(array(':classId' => $classId));
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Generate HTML options for the module selection dropdown
$options = "<option value=''>Sélectionnez un module</option>";
foreach ($results as $row) {
    $options .= "<option value='{$row['id']}'>{$row['SubjectName']}</option>";
}

// Output the HTML options
echo $options;
?>
