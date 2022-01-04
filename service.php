<?php include("includes/connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/header.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>


    <div class="container mt-4 mb-4">
        <div class="jumbotron">
            <h2 class="display-4">Services</h2>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-3">
                <!-- Card -->
                <div class="card">

                  <!-- Card image -->
                  <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg"
                    alt="Card image cap">
                    <a href="#!">
                      <div class="mask rgba-white-slight"></div>
                  </a>
              </div>

              <!-- Card content -->
              <div class="card-body">

                <!-- Title -->
                <h4 class="card-title">Card title</h4>
                <!-- Text -->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
                <!-- Button -->
                <a href="#" class="btn btn-primary">Button</a>

            </div>

        </div>
        <!-- Card -->
    </div>

    <div class="col-sm-3">
        <!-- Card -->
        <div class="card">

          <!-- Card image -->
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg"
            alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
          </a>
      </div>

      <!-- Card content -->
      <div class="card-body">

        <!-- Title -->
        <h4 class="card-title">Card title</h4>
        <!-- Text -->
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>
        <!-- Button -->
        <a href="#" class="btn btn-primary">Button</a>

    </div>

</div>
<!-- Card -->
</div>

<div class="col-sm-3">
    <!-- Card -->
    <div class="card">

      <!-- Card image -->
      <div class="view overlay">
        <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg"
        alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
      </a>
  </div>

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h4 class="card-title">Card title</h4>
    <!-- Text -->
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
    content.</p>
    <!-- Button -->
    <a href="#" class="btn btn-primary">Button</a>

</div>

</div>
<!-- Card -->
</div>
</div>
</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");
?>
</body>

</html>