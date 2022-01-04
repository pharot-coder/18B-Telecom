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
                                    <li class="breadcrumb-item"><a href="#">Order</a></li>
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
                    <i class="fa fa-list"></i> Filter
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="" method="get" id="filter_by_date">
                                <div class="input-daterange datepicker row align-items-center">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="start_date" id="start_date"
                                                    type="text" placeholder=" Start Date">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-wieght-bold"><b>To:</b></p>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="end_date" id="end_date" type="text"
                                                    placeholder="End Date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <button id="search_date" class="btn btn-success"
                                                name="seach_date">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5">
                            <form action="{{ route('filter_order_status') }}" method="GET" id="filterStatus_form">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <select name="order_status" class="form-control" id="order_status">
                                                <option value="0" selected> -- Select order status -- </option>
                                                <option value="1"> Processing </option>
                                                <option value="2"> Completed </option>
                                                <option value="3"> Refund </option>
                                                <option value="4"> Canceled </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-success" id="fliterStatus" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="float-right">
                        {{-- <a href="#generate_pdf" onclick="window.open('{{ route('generate_orderPDF') }}')"
                            class=" btn btn-primary">
                            Export PDF </a> --}}
                        <button class="btn btn-primary" id="exportPDF">Export PDF</button>
                        <a href="{{ route('exportExcel_order') }}" class="btn btn-primary"> Export Excel </a>

                    </div>
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
                    Order View
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Date</th>
                                <th>Payment-Method</th>
                                <th>Transation Photo</th>
                                <th>Customer</th>
                                <th>Order Status</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($orderData as $row)
                                <?php
                                $status = empty($row->status) ? '<span class="badge badge-danger">Deactive</span>' : '<span class="badge badge-success">Active</span>';
                                $photo = empty($row->images) ? '<img src="../../assets/img/no_user_profile.jpg" height="50px" width="50px" alt="">' : '<img src="../../assets/img/' . $row->images . '" height="50px" width="50px" alt="">';
                                $transation_photo = empty($row->payment_transaction_image) ? 'N/A' : '<a href="../../assets/img/' . $row->payment_transaction_image . '"> <img src="../../assets/img/' . $row->payment_transaction_image . '" height="50px" width="50px" alt=""> </a>';
                                $status = $row->status == 1 ? '<span class="badge badge-info"> Processing </span>' : ($row->status == 2 ? '<span class="badge badge-success"> Completed </span>' : ($row->status == 3 ? '<span class="badge badge-warning"> Refund </span>' : '<span class="badge badge-danger"> Canceled </span>'));
                                ?>
                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td> {{ date('d-M-Y', strtotime($row->order_date)) }} </td>

                                    <td> {{ $row->payment_method }} </td>
                                    <td> <?php echo $transation_photo; ?></td>
                                    <td> {{ $row->username }} </td>
                                    <td> <?php echo $status; ?> <a href="#edit_status" class="fa fa-edit edit_status"
                                            data-id=" {{ $row->orderid }} "></a> </td>
                                    <td>
                                        <a href="#order_detail" class="edit text-primary order_detail"
                                            data-id=" {{ $row->orderid }} "> <i class="fa fa-eye"></i> </a> |
                                        <a href="{{ url('/order/create_invoice/' . $row->orderid . '') }}"
                                            class="delete text-primary invoice" data-id="{{ $row->orderid }}"> <i
                                                class="fas fa-file-invoice"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Order Date</th>
                                <th>Payment-Method</th>
                                <th>Transation Photo</th>
                                <th>Customer</th>
                                <th>Order Status</th>
                                <th>Tools</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            @include('admin.includes.order_modal')
            <!-- Footer -->
            @include('admin.includes.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    @include('admin.includes.scripts')
    <script>
        $(function() {

            $(document).on('click', '.edit_status', function(e) {
                e.preventDefault();
                var orderid = $(this).data('id');
                $('#orderstatusmodal').modal('show');
                getRow(orderid);
            });

            $(document).on('click', '.order_detail', function(e) {
                e.preventDefault();
                var orderid = $(this).data('id');
                $('#orderdetailmodal').modal('show');
                getOrderDetail(orderid);
            });

            $(document).on('submit', '#filter_by_date', function(e) {
                e.preventDefault();
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();

                if (start_date != '' && end_date != '') {
                    filter_order_date(start_date, end_date);
                } else {
                    alert("Please choose start date and end date");
                }
            });

            $(document).on('click', '#fliterStatus', function(e) {
                e.preventDefault();
                var status = $('#order_status');
                if (status.val() == 0) {
                    alert("Please select order status");
                } else {
                    $('#filterStatus_form').submit();
                }
            });

            $(document).on('click', '#exportPDF', function(e) {
                e.preventDefault();
                $('#export_pdf_modal').modal('show');
            });
            $("#export_pdf_filter_date").hide();

            $(document).on('change', '#export_pdf', function(e) {
                e.preventDefault();
                var val = $(this).val();
                if (val == 'Export By Date') {
                    $("#export_pdf_filter_date").toggle("slow");
                } else {
                    $("#export_pdf_filter_date").hide();
                    $('#export_start_date').val("");
                    $('#export_end_date').val("");
                }
            });

            // $(document).on('click', '#export_pdf_btn', function(e) {
            //     e.preventDefault();
            //     var start_date = $('#export_start_date').val();
            //     var end_date = $('#export_end_date').val();
            //     if (start_date == "" && end_date == "") {
            //         alert("Please choose start date and end date");
            //         return false;
            //     }
            //     $("#form_export_to_pdf").submit();
            // });
        });

        function getRow(orderid) {
            $.ajax({
                type: "GET",
                url: "{{ route('get_row_order') }}",
                data: {
                    orderid: orderid
                },
                dataType: "JSON",
                success: function(response) {
                    $('.status').val(response.status);
                    $('.orderid').val(response.orderid);
                }
            });
        }

        function getOrderDetail(orderid) {
            $.ajax({
                type: "get",
                url: "{{ route('get_order_detail') }}",
                data: {
                    orderid: orderid
                },
                dataType: "JSON",
                success: function(response) {
                    $('#orderdetailtbody').html(response.data);
                    $('.grandtotal').html(response.total);
                }
            });
        }

        function filter_order_date(start_date, end_date) {
            $.ajax({
                url: "{{ route('getOrderbyDate') }}",
                method: "GET",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        var output = '';
                        var cnt = 1;
                        for (var count = 0; count < data.length; count++) {

                            var photo = data[count].images == null ?
                                '<img src="../../assets/img/no_user_profile.jpg"  height="50px" width="50px" alt="" />' :
                                '<img src="../../assets/img/' + data[count].images +
                                '"  height="50px" width="50px" alt="" />';

                            var tranPhoto = (data[count].payment_transaction_image == "") ? 'N/A' :
                                '<a href="../../assets/img/' + data[count].payment_transaction_image +
                                '"> <img src = "../../assets/img/' + data[count].payment_transaction_image +
                                '"  height="50px" width="50px" alt="" /> </a>';

                            output += '<tr>';
                            output += '<td>' + cnt++ + '</td>';
                            output += '<td>' + data[count].order_date + '</td>';
                            output += '<td>' + data[count].payment_method + '</td>';
                            output += '<td>' + tranPhoto + '</td>';
                            output += '<td>' + data[count].username + '</td>';
                            output += '<td>' + data[count].status + '</td>';
                            output += '<td>' +
                                ' <a href="#order_detail" class="edit text-primary order_detail" data-id="' +
                                data[count].orderid +
                                '"> <i class="fa fa-eye"></i> </a> | <a href="#invoice" class="delete text-primary invoice" data-id="' +
                                data[count].orderid + '"> <i class="fas fa-file-invoice"></i> </a>' +
                                '</td></tr>';

                        }
                        $('tbody').html(output);
                    } else {
                        var out = '';
                        out += '<tr>';
                        out += '<td colspan="6">' + 'No data found' + '</td></tr>';
                        $('tbody').html(out);
                    }
                }
            })
        }
    </script>
</body>

</html>
