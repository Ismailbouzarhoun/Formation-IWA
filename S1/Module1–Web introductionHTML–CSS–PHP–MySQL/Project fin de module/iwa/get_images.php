<?php
    include('../StudentResult/includes/config.php');

    $sql = "SELECT DISTINCT title FROM tblGalerie"; // Fetch distinct categories
    $query = $dbh->prepare($sql);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_COLUMN);

    foreach ($categories as $category) {
        echo '<div class="container">';
        echo '<h3 class="clickable-title" data-category="' . $category . '">' . $category . '</h3>';
        echo '<div class="row" id="images-container-' . $category . '">';

        $sql = "SELECT title, imges FROM tblGalerie WHERE title = :category"; // Fetch images for each category
        $query = $dbh->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->execute();
        $images = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($images as $image) {
            echo '<div class="col-md-3">';
            echo '<img src="../StudentResult/uploads/' . $image['imges'] . '" alt="' . $image['title'] . '" width="100%" height="auto">';
            echo '<p>' . $image['title'] . '</p>';
            echo '</div>';
        }

        echo '</div>'; // .row
        echo '</div>'; // .container
    }
    ?>