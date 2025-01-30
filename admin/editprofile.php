<?php
// Include database connection file
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

$message = array();

session_start();
error_reporting(0);

if(isset($_SESSION['adminID'])) {
$adminID = $_SESSION['adminID'];

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
                <h2 class="fs-2 m-0">Admin Profile</h2>
            </div>
        </nav>


        <div class="container">
            <div class="card w-100">
                <div class="card-header" id="card-header">
                    Admin Profile
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST" enctype="multipart/form-data" name="upload">
                            <?php
                            $sql = "SELECT * FROM admin WHERE adminID = $adminID";
                            $query_run = mysqli_query($conn, $sql);

                            if ($query_run && mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>
                                    <div class="mb-3">
                                        <label for="adminName" class="label">Name:</label>
                                        <input type="email" class="form-control" id="admin_name" name="admin_name" placeholder="<?= $row['admin_name'] ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adminEmail" class="label">Email:</label>
                                        <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="<?= $row['admin_email'] ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adminPassword" class="label">Password:</label>
                                        <input type="password" class="form-control" id="admin_password" name="admin_password" value="<?= $row['admin_password'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <a href="/Fleur_Loca/admin/edit.php?update=<?php echo $row['adminID']; ?>" class="btn btn-primary btn-block">Edit</a>
                                    </div>
                                    <?php
                                }
                            } else {
                                // No admin found with the provided adminID
                                $message[] = "Admin not found.";
                            }
                            } else {
                                // Admin is not logged in
                                $message[] = "You are not logged in.";
                            }
                            ?>
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