<?php

// Include PhpSpreadsheet autoload file
require 'phpspreadsheet/vendor/autoload.php';

// Assuming you have a database connection established
include('includes/config.php');

// Check if classId is provided in the URL parameters
if (isset($_GET['classId'])) {
    $classId = $_GET['classId'];

    // Fetch student data for the selected class from the database
    
    // Example query assuming a table named tblstudents with columns StudentName, StudentEmail, and RollId
    $sql = "SELECT StudentName, StudentEmail, RollId FROM tblstudents WHERE ClassId = :classId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':classId', $classId, PDO::PARAM_INT);
    $query->execute();
    $students = $query->fetchAll(PDO::FETCH_ASSOC);

    // Create a new Spreadsheet object
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    // Set the active sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Set headers
    $spreadsheet->getActiveSheet()->setCellValue('A1', 'Nom');
    $spreadsheet->getActiveSheet()->setCellValue('B1', 'Email');
    $spreadsheet->getActiveSheet()->setCellValue('C1', 'Apogie');
    $spreadsheet->getActiveSheet()->setCellValue('D1', 'notes');

    // Set data
    $row = 2;
    foreach ($students as $student) {
        $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $student['StudentName']);
        $spreadsheet->getActiveSheet()->setCellValue('B' . $row, $student['StudentEmail']);
        $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $student['RollId']);
        $row++;
    }

    // Create a Writer object for XLSX format
    $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    
    // Create a temporary file path
    $tempFilePath = tempnam(sys_get_temp_dir(), 'student_data_');
    
    // Save Excel file to the temporary file path
    $writer->save($tempFilePath);
    
    // Set headers to force download the file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="student_data.xlsx"');
    header('Cache-Control: max-age=0');
    
    // Read the file and output it to the browser
    readfile($tempFilePath);
    
    // Delete the temporary file
    unlink($tempFilePath);

    // End script
    exit;
} else {
    echo "ClassId not provided";
    // End script
    exit;
}

?>
