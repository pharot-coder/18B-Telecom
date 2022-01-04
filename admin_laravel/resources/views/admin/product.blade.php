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
                                    <li class="breadcrumb-item"><a href="#">Product</a></li>
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
                            class="icon-button"><i class="fa fa-plus"></i></span> Add New Product</button>
                </div>
                <div class="card-body" id="card-body-form" style="display: none">
                    <form action="{{ url('/product/store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="productname"> <b>Product Name:</b> </label>
                                    <input type="text" class="form-control mb-2" name="productname"
                                        placeholder="Enter Brand Name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="brand"><b>Brand Name:</b></label>
                                    <select name="brand" class="form-control" id="brandid">
                                        <option value="">-- Select Brand --</option>
                                        @foreach ($brandData as $row)
                                            <option value=" {{ $row->brandid }} "> {{ $row->brandname }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="category"> <b>Category:</b> </label>
                                    <select name="category" class="form-control" id="categoryid">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categoryData as $row)
                                            <option value=" {{ $row->categoryid }} "> {{ $row->categoryname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="supplier"> <b>Supplier:</b> </label>
                                    <select name="supplier" class="form-control" id="supplierid">
                                        <option value="0">-- Select Supplier (Optional) --</option>
                                        @foreach ($supplierData as $row)
                                            <option value=" {{ $row->supplierid }} "> {{ $row->suppliername }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="price"><b>Price:</b></label>
                                    <input type="text" name="price" id="price" class="form-control"
                                        placeholder="Enter Price">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="price"><b>Cost:</b></label>
                                    <input type="text" name="cost" id="cost" class="form-control"
                                        placeholder="Enter Cost">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="price"><b>QTY:</b></label>
                                    <input type="text" name="qty" id="qty" class="form-control"
                                        placeholder="Enter Product Quantity">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="images"><b>Photo:</b></label>
                                    <input type="file" class="form-control" name="image"
                                        placeholder="Enter Product Photo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description"><b>Desciption:</b> </label>
                            <textarea name="description" class="description" id="editor1"></textarea>
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
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Cost</th>
                                <th>Inputer</th>
                                <th>QTY</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($productData as $row)
                                <?php
                                $status = empty($row->status)
                                    ? '<span class="badge badge-danger">Deactive</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  '
                                    : '<span class="badge badge-success">Active</span>';
                                $photo = empty($row->images) ? 'No Photo' : '<img src="../../assets/img/' . $row->images . '" height="50px" width="50px" alt="">';
                                ?>
                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>
                                        {!! $photo !!}
                                        <span><a href="#edit_photo" class="fa fa-edit edit_photo"
                                                data-id=" {{ $row->productid }}"></a></span>
                                    </td>
                                    <td> {{ $row->productname }} </td>
                                    <td> <a href="#description" class="btn btn-primary btn-sm desc_view"
                                            data-id=" {{ $row->productid }} "> View </a> </td>
                                    <td> {{ $row->categoryname }} </td>
                                    <td> $ {{ $row->price }} </td>
                                    <td> $ {{ $row->cost }} </td>
                                    <td> {{ $row->username }} </td>
                                    <td> {{ $row->qty }} </td>
                                    <td> <?php echo $status; ?> <a href="#edit_status" class="fa fa-edit edit_status"
                                            data-id=" {{ $row->productid }} "></a> </td>
                                    <td>
                                        <a href="#edit_name" class="edit text-primary edit"
                                            data-id=" {{ $row->productid }} "> <i class="fa fa-edit"></i> </a> |
                                        <a href="#delete" class="delete text-danger delete"
                                            data-id="{{ $row->productid }}"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Cost</th>
                                <th>Inputer</th>
                                <th>QTY</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            @include('admin.includes.product_modal')
            <!-- Footer -->
            @include('admin.includes.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    @include('admin.includes.scripts')
    <script>
        $(function() {
            $(document).on('click', '.desc_view', function(e) {
                e.preventDefault();
                var productid = $(this).data('id');
                $('#descriptionmodal').modal('show');
                getRow(productid);
            });

            $(document).on('click', '.delete', function(e) {
                $('#DeleteModal').modal('show');
                e.preventDefault();
                var productid = $(this).data('id');
                getRow(productid);
            });

            $(document).on('click', '.edit_status', function(e) {
                $('#statusmodal').modal('show');
                e.preventDefault();
                var productid = $(this).data('id');
                getRow(productid);
            });

            $(document).on('click', '.edit', function(e) {
                $('#editproductModal').modal('show');
                e.preventDefault();
                var productid = $(this).data('id');
                getRow(productid);
            });

            $(document).on('click', '#addNew', function() {
                $('#card-body-form').toggle("slow");
            });


        });

        function getRow(productid) {
            $.ajax({
                type: "GET",
                url: "{{ route('get_row_product') }}",
                data: {
                    productid: productid
                },
                dataType: "json",
                success: function(response) {
                    $('.productname').html(response.productname);
                    $('.desc').html(response.description);
                    $('.productid').val(response.productid);
                    $('.status').val(response.status);
                    $('#editproductname').val(response.productname);
                    $('#editcategory').val(response.categoryid);
                    $('#editprice').val(response.price);
                    $('.status').val(response.status);
                    $('#editcost').val(response.cost);
                    $('#editsupplier').val(response.supplierid);
                    $('#editbrand').val(response.brandid);
                    $('#editqty').val(response.qty);
                    CKEDITOR.instances["editor2"].setData(response.description);
                }
            });
        }
    </script>
</body>

</html>
