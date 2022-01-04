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
                                    <li class="breadcrumb-item"><a href="#">Cart</a></li>
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
                    Cart View
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Photo</th>
                                <th>Price</th>
                                <th>QTY</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($cartData) > 0)
                                @php $count = 1; @endphp
                                @foreach ($cartData as $row)
                                    @php
                                        $photo = empty($row->images) ? '<img src="' . asset('../../assets/img/no_user_profile.jpg') . '" alt="" height="50px" width="50px" />' : '<img src="' . asset('../../assets/img/' . $row->images . '') . '" alt="" height="50px" width="50px" />';
                                    @endphp
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td> {{ $row->productname }} </td>
                                        <td> @php echo $photo @endphp </td>
                                        <td> {{ $row->price }} </td>
                                        <td> {{ $row->qty }} </td>
                                        <td>
                                            <a href="#edit_qty" class="edit text-primary edit_qty"
                                                data-id=" {{ $row->cart_id }} "> <i class="fa fa-edit"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"> No data found</td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Photo</th>
                                <th>Price</th>
                                <th>QTY</th>
                                <th>Tools</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            @include('admin.includes.cart_modal')

            <!-- Footer -->
            @include('admin.includes.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    @include('admin.includes.scripts')
    <script>
        $(document).ready(function() {
            $('.edit_qty').click(function(e) {
                e.preventDefault();
                var cart_id = $(this).data('id');
                $('#qty_cartModal').modal('show');
                getRow(cart_id);
            });
        });

        function getRow(cart_id) {
            $.ajax({
                type: "GET",
                url: "{{ route('get_row_cart') }}",
                data: {
                    cart_id: cart_id
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    $('.cart_id').val(response.cart_id);
                    $('.qty').val(response.qty);
                }
            });
        }
    </script>
</body>

</html>
