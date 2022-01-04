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
                                    <li class="breadcrumb-item"><a href="#">Brand</a></li>
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
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-list"></i>
                            Brand
                        </div>
                        <div class="card-body">
                            <form action="{{ route('storeBrand') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="categoryname">Brand Name:</label>
                                    <input type="text" class="form-control mb-2" name="brandname"
                                        placeholder="Enter Brand Name">
                                    <label for="images">Photo:</label>
                                    <input type="file" class="form-control" name="image"
                                        placeholder="Enter Brand Photo">
                                </div>
                                <button type="submit" class="btn btn-primary" name="save"> Save </button>
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
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-list"></i>
                            Brand View
                        </div>
                        <div class="card-body">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>

                                    @foreach ($brandData as $row)
                                        <?php
                                        $status = empty($row->status)
                                            ? '<span class="badge badge-danger">Deactive</span>
                                                                                                                                                                                                                        '
                                            : '<span class="badge badge-success">Active</span> ';
                                        $photo = empty($row->images) ? '<p> No Photo </p>' : ' <img src="../../assets/img/' . $row->images . '" height="60px" width="60px" alt="">';
                                        ?>
                                        <tr>
                                            <td> {{ $count++ }} </td>
                                            <td>
                                                <?php echo $photo; ?>
                                                <span><a href="#edit_photo" class="fa fa-edit edit_photo"
                                                        data-id=" {{ $row->brandid }}"></a></span>
                                            </td>
                                            <td> {{ $row->brandname }} </td>
                                            <td> <?php echo $status; ?> <a href="#edit_status"
                                                    class="fa fa-edit edit_status"
                                                    data-id=" {{ $row->brandid }} "></a> </td>
                                            <td>
                                                <a href="#edit_name" class="edit text-primary edit_name"
                                                    data-id=" {{ $row->brandid }} "> <i class="fa fa-edit"></i>
                                                </a>
                                                |
                                                <a href="#delete" class="delete text-danger"
                                                    data-id="{{ $row->brandid }}"> <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            @include('admin.includes.brand_modal')

            <!-- Footer -->
            @include('admin.includes.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    @include('admin.includes.scripts')
    <script>
        $(function() {

            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                $('#delete_modal').modal('show');
                var brandid = $(this).data('id');
                getRow(brandid);
            });

            $(document).on('click', '.edit_status', function(e) {
                e.preventDefault();
                $('#editstatus_modal').modal('show');
                var brandid = $(this).data('id');
                getRow(brandid);
            });

            $(document).on('click', '.edit_photo', function(e) {
                e.preventDefault();
                $('#editphoto_modal').modal('show');
                var brandid = $(this).data('id');
                getRow(brandid);
            });

            $(document).on('click', '.edit_name', function(e) {
                e.preventDefault();
                $('#edit_brand_modal').modal('show');
                var brandid = $(this).data('id');
                getRow(brandid);
            });

            $(document).on('click', '#update_btn', function(e) {
                e.preventDefault();
                var brandname = $('#brandname');
                if ($.trim(brandname.val()).length == 0) {
                    alert("Enter Brand Name");
                    return false;
                }
                $('#edit_data_form').submit();
                $
            });

        });


        function getRow(brandid) {
            $.ajax({
                method: "GET",
                url: "{{ route('getrow') }}",
                data: {
                    brandid: brandid
                },
                dataType: "JSON",
                success: function(response) {
                    $('.brandname').html(response.brandname);
                    $('.brandname').val(response.brandname);
                    $('.brandid').val(response.brandid);
                    $('.editstatus').val(response.status);
                }
            });
        }
    </script>
</body>

</html>
