<?php
include("includes/connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("includes/header.php"); ?>
  <style>
  body {
    background: orange;
  }
</style>
</head>

<body>
  <div class="login-box">
    <div class="card">
      <div class="login-logo">
        <img src="assets/img/logo/Logo-18B-Telecom.png" width="250" height="60" alt="">
      </div>
      <!-- Default form login -->
      <form class="text-center border border-light p-5" action="sign_in_verify.php" method="POST"
      enctype="multipart/form-data" autocomplete="false">
      <p class="h4 mb-4">Sign in</p>
      <?php
      if (isset($_SESSION['error'])) {
        echo "
        <div class='alert alert-danger text-center'>
        <p>" . $_SESSION['error'] . "</p> 
        </div>
        ";
        unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])) {
        echo "
        <div class='alert alert-success text-center'>
        <p>" . $_SESSION['success'] . "</p> 
        </div>
        ";
        unset($_SESSION['success']);
      }
      ?>
      <!-- Email -->
      <input type="text" name="email" id="email" class="form-control mb-4" placeholder=" Enter Your E-mail"
      required>

      <!-- Password -->     
      <input type="password" name="password"  class="form-control mb-4"  placeholder=" Enter Your Password" required>

      <div class="d-flex justify-content-around">
        <div>
          <!-- Remember me -->
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
            <label class="custom-control-label" for="defaultLoginFormRemember">Remember
            me</label>
          </div>
        </div>
        <div>
          <!-- Forgot password -->
          <a href="">Forgot password?</a>
        </div>
      </div>

      <!-- Sign in button -->
      <button class="btn btn-primary btn-block my-4" name="login" type="submit">Sign in</button>

      <p> <a href="index.php"> Back Home <i class="fa fa-home"></i></a></p>

      <!-- Register -->
      <p>Not a member?
        <a href="signup.php">Register</a>
      </p>
      <!-- Social login -->
      <p>or sign in with:</p>
      <div id="spinner" style="
      background: #1877f2;
      border-radius: 5px;
      color: white;
      height: 40px;
      text-align: center;
      width: 250px;
      display:inline-block
      ">
      Loading....
      <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true" data-scope="public_profile, email" onlogin="checkLoginState();">
      </div>
    </div>

  <!--   <a href="includes/fbconfig.php" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
   <a href="#" class="mx-2" role="button"><i class="fab fa-google light-blue-text"></i></a>-->
 </form>
 <!-- Default form login -->
</div>
</div>


<?php
include("includes/scripts.php");
?>
<div id="fb-root"></div>
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=291113802427986&autoLogAppEvents=1" nonce="uDmAcizv"></script>
--><script>
  var finished_rendering = function() {
    console.log("finished rendering plugins");
    var spinner = document.getElementById("spinner");
    spinner.removeAttribute("style");
    spinner.removeChild(spinner.childNodes[0]);
  }
  FB.Event.subscribe('xfbml.render', finished_rendering);

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=508566810522503';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<script>

  function statusChangeCallback(response) {  
    console.log('statusChangeCallback');
    console.log(response);                   
    if (response.status === 'connected') {   
      testAPI();  
      window.location = 'http://localhost:8888/18B-Telecom/';
    } else {                                
      document.getElementById('status').innerHTML = 'Please log ' +
      'into this webpage.';
    }
  }

  function checkLoginState() {               
    FB.getLoginStatus(function(response) {   
      statusChangeCallback(response);
    });
  }
  
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '508566810522503',
      cookie     : true,                     
      xfbml      : true,                  
      version    : 'v10.0'          
    });


    FB.getLoginStatus(function(response) {   
      statusChangeCallback(response);       
    });
  };

  function testAPI() {                      
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
      'Thanks for logging in, ' + response.name + '!';
    });
  }

</script>
<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>

</html>