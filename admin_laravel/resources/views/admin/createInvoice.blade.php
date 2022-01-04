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
                                    <li class="breadcrumb-item"><a href="#">Create Invoice</a></li>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Invoice To:</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="#">
                                @foreach ($data as $row)
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Customer Name:</span>
                                        </div>
                                        <input type="text" readonly class="form-control"
                                            value="{{ $row->username }}">
                                    </div>

                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Payment Method:</span>
                                        </div>
                                        <input type="text" readonly class="form-control"
                                            value="{{ $row->payment_method }}">
                                    </div>

                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Order No:</span>
                                        </div>
                                        <input type="text" name="orderid" readonly class="form-control"
                                            value="{{ $row->orderid }}" id="orderid">
                                    </div>

                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Order Date:</span>
                                        </div>
                                        <input type="text" readonly class="form-control"
                                            value=" {{ $row->order_date }} ">
                                    </div>
                                @endforeach
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
                    Order Detail View
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product-Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0;
                                $total = 0;
                                $count = 1;
                            @endphp
                            @foreach ($dataDetail as $rowDetail)
                                @php
                                    $subtotal = $rowDetail->price * $rowDetail->qty;
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td> <input type="text" value="{{ $rowDetail->productname }}"
                                            class="form-control" name="proname[]" readonly>
                                        <input type="hidden" name="proid[]" value="{{ $rowDetail->productid }}">
                                    </td>
                                    <td> <input type="text" class="form-control"
                                            value="&#36; {{ $rowDetail->price }}" name="price[]" readonly> </td>
                                    <td><input type="text" class="form-control" value="{{ $rowDetail->qty }}"
                                            name="qty[]" readonly></td>
                                    <td> <input type="text" value="&#36; {{ number_format($subtotal, 2) }}"
                                            class="form-control" readonly>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Product-Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="text-right mt-4">
                        <h3 class="text-danger"> Total: &#36; {{ number_format($total, 2) }} </h3>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger" type="button" onclick="window.history.back()">Back</button>
                    <button class="btn btn-success" type="submit" name="createInvoice">Create Invoice</button>
                </div>
                </form>
            </div>

            <!-- Footer -->
            @include('admin.includes.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    @include('admin.includes.scripts')


</body>

</html>
