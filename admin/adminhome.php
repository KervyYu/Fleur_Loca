<?php
// Include database connection file
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

// Start session
session_start();

$message = array();

if (!isset($_SESSION['adminID'])) {
    // Redirect to login page or display an error message
    header("Location: /Fleur_Loca/adminlogin.php");
    exit; // Stop further execution of the script
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>
        </nav>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="container-fluid px-4">
            <div class="row g-3 my-2">
                <div class="row row-cols-1 row-cols-md-2 g-3 my-2">
                    <div class="col">
                        <div class="dashboard-box p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div class="dashboard-body">
                                <?php
                                $query = "SELECT albumID FROM album ORDER BY albumID";
                                $query_run = mysqli_query($conn, $query);
                                if ($row = mysqli_num_rows($query_run)) {
                                    echo '<h3>' . $row . '</h3>';
                                }else{
                                    echo '<h3>No Data</h3>';
                                }

                                ?>
                                <p class="board-title">Album</p>
                            </div>
                            <i class="fa-solid fa-images fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                        <div class="details">
                            <a href="viewAlbum.php">
                                <div class="panel-footer p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                                    <div class="col-10">
                                        <span>View Details</span>
                                    </div>
                                    <div class="col-2 text-end">
                                        <span><i class="fa fa-arrow-circle-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col">
                        <div class=" dashboard-box p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div class="dashboard-body">
                                <?php
                                $query = "SELECT galleryID FROM gallery ORDER BY galleryID";
                                $query_run = mysqli_query($conn, $query);
                                if ($row = mysqli_num_rows($query_run)) {
                                    echo '<h3>' . $row . '</h3>';
                                }else{
                                    echo '<h3>No Data</h3>';
                                }

                                ?>
                                <p class="board-title">Gallery</p>
                            </div>
                            <i class="fa-solid fa-camera fs-1 border rounded-full secondary-bg p-3" style="color: #F4903A"></i>
                        </div>
                        <div class="details">
                            <a href="viewGallery.php">
                                <div class="panel-footer p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                                    <div class="col-10">
                                        <span>View Details</span>
                                    </div>
                                    <div class="col-2 text-end">
                                        <span><i class="fa fa-arrow-circle-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="activities">
            <div class="activity_title">
                <div class="container-fluid">
                <h3 class="fs-4 mb-3">Recent Activities</h3>
                </div>
            </div>
                <div class="container mt-5">
                    <div class="table-container">
                        <table class="table bg-white rounded shadow-sm  table-responsive text-center text-capitalization">
                            <thead>
                            <tr class="table-header text-center">
                                <th scope="col">Action</th>
                                <th scope="col">Details</th>
                                <th scope="col">Date & Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Fetch records from both gallery and album tables
                            $sql = "SELECT 'image' AS type, galleryID AS id, album_id, gallery_name AS name, date FROM gallery UNION SELECT 'album' AS type, albumID AS id, NULL AS album_id, albumName AS name, date FROM album ORDER BY date DESC";
                            $result = mysqli_query($conn, $sql);
                            // Display records
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $action = '';
                                    $details = '';
                                    if ($row['type'] == 'image') {
                                        $adminSql = "SELECT admin_name FROM admin";
                                        $adminResult = mysqli_query($conn, $adminSql);
                                        if ($adminResult && mysqli_num_rows($adminResult) > 0) {
                                            $adminRow = mysqli_fetch_assoc($adminResult);
                                            $action = "Added Image";
                                        }
                                        if (!empty($row['album_id'])) {
                                            // If album_id is not empty, fetch album name
                                            $albumSql = "SELECT albumName FROM album WHERE albumID = {$row['album_id']}";
                                            $albumResult = mysqli_query($conn, $albumSql);
                                            if ($albumResult && mysqli_num_rows($albumResult) > 0) {
                                                $albumRow = mysqli_fetch_assoc($albumResult);
                                                $details = "Added an image to album '{$albumRow['albumName']}'";
                                            }
                                        }
                                    } elseif ($row['type'] == 'album') {
                                        $adminSql = "SELECT admin_name FROM admin";
                                        $adminResult = mysqli_query($conn, $adminSql);
                                        if ($adminResult && mysqli_num_rows($adminResult) > 0) {
                                            $adminRow = mysqli_fetch_assoc($adminResult);
                                            $action = "Added Album";
                                        }
                                        $details = "Added album '{$row['name']}'";
                                    }
                                    $date = date("F j, Y, g:i a", strtotime($row['date']));
                                    echo "<tr class='text-center'>";
                                    echo "<td>$action</td>";
                                    echo "<td>$details</td>";
                                    echo "<td>$date</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No Recent Activities Yet</td></tr>";
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
        </section>


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