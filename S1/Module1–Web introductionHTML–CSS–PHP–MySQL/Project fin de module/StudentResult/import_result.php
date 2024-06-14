<?php
session_start();
error_reporting(E_ALL);
$msg = "";
$error = "";
include('includes/config.php');

if (empty($_SESSION['alogin'])) {   
    header("Location: index.php"); 
} else {
    if(isset($_POST['submit'])) {
        $class = $_POST['class'];
        $module = $_POST['module'];
        
        // Handle file upload
        $file = $_FILES['file']['tmp_name'];
        
        // Include PHPExcel library
        require_once 'vendor/autoload.php';

        // Initialize database connection
        $dbh = new PDO('mysql:host=localhost;dbname=studentresult', 'root', '');
        
        try {
            // Load the Excel file
            $excelReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file);
            $excelObj = $excelReader->load($file);
            $worksheet = $excelObj->getActiveSheet();
            
            // Get the highest row and column
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            
            // Loop through each row to process the data
            for ($row = 2; $row <= $highestRow; $row++) {
                // Assuming column A contains Nom, column B contains Email, column C contains Apogie, and column D contains notes
                $nom = $worksheet->getCell('A' . $row)->getValue();
                $email = $worksheet->getCell('B' . $row)->getValue();
                $apogie = $worksheet->getCell('C' . $row)->getValue();
                $marks = $worksheet->getCell('D' . $row)->getValue();
                
                // Find the studentid based on the apogie
                $stmt = $dbh->prepare("SELECT * FROM tblstudents WHERE RollId = :apogie");
                $stmt->execute(array(':apogie' => $apogie));
                $student = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($student) {
                    $studentid = $student['StudentId'];
                    
                    // Check if there is already a result for the student and module
                    $stmt = $dbh->prepare("SELECT * FROM tblresult WHERE StudentId = :studentid AND ClassId = :class AND SubjectId = :module");
                    $stmt->execute(array(':studentid' => $studentid, ':class' => $class, ':module' => $module));
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    if ($result) {
                        // Update the existing result
                        $resultId = $result['id'];
                        $sql = "UPDATE tblresult SET marks = :marks WHERE id = :resultId";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':marks', $marks, PDO::PARAM_STR);
                        $query->bindParam(':resultId', $resultId, PDO::PARAM_INT);
                        $query->execute();
                    } else {
                        // Insert a new result
                        $sql = "INSERT INTO tblresult(StudentId, ClassId, SubjectId, marks) VALUES(:studentid, :class, :module, :marks)";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
                        $query->bindParam(':class', $class, PDO::PARAM_STR);
                        $query->bindParam(':module', $module, PDO::PARAM_STR);
                        $query->bindParam(':marks', $marks, PDO::PARAM_STR);
                        $query->execute();
                    }
                } else {
                    // Student not found, handle accordingly (e.g., log an error or skip)
                    // For simplicity, I'm logging a message here
                    error_log("Student with apogie $apogie not found");
                }
            }
            $msg = "Résultats importés avec succès";
        } catch (Exception $e) {
            // Handle any exceptions that occur during file loading or processing
            $error = "Erreur lors de l'importation des résultats: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IWA Administrateur Ajouter des résultats </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>
<body class="top-navbar-fixed">
<div class="main-wrapper">
    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php');?>
    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
    <div class="content-wrapper">
        <div class="content-container">
            <!-- ========== LEFT SIDEBAR ========== -->
            <?php include('includes/leftbar.php');?>
            <!-- /.left-sidebar -->
            <div class="main-page">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-6">
                            <h2 class="title">importer des résultats</h2>
                        </div>
                    </div>
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> page d'accueil</a></li>
                                <li class="active">importer Résultats des étudiants</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>done!</strong><?php echo htmlentities($msg); ?>
                                        </div>
                                    <?php } elseif($error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="classSelect" class="col-sm-2 control-label">Classe</label>
                                            <div class="col-sm-10">
                                                <select name="class" id="classSelect" class="form-control clid" onchange="showDownloadButton(this.value);" required="required">
                                                    <option value="">Sélectionnez une classe</option>
                                                    <?php
                                                    $sql = "SELECT * FROM tblclasses";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {
                                                            ?>
                                                            <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Add download button -->
                                        <div id="downloadButton" style="display: none;" class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" class="btn btn-primary" onclick="downloadExcel()">Télécharger Excel</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="moduleSelect" class="col-sm-2 control-label">Module</label>
                                            <div class="col-sm-10">
                                                <select name="module" id="moduleSelect" class="form-control">
                                                    <!-- Options will be dynamically populated based on the selected class -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="file" class="col-sm-2 control-label">Fichier Excel</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file" id="file" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Ajouter le résultat</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /.main-wrapper -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>
    <script src="js/prism/prism.js"></script>
    <script src="js/select2/select2.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(function($) {
            $(".js-states").select2();
            $(".js-states-limit").select2({
                maximumSelectionLength: 2
            });
            $(".js-states-hide").select2({
                minimumResultsForSearch: Infinity
            });
        });

        function showDownloadButton(classId) {
            if (classId !== "") {
                $("#downloadButton").show();
                // Fetch student names based on the selected class
                $.ajax({
                    type: "POST",
                    url: "get_student_names.php",
                    data: { classId: classId },
                    success: function(data) {
                        $("#studentid").html(data);
                    }
                });
            } else {
                $("#downloadButton").hide();
            }
        }

        function downloadExcel() {
            var classId = $("#classSelect").val();
            // Send an AJAX request to the PHP script to generate the Excel file
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "generate_excel.php?classId=" + classId, true);
            xhr.responseType = "blob";

            xhr.onload = function() {
                if (this.status === 200) {
                    // Create a temporary link element to trigger the download
                    var blob = new Blob([this.response], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement("a");
                    a.href = url;
                    a.download = "student_data.xlsx";
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    window.URL.revokeObjectURL(url);
                }
            };

            xhr.send();
        }

        // Function to populate the module selection dropdown with subjects based on the selected class
        function showModules(classId) {
            if (classId !== "") {
                // Fetch subjects based on the selected class
                $.ajax({
                    type: "POST",
                    url: "get_subjects.php", // Replace with the appropriate PHP script
                    data: { classId: classId },
                    success: function(data) {
                        // Populate the module selection dropdown with fetched subjects
                        $("#moduleSelect").html(data);
                    }
                });
            } else {
                // Clear the module selection dropdown if no class is selected
                $("#moduleSelect").html("<option value=''>Sélectionnez un module</option>");
            }
        }

        // Call the showModules function when the class selection changes
        $("#classSelect").change(function() {
            var classId = $(this).val();
            showModules(classId);
        });
    </script>
</body>
</html>
<?php } ?>
