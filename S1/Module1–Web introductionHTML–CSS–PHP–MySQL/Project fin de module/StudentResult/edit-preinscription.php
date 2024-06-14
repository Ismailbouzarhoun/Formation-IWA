<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    $stid = intval($_GET['stid']);

    if (isset($_POST['submit'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $diplome = $_POST['diplome'];
        $telephone = $_POST['telephone'];
        $etablissement = $_POST['etablissement'];
        $filiere = $_POST['filiere'];
        $annee_obtention = $_POST['annee_obtention'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $commentaire = $_POST['commentaire'];

        // Assuming 'cv', 'releve1', and 'releve2' are the correct file input names
        $cv = $_FILES['cv']['name'];
        $releve1 = $_FILES['releve1']['name'];
        $releve2 = $_FILES['releve2']['name'];

        // Move uploaded files to the desired folder (update the path accordingly)
        if (!empty($_FILES['cv']['name'])) {
            move_uploaded_file($_FILES['cv']['tmp_name'], 'uploads/' . $nom . '_' . $prenom . '_' . $cv);
        }

        if (!empty($_FILES['releve1']['name'])) {
            move_uploaded_file($_FILES['releve1']['tmp_name'], 'uploads/' . $nom . '_' . $prenom . '_' . $releve1);
        }

        if (!empty($_FILES['releve2']['name'])) {
            move_uploaded_file($_FILES['releve2']['tmp_name'], 'uploads/' . $nom . '_' . $prenom . '_' . $releve2);
        }

        $sql = "UPDATE tblpreinscription SET Nom=:nom, Prenom=:prenom, Diplome=:diplome, Telephone=:telephone, Etablissement=:etablissement, Filiere=:filiere, AnneeObtention=:annee_obtention, Email=:email, Status=:status";

        if (!empty($_FILES['cv']['name'])) {
            $sql .= ", CV=:cv";
        }

        if (!empty($_FILES['releve1']['name'])) {
            $sql .= ", Releve1=:releve1";
        }

        if (!empty($_FILES['releve2']['name'])) {
            $sql .= ", Releve2=:releve2";
        }

        $sql .= ", commentaire=:commentaire WHERE id=:stid";

        $query = $dbh->prepare($sql);
        $query->bindParam(':nom', $nom, PDO::PARAM_STR);
        $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindParam(':diplome', $diplome, PDO::PARAM_STR);
        $query->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        $query->bindParam(':etablissement', $etablissement, PDO::PARAM_STR);
        $query->bindParam(':filiere', $filiere, PDO::PARAM_STR);
        $query->bindParam(':annee_obtention', $annee_obtention, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);

        if (!empty($_FILES['cv']['name'])) {
            $query->bindParam(':cv', $cv, PDO::PARAM_STR);
        }

        if (!empty($_FILES['releve1']['name'])) {
            $query->bindParam(':releve1', $releve1, PDO::PARAM_STR);
        }

        if (!empty($_FILES['releve2']['name'])) {
            $query->bindParam(':releve2', $releve2, PDO::PARAM_STR);
        }

        $query->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
        $query->bindParam(':stid', $stid, PDO::PARAM_INT); // Assuming id is an integer

        // Execute the query
        $query->execute();

        $msg = "Les données de l'étudiant ont été mises à jour";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IWA Administrateur modifier les informations d'étudiant qui ont fait le preinscription</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
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
                                    <h2 class="title">preinscription</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> page d'accueil</a></li>
                                
                                        <li class="active">preinscription</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Modifier les informations sur l'étudiant</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">
<?php 

$sql = "SELECT * from tblpreinscription where id=:stid";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">nom</label>
<div class="col-sm-10">
<input type="text" name="nom" class="form-control" id="nom" value="<?php echo htmlentities($result->Nom)?>" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">prenom</label>
<div class="col-sm-10">
<input type="text" name="prenom" class="form-control" id="prenom" value="<?php echo htmlentities($result->Prenom)?>" maxlength="5" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Diplome</label>
<div class="col-sm-10">
<?php  $gndr=$result->Diplome;
if($gndr=="LST")
{
?>
<input type="radio" name="diplome" value="LST" required="required" checked>LST<input type="radio" name="diplome" value="LP" required="required">LP<input type="radio" name="diplome" value="LF" required="required">LF
<?php }?>
<?php  
if($gndr=="LP")
{
?>
<input type="radio" name="diplome" value="LP" required="required" checked>LP<input type="radio" name="diplome" value="LST" required="required">LST<input type="radio" name="diplome" value="LF" required="required">LF
<?php }?>
<?php  
if($gndr=="LF")
{
?>
<input type="radio" name="diplome" value="LF" required="required" checked>LF<input type="radio" name="diplome" value="LP" required="required">LP<input type="radio" name="diplome" value="LST" required="required">LST
<?php }?>


</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Telephone</label>
<div class="col-sm-10">
<input type="text" name="telephone" class="form-control" id="telephone" value="<?php echo htmlentities($result->Telephone)?>" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Etablissement</label>
<div class="col-sm-10">
<input type="text" name="etablissement" class="form-control" id="etablissement" value="<?php echo htmlentities($result->Etablissement)?>" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Filiere</label>
<div class="col-sm-10">
<input type="text" name="filiere" class="form-control" id="filiere" value="<?php echo htmlentities($result->Filiere)?>" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Annee d'obtention</label>
<div class="col-sm-10">
<input type="text" name="annee_obtention" class="form-control" id="annee_obtention" value="<?php echo htmlentities($result->AnneeObtention)?>" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email</label>
<div class="col-sm-10">
<input type="email" name="email" class="form-control" id="email" value="<?php echo htmlentities($result->Email)?>" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Statut</label>
<div class="col-sm-10">
<?php  $stats=$result->Status;
if($stats==0)
{
?>
<input type="radio" name="status" value="1" required="required" checked>Active <input type="radio" name="status" value="0" required="required">Block 
<?php }?>
<?php  
if($stats==1)
{
?>
<input type="radio" name="status" value="1" required="required" >Active <input type="radio" name="status" value="0" required="required" checked>Block 
<?php }?>
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">CV</label>
<div class="col-sm-10">
<input type="file" name="cv" class="form-control" id="cv" value="<?php echo htmlentities($result->CV)?>" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Releves des notes de la derniere annee d'etudes</label>
<div class="col-sm-10">
<input type="file" name="releve1" class="form-control" id="releve1" value="<?php echo htmlentities($result->Releve1)?>" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Releves des notes de l'avant derniere annee d'etudes</label>
<div class="col-sm-10">
<input type="file" name="releve2" class="form-control" id="releve2" value="<?php echo htmlentities($result->Releve2)?>" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Commentaire</label>
<div class="col-sm-10">
<input type="text" name="commentaire" class="form-control" id="commentaire" value="<?php echo htmlentities($result->commentaire)?>" required="required" autocomplete="off">
</div>
</div>

</div>
</div>

<?php }} ?>                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-warning">modifier</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
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
        </script>
    </body>
</html>
<?PHP } ?>
