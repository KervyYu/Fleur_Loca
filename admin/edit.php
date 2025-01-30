<?php
// Include database connection file
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

$message = array();

session_start(); // Start the session

if (isset($_SESSION['adminID'])) {
    $adminID = $_SESSION['adminID']; // Get the adminID of the logged-in admin

    if (isset($_POST['submit'])) {
        $id = $_GET['update']; // Get the admin ID from the URL parameter
        $adminName = $_POST['admin_name'];
        $email = $_POST['admin_email'];
        $password = $_POST['admin_password']; // New plain text password

        // Check if a new password is provided
        if (!empty($password)) {
            // Hash the new password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        }

        // SQL Update query for admin
        if (!empty($password)) {
            // Update password along with other fields
            $sql = "UPDATE admin SET admin_name = ?, admin_email = ?, admin_password = ? WHERE adminID = ?";
            // Prepare the SQL statement
            $stmt = mysqli_prepare($conn, $sql);
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "sssi", $adminName, $email, $hashed_password, $id);
        } else {
            // Update other fields excluding password
            $sql = "UPDATE admin SET admin_name = ?, admin_email = ? WHERE adminID = ?";
            // Prepare the SQL statement
            $stmt = mysqli_prepare($conn, $sql);
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "ssi", $adminName, $email, $id);
        }

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Profile updated successfully! New Email: $email";
            header('Location: /Fleur_Loca/admin/editprofile.php');
            exit(); // Terminate script after redirection
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/addalbum.css">
    <link rel="stylesheet" href="css/adminhome.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/style.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/header.css">
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="d-flex" id="wrapper">
    <?php include 'C:\xampp\htdocs\Fleur_loca\admin\adminsidebar.php' ?>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="dashboard d-flex align-items-center">
                <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Edit Profile</h2>
            </div>
        </nav>
        <div class="container">
            <div class="card w-100">
                <div class="card-header" id="card-header">
                    Edit Profile
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST" enctype="multipart/form-data" name="upload">
                        <?php
                        // Fetch details of the logged-in admin
                        $sql = "SELECT * FROM admin WHERE adminID = $adminID";
                        $query_run = mysqli_query($conn, $sql);
                        if ($query_run && mysqli_num_rows($query_run) > 0) {
                            $row = mysqli_fetch_assoc($query_run); // Fetch the admin data
                            ?>
                            <div class="mb-3">
                                <label for="adminName" class="label">Name:</label>
                                <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?php echo $row['admin_name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="adminEmail" class="label">Email:</label>
                                <input type="email" class="form-control" id="admin_email" name="admin_email" value="<?php echo $row['admin_email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="adminPassword" class="label">Password:</label>
                                <input type="password" class="form-control" id="admin_password" name="admin_password" value="<?php echo $row['admin_password']; ?>">
                            </div>

                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
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
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</html>
