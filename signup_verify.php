  <?php
  include('includes/connect.php');
  session_start();
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $password = $_POST['password'];
  $cpassword  = $_POST['cpassword'];
  $hashpassword = password_hash($password, PASSWORD_DEFAULT);
  $regdate = date('Y-m-d');
  if (isset($_POST['register'])) {
    try {
      $sqlcheck = "select * from tblcustomer where email = '" . $email . "' ";
      $resultcheck = $mysqli->query($sqlcheck) or die("Could Not Perform the Query");
      if ($resultcheck->num_rows > 0) {
        $_SESSION['error'] = "Emal already Exists";
        header('location: http://localhost:8888/18B-Telecom/signup.php');
      } else if ($password < 8) {
        $_SESSION['error'] = "Password must be 8 characters";
        header('location: http://localhost:8888/18B-Telecom/signup.php');
      } else if($password != $cpassword){
        $_SESSION['error'] = "Password not match";
      }else {
        $sqlregister = 'insert into tblcustomer (first_name,last_name,username,email,password,dob,register_date) values (
        '.$fname.', '.$lname.', '.$uname.', '.$email.','.$hashpassword.', '.$dob.' , '.$regdate.'
      )';
      $mysqli->query($sqlregister) or die("Could not preform this query");
      $_SESSION['success'] = "Register Successfully, Please Login";
      header('location: http://localhost:8888/18B-Telecom');
    }
  } catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
  }
}
?>