<?php

require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';


session_start();
error_reporting(0);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/gallery.css" />
    <script
        src="https://kit.fontawesome.com/bf1c643ee2.js"
        crossorigin="anonymous"
    ></script>
</head>
<body>
<script src="javascript/header.js"></script>

<section id="gallerybanner">
    <div class="gallery-content">
        <div class="container">
            <h1>Our Gallery</h1>
        </div>
    </div>
</section>

<div class="gallery-intro col-12 text-center">
    <h1>See our flowers bloom</h1>
    <div class="divider"></div>
    <p>We thank each and everyone who entrusted their flower needs to us.</p>
</div>

    <!--bouquet-->
    <section id="gallerymain">
        <!--bouquet-->
        <div class="container">
            <div class="category pb-4 text-inner">
                <?php
                if(isset($_GET['album_id'])) {
                    $albumID = $_GET['album_id'];

                    // Query the database to retrieve images for the selected album
                    $sql = "SELECT * FROM gallery WHERE album_id = $albumID";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query was successful
                    if ($result) {
                        // Fetch the row from the result set
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <h2><?php echo $row['gallery_name']; ?></h2>
                        <?php
                    }
                }
                ?>
            </div>
                <div class="gallerypic row reveal">
                    <?php
                    if(isset($_GET['album_id'])) {
                    $albumID = $_GET['album_id'];

                    // Query the database to retrieve images for the selected album
                    $sql = "SELECT * FROM gallery WHERE album_id = $albumID";
                    $result = mysqli_query($conn, $sql);

                    // Display images
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                   <div class="galleryimage  col-md-3 col-6 py-1 py-md-0">
                        <div class="container">
                            <img src="/Fleur_Loca/gallerypic/<?php echo $row['gallery_image']; ?>" alt="Album Image" width="300px" height="350px">
                        </div>
                    </div>
                        <?php
                            };
                        };
                    };
                    ?>
                </div>
        </div>

</section>

<section id="followbanner">
    <div class="follow-section">
        <h1>Love what you've seen?</h1>
        <p>Check out our social media accounts!</p>
        <div class="followusbtn">
            <a
                class="btn facebook-btn"
                href="https://www.facebook.com/FleurLocaFlorist"
                target="_blank"
                role="button"
            >Facebook</a
            >
            <a
                class="btn insta-btn"
                href="https://www.instagram.com/fleurlocaflorist"
                target="_blank"
                role="button"
            >Instagram</a
            >
        </div>
    </div>
</section>

<a href="#" class="to-top">
    <i class="fa-solid fa-turn-up"></i>
</a>

<script src="javascript/footer.js"></script>
</body>
<script type="text/javascript" src="javascript/app.js"></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"
></script>
</html>

