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
                                    <li class="breadcrumb-item"><a href="#">Invoice</a></li>
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
                        <div class="col-md-8">
                            <form action="" method="get" id="filter_by_date">
                                <div class="input-daterange datepicker row align-items-center">
                                    <div class="col-sm-4">
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
                                    <div class="col-sm-4">
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

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <button id="dateFilter" class="btn btn-success"
                                                name="seach_date">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="#generate_pdf" onclick="window.open('{{ route('generatePDF') }}')"
                                class="btn btn-primary"> Export PDF </a>
                            <a href="{{ route('export_invoice_excel') }}" class="btn btn-primary"> Export Excel </a>
                        </div>
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
                    Invoice View
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice-No</th>
                                <th>Invoice-Date</th>
                                <th>Order-No</th>
                                <th>Customer</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($invoiceData as $row)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td> {{ $row->invoiceid }} </td>
                                    <td> {{ date('d-M-Y', strtotime($row->date)) }} </td>
                                    <td> {{ $row->orderid }} </td>
                                    <td> {{ $row->customername }} </td>
                                    <td>
                                        <a href="#view" data-id="{{ $row->invoiceid }}"
                                            class=" btn btn-info btn-sm fa fa-eye">View</a>
                                        |
                                        <a href="#print" data-id="{{ $row->invoiceid }}"
                                            class=" btn btn-primary btn-sm fa fa-print">Print</a>
                                        |
                                        <a href="#remove" data-id="{{ $row->invoiceid }}"
                                            class=" btn btn-danger btn-sm fa fa-trash remove">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Invoice-No</th>
                                <th>Invoice-Date</th>
                                <th>Order-No</th>
                                <th>Customer</th>
                                <th>Tools</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            @include('admin.includes.invoice_modal')
            <!-- Footer -->
            @include('admin.includes.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    @include('admin.includes.scripts')

    <script>
        $(document).ready(function() {
            $('.remove').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#deleteModal').modal('show');
                getRow(id);
            });
        });

        function getRow(id) {
            $.ajax({
                type: "GET",
                url: "{{ route('get_row_invoice') }}",
                data: {
                    invoiceid: id
                },
                dataType: "JSON",
                success: function(response) {

                }
            });
        }
    </script>


</body>

</html>
