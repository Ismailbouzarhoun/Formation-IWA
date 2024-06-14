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
    
    <style>
        .clickable-title {
            cursor: pointer;
        }

        .category-container {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .category-container:hover {
            transform: scale(1.05);
        }

        .image-frame {
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .image-frame:hover {
            transform: scale(1.05);
        }

    </style>
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
                <a href="courses.html" class="nav-item nav-link">Formation</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
                <a href="galerie.php" class="nav-item nav-link active">galerie</a>
                <a href="preinscription.php" class="nav-item nav-link">Préinscription</a>
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
                    <h1 class="display-3 text-white animated slideInDown">Galerie photos</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <?php
    include('../StudentResult/includes/config.php');

    $sql = "SELECT DISTINCT title FROM tblGalerie"; // Fetch distinct categories
    $query = $dbh->prepare($sql);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_COLUMN);

    foreach ($categories as $category) {
        echo '<div class="container border border-primary mb-4 category-container">';
        echo '<h3 class="clickable-title" data-category="' . $category . '"><i class="bi bi-arrow-down"></i> ' . $category . '</h3>';
        echo '<div class="row" id="images-container-' . strtolower(str_replace(' ', '-', $category)) . '">'; // Use a unique identifier for each container
    
        $sql = "SELECT title, imges FROM tblGalerie WHERE title = :category"; // Fetch images for each category
        $query = $dbh->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->execute();
        $images = $query->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($images as $image) {
            echo '<div class="col-md-3 image-frame">';
            // Wrap the image with an anchor tag
            echo '<a href="../StudentResult/uploads/' . $image['imges'] . '">';
            echo '<img src="../StudentResult/uploads/' . $image['imges'] . '" alt="' . $image['title'] . '" width="100%" height="auto">';
            echo '</a>';
            echo '<p>' . $image['title'] . '</p>';
            echo '</div>';
        }
    
        echo '</div>'; // .row
        echo '</div>'; // .container
    }
    ?>
    
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
    <script>
    // Ensure the document is fully loaded before executing JavaScript code
    $(document).ready(function () {
    // Add click event listener to each clickable title
    $('.clickable-title').click(function () {
        var category = $(this).data('category'); // Get the category associated with the clicked title
        // Toggle the visibility of the image frames within the clicked category container
        $(this).siblings('.row').find('.image-frame').toggle();
        
        // Toggle the arrow icon
        $(this).find('i').toggleClass('bi-arrow-down bi-arrow-up');
    });
});
</script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
