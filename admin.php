<?php
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

session_start();
error_reporting(0);

if (isset($_POST['loginadmin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE admin_email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['admin_password'];
            // Verify password hash
            if (password_verify($password, $hashed_password)) {
                $_SESSION['adminID'] = $row['adminID']; // Set adminID in session
                header("Location: /Fleur_Loca/admin/adminhome.php");
                exit;
            } else {
                echo 'Invalid credentials';
            }
        } else {
            echo 'Invalid credentials';
        }
    } else {
        echo 'Oops! Something went wrong.';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fleur Loca</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
            crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/adminlogin.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <script
            src="https://kit.fontawesome.com/bf1c643ee2.js"
            crossorigin="anonymous"
    ></script>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/fleurlogo.png" alt="" />
        </a>
    </div>
</nav>

<section class="sign-in">
    <div class="container d-flex justify-content-center align-items-center" id="adminlogin">
        <form action="" class="form-signup border shadow p-3 rounded" method="POST">
            <h2 class="modal-title">Admin</h2>
            <hr class="mb-3">
            <?php if(isset($error_message)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
            <div class="col-sm-9 col-sm-9">
                <div class="form-group" id="logform">
                    <label>Email</label><input type="email" class="form-control input-lg " placeholder="Email Address" id="email" name="email" required>
                </div>
            </div>
            <div class="col-sm-9 col-sm-9">
                <div class="form-group" id="logform">
                    <label>Password</label> <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" required>
                </div>
            </div>

            <div class="form-group d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-block" name="loginadmin" id="loginadmin">Login</button>
            </div>
            <div class="container d-flex justify-content-center align-items-center pt-3">
                <p>Don't have an account? <a href="/Fleur_Loca/adminsignup.php">Sign up</a></p>
            </div>
        </form>
    </div>
</section>


<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"
></script>
</body>
</html>
