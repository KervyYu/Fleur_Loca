

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminheader.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/style.css">
    <link rel="stylesheet" href="/Fleur_Loca/css/header.css">

    <script
            src="https://kit.fontawesome.com/bf1c643ee2.js"
            crossorigin="anonymous"
    ></script>
</head>
<body>



        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom">
                <a class="navbar-brand d-flex align-items-center ms-4" href="index.php">
                    <img src="/Fleur_Loca/images/fleurlogo.png" alt="" />
                </a>
            </div>


            <div class="list-group list-group-flush my-3">
                    <a href="adminhome.php" class="list-group-item second-text fw-bold">Dashboard</a>
                <li class="list-group-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed bg-transparent second-text fw-bold" data-bs-toggle="collapse" data-bs-target="#album" aria-expanded="false" aria-controls="collapseOne">Album</a>
                    <ul id="album" class="sidebar-dropdown list unstyled collapse" data-bs-parent="#sidebar-wrapper">
                        <li class="sidebar-item">
                            <a href="addAlbum.php" class="sidebar-link bg-transparent second-text fw-bold">Add Album</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="viewAlbum.php" class="sidebar-link bg-transparent second-text fw-bold">View Album</a>

                        </li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed bg-transparent second-text fw-bold" data-bs-toggle="collapse" data-bs-target="#gallery" aria-expanded="false" aria-controls="collapseOne">Gallery</a>
                    <ul id="gallery" class="sidebar-dropdown list unstyled collapse" data-bs-parent="#sidebar-wrapper">
                        <li class="sidebar-item">
                            <a href="addimage.php" class="sidebar-link bg-transparent second-text fw-bold">Add gallery</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="viewGallery.php" class="sidebar-link bg-transparent second-text fw-bold">View gallery</a>
                        </li>
                    </ul>
                </li>
                <li class="list-group">
                    <a class="list-group-item second-text bg-transparent fw-bold" href="editprofile.php">Profile</a>
                </li>
                <a href="/Fleur_Loca/admin.php" class="list-group-item bg-transparent text-danger fw-bold">Logout</a>
            </div>
        </div>














</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</html>