<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';

session_start();

if (!empty($_SESSION['_contact_form_error'])) {
    $error = $_SESSION['_contact_form_error'];
    unset($_SESSION['_contact_form_error']);
}

if (!empty($_SESSION['_contact_form_success'])) {
    $success = true;
    unset($_SESSION['_contact_form_success']);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/contact.css" />
    <script
      src="https://kit.fontawesome.com/bf1c643ee2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <script src="javascript/header.js"></script>

    <section id="contactbanner">
      <div class="contact-content">
        <div class="container">
          <h1>Contact Us</h1>
        </div>
      </div>
    </section>
    <section id="contact_section">
      <div class="contact-intro col-12 text-center">
        <h1>Let's Talk Flowers!</h1>
      </div>

      <div class="text-center mb-3" id="contents">
        <div class="contactinfo">
          <div class="col-md-2 col-sm-12 col-xs-12 custom-margin">
            <div class="feats col-xs-2">
              <span class="fa-solid fa-envelope"></span>
            </div>
            <div class="contact col-xs-10">
              <h4>E-Mail</h4>
              <p>fleurloca@outlook.com</p>
            </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12 custom-margin">
            <div class="feats col-xs-2">
              <span class="fa-solid fa-house"></span>
            </div>
            <div class="contact col-xs-10">
              <h4>Address</h4>
              <p>Bayswater, Western Australia</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="contact-body">
      <section class="contactform">
        <div class="contact-title">
          <h1 class="title">For quotes, Get in Touch</h1>

          <div class="container">
            <form action="submit.php" method="POST">
              <div class="contact-form row">
                <div class="form-field col-sm-6 col-sm-6">
                  <input
                    id="firstname"
                    class="input-text"
                    type="text"
                    name="firstname"
                    required
                  />
                  <label for="firstname" class="label">First Name</label>
                </div>
                <div class="form-field col-sm-6 col-sm-6">
                  <input
                    id="lastname"
                    class="input-text"
                    type="text"
                    name="lastname"
                    required
                  />
                  <label for="lastname" class="label">Last Name</label>
                </div>
                <div class="row">
                  <div class="form-field col-xs-4 col-md-4 col-sm-6 col-sm-6">
                    <input
                      id="email"
                      class="input-text"
                      type="text"
                      name="email"
                      required
                    />
                    <label for="email" class="label">E-mail</label>
                  </div>
                  <div class="form-field col-xs-4 col-md-4 col-sm-6 col-sm-6">
                    <input
                      id="number"
                      class="input-text"
                      type="text"
                      name="number"
                      required
                    />
                    <label for="number" class="label">Contact Number</label>
                  </div>
                  <div class="form-field col-xs-4 col-md-4 col-sm-6 col-sm-6">
                    <input
                      id="date"
                      class="input-text"
                      type="date"
                      name="date"
                    />
                    <label for="date" class="label"
                      >Date of Event <span>(month/day/year)</span></label
                    >
                  </div>
                </div>
                <div class="form-field col-sm-6 col-sm-6">
                  <input
                    id="time"
                    class="input-text"
                    type="text"
                    name="time"
                    required
                  />
                  <label for="time" class="label"
                    >CEREMONY & RECEPTION START TIME</label
                  >
                </div>
                <div class="form-field col-sm-6 col-sm-6">
                  <input
                    id="color"
                    class="input-text"
                    type="text"
                    name="color"
                    required
                  />
                  <label for="color" class="label"
                    >DO YOU HAVE A COLOUR PALLETTE OR THEME?</label
                  >
                </div>
                <div class="form-field col-lg-12">
                  <input
                    id="event"
                    class="input-text"
                    type="text"
                    name="event type"
                    required
                  />
                  <label for="event" class="label">Type of Event</label>
                </div>
                <div class="form-field col-lg-12">
                  <input
                    id="event"
                    class="input-text"
                    type="text"
                    name="location"
                    required
                  />
                  <label for="venue" class="label">Venue of Location</label>
                </div>
                <div class="form-field col-lg-12">
                  <input
                    id="info"
                    class="input-text"
                    type="text"
                    name="additional info"
                  />
                  <label for="info" class="label"
                    >Additional Information <span>(optional)</span></label
                  >
                </div>

                <div class="form-field col-lg-12">
                  <select
                    id="advertise"
                    class="input-text"
                    type="text"
                    name="advertise"
                  >
                    <option>Instagram</option>
                    <option>Facebook</option>
                    <option>Words Of Mouth</option>
                    <option>Website</option>
                    <option>Other</option>
                  </select>
                  <label for="advertise" class="label"
                    >How did you hear about us?
                  </label>
                </div>
                <div class="form-field col-lg-12">
                  <input
                    class="submit_btn"
                    type="submit"
                    value="submit"
                    name=""
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
    <div class="map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13555.683768208522!2d115.9627519!3d-31.8543665!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32b719ae38a871%3A0xf650dabbf264b92d!2sDayton%20WA%206055%2C%20Australia!5e0!3m2!1sen!2sph!4v1707577162429!5m2!1sen!2sph"
        src=""
        width="100%"
        height="450"
        frameborder="0"
        style="border: 0"
        allowfullscreen=""
        aria-hidden="false"
        tabindex="0"
      ></iframe>
    </div>

    <a href="#" class="to-top">
      <i class="fa-solid fa-turn-up"></i>
    </a>

    <script src="javascript/footer.js"></script>
  </body>
  <script type="text/javascript" src="javascript/app.js"></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"
  ></script>
</html>
