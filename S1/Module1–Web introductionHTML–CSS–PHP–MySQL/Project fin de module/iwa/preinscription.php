<?php
session_start();
error_reporting(0);
include('../StudentResult/includes/config.php');

if (isset($_POST['Envoyer'])) {
    // Retrieve form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $diplome = $_POST['diplome'];
    $etablissement = $_POST['etablissement'];
    $filiere = $_POST['filiere'];
    $annee_obtention = $_POST['annee_obtention'];
    $email = $_POST['email'];

    // Validate data (add more validation as needed)
    if (empty($nom) || empty($prenom) || empty($telephone) || empty($diplome) || empty($etablissement) || empty($filiere) || empty($annee_obtention) || empty($email)) {
        $error = "Veuillez remplir tous les champs obligatoires.";
    } else {
        // Process file uploads
        $cv = $_FILES['cv']['name'];
        $cv_tmp = $_FILES['cv']['tmp_name'];

        $releve1 = $_FILES['releve1']['name'];
        $releve1_tmp = $_FILES['releve1']['tmp_name'];

        $releve2 = $_FILES['releve2']['name'];
        $releve2_tmp = $_FILES['releve2']['tmp_name'];

        // Create a folder with user's name if it doesn't exist
        $user_folder = "../StudentResult/uploads/" . $nom . "_" . $prenom;
        if (!file_exists($user_folder)) {
            mkdir($user_folder, 0777, true);
        }

        // Move files to the user's folder
        move_uploaded_file($cv_tmp, $user_folder . "/" . $cv);
        move_uploaded_file($releve1_tmp, $user_folder . "/" . $releve1);
        move_uploaded_file($releve2_tmp, $user_folder . "/" . $releve2);

        // Insert data into the database
        $sql = "INSERT INTO tblpreinscription (Nom, Prenom, Telephone, Diplome, Etablissement, Filiere, AnneeObtention, Email, CV, Releve1, Releve2) 
                VALUES (:nom, :prenom, :telephone, :diplome, :etablissement, :filiere, :annee_obtention, :email, :cv, :releve1, :releve2)";

        $query = $dbh->prepare($sql);

        $query->bindParam(':nom', $nom, PDO::PARAM_STR);
        $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        $query->bindParam(':diplome', $diplome, PDO::PARAM_STR);
        $query->bindParam(':etablissement', $etablissement, PDO::PARAM_STR);
        $query->bindParam(':filiere', $filiere, PDO::PARAM_STR);
        $query->bindParam(':annee_obtention', $annee_obtention, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':cv', $cv, PDO::PARAM_STR);
        $query->bindParam(':releve1', $releve1, PDO::PARAM_STR);
        $query->bindParam(':releve2', $releve2, PDO::PARAM_STR);

        // Execute the query and handle errors
        try {
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();

            if ($lastInsertId) {
                $msg = "Votre préinscription a été soumise avec succès.";
            } else {
                $error = "Une erreur s'est produite. Veuillez réessayer.";
            }
        } catch (PDOException $e) {
            $error = "Erreur de base de données: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>IWA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img src="img/Logo.png" width="200px" height="80px"></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Accueil</a>
                <a href="about.html" class="nav-item nav-link">À propos</a>
                <a href="courses.html" class="nav-item nav-link">Programme</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
                <a href="galerie.php" class="nav-item nav-link">galerie</a>
                <a href="preinscription.php" class="nav-item nav-link active">Préinscription</a>
            </div>
            <a href="../StudentResult/index.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">se connecter<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Préinscription</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <style>
        form{
            width: 700px;
            margin-left: 25%;
        }
        #entete{
            text-align: center;
        }
        .text_input{
            width: 100%;
            height: 35px;
            background-color: #f7f6f6;
            border: 1;
            border-radius: 5px;
        }
        #diplome{
            width: 30%;
        }
        #button{
            background-color: rgb(79, 165, 79);
            color: white;
            width: 100px;
            height: 30px;
            border: 0;
        }
        #p_button{
            text-align: center;
        }
        #diplome{
            width: 300px;
            height: 25px;
        }
        .text_input.error {
            border-color: red;
        }
    </style>
     <?php if($msg){?>
<div style="text-align:center" class="alert alert-success left-icon-alert" role="alert">
 <strong>done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div style="text-align:center" class="alert alert-danger left-icon-alert" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
</div>
<?php } ?>
    <!-- Contact Start -->
    <form method="post" enctype="multipart/form-data">
        <h4 id="entete">Formulaire de candidature a la formation IWA (Pre-inscription)</h5>
        <p>Vous etes invite a fournir les informations ci-dessus: </p>
        <label>Nom</label></br>
        <input type="text" class="text_input <?= (isset($error) && empty($nom)) ? 'error' : '' ?>" name="nom" value="<?= isset($nom) ? htmlentities($nom) : '' ?>" name="nom"></br></br></br>

        <label>Prenom</label></br>
        <input type="text" class="text_input <?= (isset($error) && empty($prenom)) ? 'error' : '' ?>" name="prenom" value="<?= isset($prenom) ? htmlentities($prenom) : '' ?>" name="prenom"></br></br></br>

        <label>Telephone</label></br>
        <input type="text" class="text_input <?= (isset($error) && empty($telephone)) ? 'error' : '' ?>" name="telephone" value="<?= isset($telephone) ? htmlentities($telephone) : '' ?>" name="telephone"></br></br></br>

        <!-- Add name attribute to select -->
        <p>Dernier diplome Obtenu </br>
            <select class="text_input <?= (isset($error) && empty($diplome)) ? 'error' : '' ?>" name="diplome" value="<?= isset($diplome) ? htmlentities($diplome) : '' ?>" name="diplome" id="diplome">
                <option value="">--Veuillez choisir une option--</option>
                <option value="LST">LST</option>
                <option value="LP">LP</option>
                <option value="LF">LF</option>
            </select>
        </p>

        <label>Etablissement, ville et pays</label></br>
        <input type="text" class="text_input <?= (isset($error) && empty($etablissement)) ? 'error' : '' ?>" name="etablissement" value="<?= isset($etablissement) ? htmlentities($etablissement) : '' ?>" name="etablissement"></br></br></br>

        <label>Filliere</label></br>
        <input type="text" class="text_input <?= (isset($error) && empty($filiere)) ? 'error' : '' ?>" name="filiere" value="<?= isset($filiere) ? htmlentities($filiere) : '' ?>" name="filiere"></br></br></br>

        <label>Annee d'obtention</label></br>
        <input type="number" class="text_input <?= (isset($error) && empty($annee_obtention)) ? 'error' : '' ?>" name="annee_obtention" value="<?= isset($annee_obtention) ? htmlentities($annee_obtention) : '' ?>" name="annee_obtention"></br></br></br>

        <label>Email</label></br>
        <input type="email" class="text_input <?= (isset($error) && empty($email)) ? 'error' : '' ?>" name="email" value="<?= isset($email) ? htmlentities($email) : '' ?>" name="email"></br></br></br>

        <label>CV(pdfile < 5MB)</label></br>
        <input type="file" class="file" name="cv"></br>

        <!-- Add name attribute to file input for releve1 -->
        <p>Releves des notes de la derniere annee d'etudes
            <label>(Releve1< 5MB)</label></br>
            <input type="file" class="file" name="releve1">
        </p>

        <!-- Add name attribute to file input for releve2 -->
        <p>Releves des notes de l'avant derniere annee d'etudes
            <label>(Releve < 5MB)</label></br>
            <input type="file" class="file" name="releve2">
        </p></br>

        <p id="p_button">
            <button type="submit" name="Envoyer" id="button">Envoyer</button>
        </p>
    </form>
    <!-- Contact End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="about.html">à propos de nous</a>
                    <a class="btn btn-link" href="contact.html">Contactez-nous</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Faculté des Sciences de Tétouan, Département d'informatique</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212 6 62 10 21 67</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>iwa@uae.ac.ma</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Galerie</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-4.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-5.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-6.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Préinscription</h4>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <a href="preinscription.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Préinscription<i class="fa fa-arrow-right ms-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>