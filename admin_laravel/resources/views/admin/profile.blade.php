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
                                    <li class="breadcrumb-item"><a href="#">Profile</a></li>
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
        <div class="container-fluid mt--4">
            <form method="POST" action="{{ route('edit_profile') }}">
                {{ csrf_field() }}
                @foreach ($data as $row)
                    @php
                        $userlevel = $row->userlevel == 1 ? 'Admin' : 'Sale';
                        $photo = $row->images != null ? '../../assets/img/' . $row->images . '' : '../../assets/img/no_user_profile.jpg';
                    @endphp
                    <div class=" rounded bg-white mt-5">
                        <div class="row">
                            <div class="col-md-4 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                        class="rounded-circle mt-5" src="{!! $photo !!}" width="200"><span><a
                                            href="#" id="editPhoto" data-id="{{ $row->userid }}"
                                            class="fas fa-edit text-right"></a></span><span class="font-weight-bold">
                                        {{ $row->username }} </span><span class="text-black-50">
                                        {{ $row->email }} </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex flex-row align-items-center back"><i
                                                class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                        </div>
                                        <h5 class="text-right">Edit Profile</h5>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="first_name"> <b>First Name:</b></label>
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder=" Enter First Name" id="fname"
                                                value="{{ $row->first_name }}">

                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name"><b>Last Name:</b></label>
                                            <input type="text" name="last_name" id="lname" class="form-control"
                                                value=" {{ $row->last_name }} " placeholder="Enter Last Name">

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="username"><b>Username:</b></label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                placeholder="Username" value=" {{ $row->username }} ">

                                        </div>
                                        <div class="col-md-6">
                                            <label for="email"><b>Email:</b></label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Email" value=" {{ $row->email }} ">

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="address"><b>Address:</b></label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                placeholder="address" value=" {{ $row->address }} ">

                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone_number"><b>Phone Number:</b></label>
                                            <input type="text " name="phone_number" id="phone_number"
                                                class="form-control" value=" {{ $row->phone }} "
                                                placeholder="Phone number">

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="user_type"> <b>Type: </b></label>
                                            <input type="text" class="form-control" readonly placeholder="User Type"
                                                value=" {{ $userlevel }} ">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="user_type"> <b>Register Date: </b></label>
                                            <input type="text" class="form-control" readonly
                                                placeholder=" Regiser Date" value=" {{ $row->register_date }} ">
                                        </div>
                                    </div>

                                    <div class="mt-4 text-right">
                                        <button class="btn btn-primary" id="save" name="save"
                                            type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                @endforeach
            </form>
        </div>
        <!-- Footer -->
        @include('admin.includes.footer')
    </div>


    <!-- Argon Scripts -->
    @include('admin.includes.scripts')

</body>

</html>
