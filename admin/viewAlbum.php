<?php
// Include database connection file
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

session_start();
error_reporting(0);

if(isset($_SESSION['adminID'])) {
    $adminID = $_SESSION['adminID'];

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        // Check if there are images associated with the album
        $sql = "SELECT COUNT(*) as imageCount FROM gallery WHERE album_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $imageCount = $row['imageCount'];

        // If there are images, display a warning
        if ($imageCount > 0) {
            // Display warning and confirm deletion
            echo "<script>
                    if(confirm('There are images inside this album. Are you sure you want to delete?')) {
                        window.location.href = '/Fleur_Loca/admin/viewAlbum.php?confirmedDelete=$id';
                    }
                </script>";
        } else {
            // If no images, proceed with deletion
            mysqli_query($conn, "DELETE FROM album WHERE albumID = '$id'");
            header('Location: /Fleur_Loca/admin/viewAlbum.php');
            exit; // Stop further execution after redirection
        }
    }

    // Check if confirmedDelete parameter is set
    if(isset($_GET['confirmedDelete'])) {
        $id = $_GET['confirmedDelete'];

        // Delete both album and associated images
        mysqli_query($conn, "DELETE FROM album WHERE albumID = '$id'");
        mysqli_query($conn, "DELETE FROM gallery WHERE album_id = '$id'");
        header('Location: /Fleur_Loca/admin/viewAlbum.php');
        exit; // Stop further execution after redirection
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
    <link rel="stylesheet" href="css/adminhome.css">
    <link rel="stylesheet" href="css/viewAlbum.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/style.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/header.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/contact.css">


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
                <h2 class="fs-2 m-0">View Album</h2>
            </div>
        </nav>


        <div class="container albumtable">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h2>Albums</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Album Name</th>
                                        <th scope="col">Album Image</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM album";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['albumName'] ?></td>
                                                <td><img src="/Fleur_Loca/gallerypic/<?php echo $row['background_image'] ?>" alt="<?php echo $row['albumName'] ?>" class="img-fluid" style="max-width: 150px; height: auto;"></td>
                                                <td><?php echo  $date = date("F j, Y, g:i a", strtotime($row['date'])); ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="d-grid gap-2">
                                                            <a href="/Fleur_Loca/admin/editalbum.php?update=<?php echo $row['albumID']; ?>" class="btn btn-primary">Edit</a>
                                                            <button class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteAlbum" data-album-id="<?php echo $row['albumID']; ?>" data-album-name="<?php echo $row['albumName']; ?>">Delete</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No albums found</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Display the album name dynamically -->
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deleting <span id="albumName"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the album?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- Redirect to delete confirmation page with album ID -->
                <a href="#" class="btn btn-primary btn-block confirm-delete">Delete</a>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>

<script>
    // JavaScript to handle delete button click
    $(document).ready(function () {
        $('.delete-btn').click(function () {
            var albumID = $(this).data('album-id');
            var albumName = $(this).data('album-name');
            $('#albumName').text(albumName);
            $('.confirm-delete').attr('href', '/Fleur_Loca/admin/viewAlbum.php?delete=' + albumID);
        });
    });
</script>

</body>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"
></script>

</html>
