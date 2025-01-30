<?php
require_once 'C:\xampp\htdocs\Fleur_Loca\config\config.php';

$error_message = "";

if (isset($_POST['signup'])) {
    $admin_name = $_POST['admin_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error_message = "Password Not Matched.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $sql = "SELECT * FROM admin WHERE admin_email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            $error_message = "Woops! Email already exists.";
        } else {
            // Insert new admin
            $sql = "INSERT INTO admin (admin_name, admin_email, admin_password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $admin_name, $email, $hashed_password);
            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Registered Successfully";
            } else {
                $error_message = "Woops! Something went wrong.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleur Loca - Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminlogin.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <style>

    </style>
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
</head>
<body>

<section class="sign-in">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/fleurlogo.png" alt="" />
            </a>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center" id="adminsignup">
        <form action="" class="form-signup border shadow p-3 rounded" method="POST">
            <h2 class="modal-title">Admin Signup</h2>
            <hr class="mb-3">
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="admin_name" class="form-control input-lg" placeholder="Your Name" name="admin_name" required>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control input-lg" placeholder="Email Address" id="email" name="email" required>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" required>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control input-lg" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
                </div>
            </div>

            <div class="form-group d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-block btn-primary" name="signup" id="signup">Signup</button>
            </div>
            <div class="container text-center mt-5">
                <p>Already have an account? <a href="admin.php">Login here</a></p>
            </div>
        </form>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<?php if (!empty($error_message)): ?>
    <div class="alert alert-error" id="alert-error">
        <span class="close-button" onclick="closeAlert()">&times;</span>
        <p><?php echo $error_message; ?></p>
    </div>
<?php endif; ?>

<?php if (!empty($success_message)): ?>
    <div class="alert alert-success" id="alert-success">
        <span class="close-button" onclick="closeAlert()">&times;</span>
        <p><?php echo $success_message; ?></p>
    </div>
<?php endif; ?>

<script>
    function closeAlert() {
        var alertBox = document.querySelector(".alert");
        if (alertBox) { alertBox.remove(); }
    }
</script>
</body>
</html>
