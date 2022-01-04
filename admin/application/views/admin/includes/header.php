    <nav class="navbar navbar-expand navbar-dark bg-info static-top">
        <a class="navbar-brand mr-1" href="#">
            <img src="
            <?php
            if (empty($this->session->userdata('adid')->images)) {
                echo base_url('../assets/img/no_user_profile.jpg');
            } else {
                echo base_url('../assets/img/' . $this->session->userdata('adid')->images . '');
            }
            ?>
            " class="img-fluid z-depth-1 rounded-circle" height="50px" width="50px"
                alt="<?php echo $this->session->userdata('adid')->username ?>">
            <span><?php echo $this->session->userdata('adid')->username ?></span> </a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">

                <div class="input-group-append">

                </div>
            </div>
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo site_url('profile_setting'); ?>"> <i
                            class="fa fa-user"></i> <span>Profile Setting</span> </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('admin/change_password'); ?>"> <i
                            class="fa fa-key"></i> <span>Change Password</span> </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('admin/Login/logout'); ?>"> <i
                            class="fas fa-sign-out-alt"></i> <span>Logout</span> </a>
                </div>
            </li>
        </ul>

    </nav>