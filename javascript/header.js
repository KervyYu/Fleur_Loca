document.write('\
<link rel="stylesheet" href="css/header.css" />\
<header>\
  <nav class="navbar navbar-expand-lg">\
    <div class="container-fluid">\
      <a class="navbar-brand" href="index.php">\
        <img src="images/fleurlogo.png" alt="" />\
      </a>\
      <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" type="button"\
        data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"\
        aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">\
        <span class="toggler-icon top-bar"></span>\
        <span class="toggler-icon middle-bar"></span>\
        <span class="toggler-icon bottom-bar"></span>\
      </button>\
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" data-bs-backdrop="false">\
        <div class="offcanvas-header">\
          <a class="offcanvas-brand" href="index.html"> <img src="/Fleur_Loca/images/fleurlogo.png" alt="" />\</a>\
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>\
        </div>\
        <div class="offcanvas-body">\
          <ul class="navbar-nav">\
            <li class="nav-item">\
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>\
            </li>\
            <li class="nav-item">\
              <a class="nav-link" href="gallerypage.php">Gallery</a>\
            </li>\
            <li class="nav-item">\
              <a class="nav-link" href="aboutpage.php">About</a>\
            </li>\
            <li class="nav-item">\
              <a class="nav-link" href="contactpage.php">Contact</a>\
            </li>\
          </ul>\
        </div>\
      </div>\
    </div>\
  </nav>\
</header>\
');
