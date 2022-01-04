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
                                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">New</a>
                            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                        </div>
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
                            Category
                        </div>
                        <div class="card-body">
                            <form action=" {{ route('store') }} " method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="categoryname">Category Name:</label>
                                    <input type="text" class="form-control" name="categoryname"
                                        placeholder="Enter Category Name">
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
                            Categories View
                        </div>
                        <div class="card-body">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach ($data as $row)
                                        <?php $status = empty($row->status)
                                            ? '<span class="badge badge-danger">Deactive</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          '
                                            : '<span class="badge badge-success">Active</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      '; ?>
                                        <tr>
                                            <td> {{ $count++ }} </td>
                                            <td> {{ $row->categoryname }} </td>
                                            <td> @php echo $status @endphp <span><a href="#edit_status"
                                                        class="fa fa-edit edit_status"
                                                        data-id=" {{ $row->categoryid }} "></a> </span></td>
                                            <td> <a href="#edit" class="edit"
                                                    data-id=" {{ $row->categoryid }} "> <i class="fa fa-edit"></i>
                                                </a> |
                                                <a href="#delete" data-id=" {{ $row->categoryid }} "
                                                    class=" text-danger delete"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
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
            @include('admin.includes.category_modal')

            <!-- Footer -->
            @include('admin.includes.footer')
        </div>
    </div>


    <!-- Argon Scripts -->
    @include('admin.includes.scripts')
    <script>
        $(document).ready(function() {

            $('.delete').click(function(e) {
                e.preventDefault();
                $('#delete_modal').modal('show');
                var categoryid = $(this).data('id');
                getRow(categoryid);
            });

            $('.edit_status').click(function(e) {
                e.preventDefault();
                $('#statusmodal').modal('show');
                var categoryid = $(this).data('id');
                getRow(categoryid);
            });

            $('.edit').click(function(e) {
                e.preventDefault();
                $('#edit_modal').modal('show');
                var categoryid = $(this).data('id');
                getRow(categoryid);
            });

        });

        function getRow(categoryid) {
            $.ajax({
                type: "GET",
                url: "{{ route('get_row_category') }}",
                data: {
                    categoryid: categoryid
                },
                dataType: "JSON",
                success: function(response) {
                    $('.categoryname').html(response.categoryname);
                    $('.categoryid').val(response.categoryid);
                    $('.status').val(response.status);
                    $('#categoryname').val(response.categoryname);
                }
            });
        }
    </script>
</body>

</html>
