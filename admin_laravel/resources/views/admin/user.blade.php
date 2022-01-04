<!DOCTYPE html>
<html>

<head>
    @include('admin.includes.header')
</head>

<body>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <!-- Sidenav -->
    @include('admin.includes.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('admin.includes.topnav')
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                                </ol>
                            </nav>
                        </div>
                        {{-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">

            <div class="card">
                <div class="card-header">
                    <button class="btn btn-outline-primary" data-toggle="button" id="addNew"> <span
                            class="icon-button"><i class="fa fa-plus"></i></span> New User</button>
                </div>
                <div class="card-body" id="card-body-form" style="display: none">
                    <form action=" {{ route('store_customer') }} " method="post" id="customer_form"
                        enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="productname"> <b>First Name:</b> </label>
                                    <input type="text" class="form-control mb-2" name="first_name"
                                        placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="productname"> <b>Last Name:</b> </label>
                                    <input type="text" class="form-control mb-2" name="last_name"
                                        placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="username"> <b>Username:</b> </label>
                                    <input type="text" id="username" class="form-control mb-2" name="username"
                                        placeholder="Enter Username" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="phonenumber"><b>Phone Number:</b></label>
                                    <input type="text" name="phonenumber" id="phonenumber" class="form-control"
                                        placeholder="Enter Phone Number">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="email"><b>Email:</b></label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="password"><b>Password:</b></label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Enter Password">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="images"><b>Photo:</b></label>
                                    <input type="file" class="form-control" name="photo"
                                        placeholder="Enter Customer Photo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address"><b>Address:</b> </label>
                            <textarea name="address" class="address" id="editor1"></textarea>
                        </div>

                        <button type="submit" id="submit" class="btn btn-primary" name="save"> Save </button>
                    </form>
                </div>
            </div>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <i class="fa fa-list"></i>
                    User View
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First-Name</th>
                                <th>Last-Name</th>
                                <th>Username</th>
                                <th>Phone-Number</th>
                                <th>Level</th>
                                <th>Address</th>
                                <th>Regiser-Date</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($userData as $row)
                                @php
                                    $status = empty($row->status)
                                        ? '<span class="badge badge-danger">Deactive</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      '
                                        : '<span class="badge badge-success">Active</span>';
                                    $photo = empty($row->images) ? '<img src="../../assets/img/no_user_profile.jpg" height="50px" width="50px" alt="">' : '<img src="../../assets/img/' . $row->images . '" height="50px" width="50px" alt="">';
                                    $userlevel = $row->userlevel == 1 ? 'Admin' : ($row->userlevel == 2 ? 'Sale' : 'User');
                                @endphp
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td> {{ $row->first_name }} </td>
                                    <td> {{ $row->last_name }} </td>
                                    <td> {{ $row->username }} </td>
                                    <td> {{ $row->phone }} </td>
                                    <td>@php echo $userlevel @endphp</td>
                                    <td> <a href="#adress" class="btn btn-primary btn-sm address"
                                            data-id=" {{ $row->userid }} "> View</a> </td>
                                    <td> {{ date('d-M-Y', strtotime($row->register_date)) }} </td>
                                    <td> <?php echo $photo; ?></td>
                                    <td> <?php echo $status; ?> <a href="#edit_status" data-id="{{ $row->userid }}"
                                            class="edit_status">
                                            <i class=" fa fa-edit"></i>
                                        </a> </td>
                                    <td>

                                        <a href="#edit_name" class="edit text-primary edit"
                                            data-id=" {{ $row->userid }} "> <i class="fa fa-edit"></i> </a> |
                                        <a href="#delete" class="delete text-danger delete"
                                            data-id="{{ $row->userid }}"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>First-Name</th>
                                <th>Last-Name</th>
                                <th>Username</th>
                                <th>Phone-Number</th>
                                <th>Level</th>
                                <th>Address</th>
                                <th>Regiser-Date</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Modal -->

            <!-- Footer -->
            @include('admin.includes.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    @include('admin.includes.scripts')
    <script>
        $(document).ready(function() {
            $('#addNew').click(function() {
                $('#card-body-form').toggle("slow");
            });

            $('.edit').click(function(e) {
                e.preventDefault();
                var userid = $(this).data('id');
                getRow(userid);
            });

            $('.delete').click(function(e) {
                e.preventDefault();
                var userid = $(this).data('id');
                $('#delete_modal').modal('show');
                getRow(userid);
            });

            $('.edit_status').click(function(e) {
                e.preventDefault();
                var userid = $(this).data('id');
                $('#statusmodal').modal('show');
                getRow(userid);
            });

            $('.address').click(function(e) {
                e.preventDefault();
                $('#address_modal').modal('show');
                var userid = $(this).data('id');
                getRow(userid);
            });

            $('#submit').click(function() {
                var password = $('#password').val();
                if (password.length < 8) {
                    alert("Password cannot less than 8 character");
                    return false;
                } else {
                    $('#customer_form').submit();
                }
            });

        });

        function getRow(userid) {
            $.ajax({
                type: "get",
                url: "{{ route('get_row_customer') }}",
                dataType: "json",
                data: {
                    userid: userid
                },
                success: function(response) {
                    $('.customerid').val(response.userid);
                    $('.customername').html(response.username);
                    $('.addr').html(response.address);
                    $('.status').val(response.status);
                }
            });
        }
    </script>

</body>

</html>
