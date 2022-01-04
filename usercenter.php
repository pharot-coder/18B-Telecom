<?php
include("includes/connect.php");
session_start();
if (empty($_SESSION['CID'])) {
  header('location: http://localhost:8888/18B-Telecom/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("includes/header.php"); ?>
</head>

<body>
  <?php include("includes/navbar.php"); ?>
  <div class="container mt-4">
    <?php
    try {
      $sql = "select * from tblcustomer where customerid = " . $_SESSION['CID'];
      $result = $mysqli->query($sql);
      $rowuser = $result->fetch_assoc();
      $images = (empty($rowuser['images'])) ? "assets/img/no_user_profile.jpg" : "assets/img/" . $rowuser['images'] . "";
      $regdate =(empty($rowuser['register_date'])) ? "N/A" : "" . date('d-M-Y', strtotime($row['regiser_date']) ). "";
      $phonenumber = (empty($rowuser['phone_number'])) ? "" : "".$rowuser['phone_number']."";

    } catch (Exception $e) {
      echo "This is problem" . $e->getMessage();
    }

    ?>
    <!-- News jumbotron -->
    <div class="jumbotron text-center hoverable mt-2 mb-4 p-4">

      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-sm-3 offset-md-1 mx-3 my-3">
          <!-- Featured image -->
          <div class="view overlay">
            <a href="#">   <img src="<?php echo $images; ?>" class="rounded-circle" width="100%" height="100%"
              alt="<?php echo $rowuser['username'] ?>"> </a>
              <h5 class="text-center mt-4">
                <?php echo ' ' . $rowuser['first_name'] . ' ' . $rowuser['last_name'] . ' '; ?> 
                <span>
                  <a href="#editprofile_photo"  data-id="<?php echo $rowuser['customerid'] ?>"
                    id="editprofile_photo"> <i class="fa fa-edit"></i>
                  </a>  
                </span>
              </h5> 
            </div>
          </div>
          <!-- Grid column -->

          <div class="col-12 col-sm-6 mt-4 text-right">
            <div class="row">
              <div class="col-5 col-sm-4">
                <h6>First Name:</h6>
                <h6>Last Name:</h6>
                <h6>Username:</h6>
                <h6>Email:</h6>
                <h6>Phone Number:</h6>
                <h6>Register Date:</h6>
              </div>
              <div class="col-7 col-sm-3 text-left">
                <h6><?php echo $rowuser['first_name'] ?></h6>
                <h6><?php echo $rowuser['last_name'] ?></h6>
                <h6><?php echo $rowuser['username'] ?></h6>
                <h6><?php echo $rowuser['email'] ?></h6>
                <h6><?php echo $phonenumber ?></h6>
                <h6><?php echo $regdate ?></h6>
              </div>
            </div>
          </div>
          <!-- Grid row -->
        </div>
      </div>

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

      <div class="user-tab mb-4 mt-4">

        <div class="user-tab-sidebar">

          <a class="user-tab-link" href="usercenter.php?user_tab=order_history" > <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          Order History</a>

          <a class="user-tab-link" id="user-tab-account" href="usercenter.php?user_tab=account_setting" ><i class="fas fa-user" ></i> Profile Setting </a>

          <a class="user-tab-link" href="usercenter.php?user_tab=change_password" ><i class="fas fa-key" ></i> Change Password</a>
        </div>

        <div class="user-tab-content">
          <div class="container-fluid">
            <?php
            if(isset($_GET['user_tab']) & $_GET['user_tab'] == 'change_password'){

              include 'change_password.php';

            }elseif(isset($_GET['user_tab']) && $_GET['user_tab'] == 'account_setting'){

              include 'account_setting.php';

            }elseif (isset($_GET['user_tab']) && $_GET['user_tab'] == 'order_history') {

              include 'order_history.php';

            }else{

              include 'order_history.php';

            }
            ?>
          </div>
        </div>

      </div>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>
    </div>

    <?php include("includes/edit_account_modal.php"); ?>
    <?php include 'includes/orderdetail-modal.php'; ?>
    <?php
    include("includes/editprofile_photo_modal.php");
    include("includes/logout_modal.php");
    ?>
    <?php
    include("includes/footer.php");
    include("includes/scripts.php");
    ?>
    <script type="text/javascript">

     $(function() {   

      $(document).on('click','#editprofile_photo',function(e){
        e.preventDefault();
        $('#editpfilephotomodal').modal('show');
        var customerid = $(this).attr('data-id');
        GetUserRow(customerid);
      });

      $(document).on('click','.transact',function(e){
        e.preventDefault();
        $('#orderdetailmodal').modal('show');
        var orderid = $(this).attr('data-id');
        GetOrderDetail(orderid);
      });

      $(document).on('submit','#formorder',function(e){
        e.preventDefault();

        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        if(from_date != '' && to_date != '' ){

          $.ajax({

            url: 'order_date_filter.php',
            method: 'GET',
            dataType: 'JSON',
            data: { from_date: from_date, to_date: to_date },
            success: function(response){
              $('#ordertbody').html(response);
            }

          });

        }else{
          $('#alert').show();
          $('.message').html("Please Choose Date");
        }
      });

    });

     function GetUserRow(customerid) {
      $.ajax({
        url: 'userprofile_fetch.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          customerid: customerid
        },
        success: function(response) {
          $('.customerid').val(response.customerid);
          $('#editfname').val(response.first_name);
          $('#editlname').val(response.last_name);
          $('#edituname').val(response.username);
          $('#editphone').val(response.phone_number);
          $('#editemail').val(response.email);
          $('#editaddress').val(response.address);
        }
      });
    }

    function GetOrderDetail(orderid){
      $.ajax({
        url: 'order-detail.php',
        method: 'get',
        dataType: 'json',
        data: {orderid : orderid},
        success: function(response){
          $('#orderdetailtbody').html(response.listorder);
          $('.ordertotal').html(response.total);
        }
      });
    }


  </script>
</body>

</html>