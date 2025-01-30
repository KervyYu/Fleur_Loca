<?php
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

$message = array();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminheader.css">
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
                <h2 class="fs-2 m-0">View Images</h2>
            </div>
        </nav>

        <div class="container">
            <div class="card w-100">
                <div class="card-body p-4">
                    <form action="viewimage.php" method="GET">
                        <label for="album_id" class="label">Select Album to add image:</label><br>
                        <select class="form-select" id="album_id" name="album_id">
                            <option selected>Select Album</option>
                            <?php
                            $sql = "SELECT * FROM album";
                            $query_run = mysqli_query($conn, $sql);

                            if ($query_run && mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>
                                    <option value="<?= $row['albumID'];?>"><?= $row['albumName'];?></option>
                                    <?php
                                }
                            } else {
                                echo "No categories";
                            }
                            ?>
                        </select>
                        <br><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Go Next</button>
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

