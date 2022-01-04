<?php
include("includes/connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/header.php"); ?>
    <style type="text/css" media="screen">
        .map-container-7{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .map-container-7 iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>
</head>

<body>
    <?php include("includes/navbar.php"); ?>

    <div class="container mt-6">

        <div class="section-title mb-4 mt-4">
            <h3> <i class="fas fa-address-book"></i> Contact US</h3>
        </div>

        <!-- News jumbotron -->
        <div class="jumbotron text-center hoverable p-4">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 offset-md-1 mx-3 my-3">

                    <!-- Featured image -->
                    <div class="view overlay">
                        <img src="assets/img/logo/Logo-18B-Telecom.png" alt="" width="100%" height="100%"
                        class="img-responsive">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-7 text-md-left ml-3 mt-3">

                    <!-- Excerpt -->
                    <a href="#!" class="green-text">
                        <h6 class="h6 pb-1"><i class="fas fa-desktop pr-1"></i> Work</h6>
                    </a>

                    <h4 class="h4 mb-4"> <span><i class="fas fa-door-open"></i></span> Welcome to 18B-TELECOM</h4>
                    <h5 class="h5 mb-4"> លក់ និងជួសជុលវិទ្យុទាក់ទង តំឡើងប្រព័ន្ធវិភឺធឺរ </h5>
                    <p class="font-weight-normal">
                        <i class="fas fa-map-marker-alt"></i><span>
                            ផ្ទះលេខ 51Eo ផ្លូវលេខ 432 សង្កាត់ទូលទំពូង ខណ្ឌចំការមន រាជធានីភ្នំពេញ
                        </span>
                    </p>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- News jumbotron -->
    </div>
    <div class="container mb-4">
     <!--Section: Contact v.2-->
     <section class="section">

      <div class="card">

        <div class="card-body">

          <!--Google map-->
          <div id="map-container-google-12" class="z-depth-1-half map-container-7" style="height: 200px">
             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7818.422430999398!2d104.85778260000002!3d11.536700900000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1skm!2skh!4v1620156257396!5m2!1skm!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
         </div>

         <div class="row">

            <!--Grid column-->
            <div class="col-md-6 mb-4">
              <form>

                <div class="md-form">
                  <input type="text" id="contact-name" class="form-control">
                  <label for="contact-name" class="">Your name</label>
              </div>

              <div class="md-form">
                  <input type="text" id="contact-email" class="form-control">
                  <label for="contact-email" class="">Your email</label>
              </div>

              <div class="md-form">
                  <input type="text" id="contact-Subject" class="form-control">
                  <label for="contact-Subject" class="">Subject</label>
              </div>

          </form>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-6 mb-4">
          <div class="md-form primary-textarea">
            <textarea id="contact-message" class="md-textarea form-control mb-0" rows="5" style="padding-bottom: 1.2rem;"></textarea>
            <label for="contact-message">Your message</label>
        </div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-12">
      <div class="text-center">
        <a class="btn btn-warning btn-block">Send Message</a>
    </div>
</div>
<!--Grid column-->

</div>

</div>

</div>

</section>
<!--Section: Contact v.2-->
</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");
?>
<script>
    let map;

    function initMap() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8,
    });
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1GsVHTTN175FNp9RddX-jkKvGQBDasJs&callback=initMap"></script>
</body>

</html>