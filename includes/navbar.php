<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 hidden-xs">
                <p> <span><i class="fas fa-business-time"></i></span> Starting Your
                Bussiness Here</p>
            </div>
            <div class="col-sm-6 text-right">
                <?php
                if (empty($_SESSION['CID'])) {
                    echo '
                    <a href="login.php" id="#" class="btn btn-danger btn-sm"> <span><i class="fa fa-user"></i> </span> Sing
                    In</a>
                    <a href="signup.php" id="signup" class="btn btn-danger btn-sm">
                    <span><i class="fas fa-user-plus"></i></span> Sign Up
                    </a>
                    ';
                } else {
                    echo '
                    <a href="usercenter.php" id="usercenterbtn" class="btn btn-light btn-circle"> <span><i class="fa fa-user"></i> </span> ' . $_SESSION['UNAME'] . ' </a>
                    <a href="#logout" id="logout" class="btn btn-light btn-circle">
                    <span><i class="fas fa-door-open"></i></span> Logout
                    </a>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</div>


<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="http://localhost:8888/18B-Telecom">
        <img src="assets/img/logo/Logo-18B-Telecom.png" alt="" width="200" height="50" class="img-responsive">
    </a>
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>


<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
            </a>
        </li>
     <!--    <li class="nav-item">
            <a class="nav-link" href="service.php"> Services </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href=" contact.php "> Contact</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Category</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <?php
                $sqlcatpro = "select * from tblcategory where status = 1";
                $result = $mysqli->query($sqlcatpro);
                while ($row = $result->fetch_assoc()) {
                    echo '  <a class="dropdown-item" href="productbycategory.php?categoryname=' . $row['categoryname'] . ' "> ' . $row['categoryname'] . ' </a>';
                }
                ?>
                <hr>
                <a href="allproducts.php" class="dropdown-item"> All Products </a>
            </div>
        </li>
    </ul>


    <form class="form-inline" method="get" action="productsearch.php">
        <div class="input-group my-0">
            <input type="text" id="searchinput" class="form-control" placeholder="Search...." aria-label="Search"
            aria-describedby="button-addon2" name="name">
            <div class="input-group-append">
                <button class="btn btn-md btn-default m-0 px-3 py-2 z-depth-0 waves-effect" name="search"  type="submit" id="searchbtn"> <i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>


    <!-- Links -->
    <a href="cart_view.php" id="cartBtn" class="btn btn-info btn-circle"> <span><i class="fas fa-cart-plus"></i></span>
        Cart
        <span style="font-size:14px;"
        class="badge rounded-pill badge-notification bg-default cart_count">0</span></a>

    </div>
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->