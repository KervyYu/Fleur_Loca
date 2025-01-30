<?php
// Include database connection file
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

$message = array();

if(isset($_POST['submit'])){
    $image_name = $_POST['albumName'];
    $image_background = $_FILES['background_image']['name'];
    $background_image_tmp_name = $_FILES['background_image']['tmp_name'];
    $background_image_folder = 'C:\xampp\htdocs\Fleur_Loca\gallerypic\\'.$image_background;

    if(empty($image_name)) {
        $message[] = 'Please enter the album name.';
    }

    if(empty($image_background)) {
        $message[] = 'Please select a background image.';
    }

    if(empty($message)){ // Check if there are no error messages
        $insert = "INSERT INTO album(albumName, background_image, date) VALUES('$image_name', '$image_background', NOW())";
        $upload = mysqli_query($conn, $insert);
        if($upload){
            move_uploaded_file($background_image_tmp_name, $background_image_folder);
            $message[] = 'New album added successfully';
        }else{
            $message[] = 'Album could not be added to the list';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/addalbum.css">
    <link rel="stylesheet" href="css/adminhome.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/style.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/header.css">


    <script
            src="https://kit.fontawesome.com/bf1c643ee2.js"
            crossorigin="anonymous"
    ></script>
</head>
<body>

<div class="d-flex" id="wrapper">
    <!----Sidebar here---->
    <?php include 'C:\xampp\htdocs\Fleur_loca\admin\adminsidebar.php' ?>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="dashboard d-flex align-items-center">
                <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Add Album</h2>
            </div>
        </nav>



        <div class="container">
            <div class="card w-100">
                <div class="card-header" id="card-header">
                    Fill This Form To Add Album (Only upload jpg files only)
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST" enctype="multipart/form-data" name="upload">
                        <div class="mb-3">
                            <label for="albumName" class="label">Album Name:</label>
                            <input type="text" class="form-control" id="albumName" name="albumName" placeholder="Enter album name">
                            <div class="form-text" id="form-text">Example "Sunset pics"</div>
                        </div>
                        <div class="mb-3">
                            <label for="background_image" class="label">Album Image</label>
                            <input type="file" class="form-control" id="background_image" name="background_image">
                            <div class="form-text" id="form-text">Recomended Image Size in pixel 400 X 300</div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit" name="submit">
                        </div>
                    </form>
                    <div class="message">
                        <?php
                        if(!empty($message)){
                            foreach ($message as $msg){
                                echo '<span class="message">'.$msg.'</span><br>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


    </div>













</body>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"
></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</html>