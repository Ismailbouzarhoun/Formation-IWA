<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>IWA Fromation</title>
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
                <a href="index.php" class="nav-item nav-link active">Accueil</a>
                <a href="about.html" class="nav-item nav-link">À propos</a>
                <a href="courses.html" class="nav-item nav-link">Programme</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
                <a href="galerie.php" class="nav-item nav-link">galerie</a>
                <a href="preinscription.php" class="nav-item nav-link">Préinscription</a>
            </div>
            <a href="../StudentResult/index.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">se connecter<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5" style="display: flex;">
        <div class="owl-carousel header-carousel" style="width: 50%;">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">DCESS BAC+5</h5>
                                <h1 class="display-3 text-white animated slideInDown">Ingénierie du Web Avancé (IWA)</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Diplôme du Cycle des Etudes Supérieures Spécialisées</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-3.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown">Des societés qui ont recruté des Lauréats d'IWA</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="width: 50%;">
            <div class="row">
            <?php
// Database connection
require '../StudentResult/includes/config.php';

// Fetch all events grouped by title and ordered by registration date (latest first)
$sql = "SELECT title, Description, imges FROM tblGalerie GROUP BY title ORDER BY RegDate DESC";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Container for events with scrolling -->
<div class="container" style="height: 600px; overflow-y: auto;">
<?php foreach ($events as $event) : ?>
    <?php
    // Fetch a random image for each title
    $sql = "SELECT imges FROM tblGalerie WHERE title = :title ORDER BY RAND() LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $event['title']);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="row">
        <div class="col-md-12">
            <!-- Wrap each event card with an anchor tag -->
            <a href="events.php?event=<?php echo urlencode($event['title']); ?>" class="card-link">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <!-- Random image as an icon -->
                            <img src="../StudentResult/uploads/<?php echo $image['imges']; ?>" class="img-fluid rounded-start" alt="Event Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <!-- Event Title -->
                                <h5 class="card-title"><?php echo $event['title']; ?></h5>
                                <!-- Event Description (limited to one line) -->
                                <p class="card-text"><?php echo implode(' ', array_slice(explode(' ', $event['Description']), 0, 10)); ?> ...</p>
                                <!-- "Show More" option -->
                                <p><a href="events.php?event=<?php echo urlencode($event['title']); ?>">Show More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endforeach; ?>

</div>

            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Instructeurs qualifiés</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Classes en ligne</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">des Projets à faire</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">cours avancé</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/carousel-1.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">À PROPOS DE NOUS</h6>
                    <h1 class="mb-4">Bienvenue à IWA</h1>
                    <p class="mb-4">La formation <strong>Ingénierie du Web Avancé (IWA)</strong> est préparée en concertation avec plusieurs sociétés nationales et multinationales pour répondre à un besoin de formation au domaine des technologies web les plus demandées sur le marché du travail national et international.</p>
                    <p class="mb-4"><Strong>Durée de formation :</Strong> 2 ans</p>
                    <p class="mb-4"><strong>Méthode d'enseignement :</strong> en présentiel (Faculté des Sciences de Tétouan), et à distance à travers des plateformes dédiées.</p>
                    <p class="mb-4">Pour candidater à cette formation diplômante, vous êtes invité à remplir ce <a href="#">formulaire de pré-inscription</a> au plutard le 4 Novembre 2023.</p>
                    <p class="mb-4"><strong>Frais de formation :</strong> 40 000 DH pour les 2 années. Payable en 2 tranches.</p>
                    
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">CATÉGORIES</h6>
                <h1 class="mb-5">Débouchés de la formation</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-1.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Développeurs web pour les sociétés nationales et multinationales</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-2.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Développeurs web en freelance</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-3.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Développer des applications mobiles.</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Informaticiens capables de créer des entreprises spécialisées dans le développement web et mobile.</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->


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