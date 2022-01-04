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
                                    <li class="breadcrumb-item"><a href="#">Supplier</a></li>
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
                            class="icon-button"><i class="fa fa-plus"></i></span> New Supplier</button>
                </div>
                <div class="card-body" id="card-body-form" style="display: none">
                    <form action="" method="post" id="supplier_form" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="productname"> <b>Suplier Name:</b> </label>
                                    <input type="text" class="form-control mb-2" name="first_name"
                                        placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="phonenumber"><b>Phone Number:</b></label>
                                    <input type="text" name="phonenumber" id="phonenumber" class="form-control"
                                        placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="email"><b>Email:</b></label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Enter Email">
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
                    Supplier View
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Supplier Name</th>
                                <th>Photo</th>
                                <th>Phone-Number</th>
                                <th> Email </th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            @endphp
                            @if (count($data) > 0)
                            @foreach ($data as $row)
                            @php
                            $photo = !empty($row->photo) ? '../../assets/img/' . $row->photo . '' :
                            '../../assets/img/no_user_profile.jpg';
                            @endphp
                            <tr>
                                <td> {{ $count++ }} </td>
                                <td> {{ $row->suppliername }} </td>
                                <td> {!! $photo !!} </td>
                                <td> {{ $row->phone_number }} </td>
                                <td> {{ $row->email }} </td>
                                <td> {{ $row->address }} </td>
                                <td> {{ $row->status }} </td>
                                <td>
                                    <a href="#edit" data-id=" {{ $row->supplierid }} " class="text-success"> <i
                                            class="fa fas-edit"></i> </a> |
                                    <a href="#delete" data-id=" {{ $row->supplierid }} " class="text-danger">
                                        <i class="fa fas-trash"> </i> </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" align="center"> No data found</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Supplier Name</th>
                                <th>Photo</th>
                                <th>Phone-Number</th>
                                <th> Email </th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            @include('admin.includes.customer_modal')
            <!-- Footer -->
            @include('admin.includes.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    @include('admin.includes.scripts')

    <script>
    $(function() {
        $(document).on("click", "#addNew", function() {
            $("#card-body-form").toggle("slow");
        });
    });
    </script>

</body>

</html>