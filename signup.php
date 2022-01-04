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
<?php

if (isset($_POST['register'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $cpassword  = $_POST['cpassword'];
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $regdate = date('Y-m-d');
    $secretKey = '6Lc76BwbAAAAAAGBVSa_KNoyVfvNbYuoU8QP-Td-';
    $responseKey =  $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$responseKey."&remoteip=".$userIP."";
    $response = file_get_contents($url);
    $res = json_decode($response);

    if($res->success)
    {
        try {

          $sqlcheck = "select * from tblcustomer where email = '" . $email . "' ";
          $resultcheck = $mysqli->query($sqlcheck);

          if ($resultcheck->num_rows > 0) {

            $_SESSION['error'] = "Email already Exists";

        }elseif( strlen($password) < 8){

            $_SESSION['error'] = "Password muse be at least 8 characters";

        }elseif(strlen($password != $cpassword)){

            $_SESSION['error'] = "Password did not match";

        }else{

           $sqlregister = "INSERT into tblcustomer (first_name,last_name,username,email,password,register_date) values (
           '$fname', '$lname', '$uname', '$email','$hashpassword' ,'$regdate'
       )";

       $mysqli->query($sqlregister);
       $_SESSION['success'] = "Register Successfully, Please Login ";
   }

} catch (Exception $e) {

    $_SESSION['error'] = $e->getMessage();

}

}
else
{
    $_SESSION['error'] = "Please verify recaptcha";

}

}
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
  var onloadCallback = function() {
    grecaptcha.render('html_element', {
      'sitekey' : '6Lc76BwbAAAAAApXkr7ZdeOCIrHoF6DJJGJibldi'
  });
};
</script>
</head>

<body>

    <div class="register-box">
        <div class="card">
            <div class="login-logo">
                <img src="assets/img/logo/Logo-18B-Telecom.png" width="250" height="60" alt="">
            </div>
            <!-- Default form login -->
            <form class="text-center border border-light p-5"  method="POST">

                <p class="h4 mb-4">Register</p>
                <?php
                if(isset($_SESSION['error'])){
                    echo '
                    <div class="alert alert-danger" role="alert" >
                    '.$_SESSION['error'].'
                    </div>
                    ';
                }
                unset($_SESSION['error']);
                if(isset($_SESSION['success'])){
                    echo '
                    <div class="alert alert-success" role="alert">
                    '.$_SESSION['success'].'
                    </div>
                    ';
                }
                unset($_SESSION['success']);
                ?>
                <!-- First Name -->
                <input type="text" id="fname" name="fname" class="form-control mb-2" placeholder="Enter First Name"
                required>

                <!-- Last Name -->
                <input type="text" id="lname" name="lname" class="form-control mb-2" placeholder="Enter Last Name"
                required>

                <!-- Username -->
                <input type="text" id="uname"  autocomplete="off" name="uname" class="form-control mb-2" placeholder="Enter Username" required>
                
                <!--Email-->
                <input type="text" name="email" autocomplete="off" id="email" class="form-control mb-2" placeholder=" Enter Email"
                > 

                <input type="password" id="password" autocomplete="on" name="password" class="form-control mt-2 mb-2" placeholder="Enter Passsword" required>

                <input type="password" name="cpassword" autocomplete="new-password" id="cpassword" class="form-control mb-2"
                placeholder=" Enter Confirm Password" required style="display: none;">

                <div class="g-recaptcha" data-sitekey="6Lc76BwbAAAAAApXkr7ZdeOCIrHoF6DJJGJibldi"></div>

                <!-- Sign in button -->
                <button type="submit" class="btn btn-primary btn-block mt-2 mb-2" name="register">Sign Up</button>

                <p> <a href="index.php"> Back Home <i class="fa fa-home"></i></a></p>

                <!-- Register -->
                <p>Have a member?
                    <a href="login.php">Login</a>
                </p>
            </form>
            <!-- Default form login -->
        </div>
    </div>


    <?php
    include("includes/scripts.php");
    ?>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
<script type="text/javascript">


    $(function(){
        $('#password').on('keyup', function(e) {
            e.preventDefault();
            var password = $(this).val();
            if (password.length > 0) {
                $('#cpassword').fadeIn("slow");
            } else if (password == "") {
                $('#cpassword').fadeOut("slow");
            }
        });
    });
</script>
</body>

</html>