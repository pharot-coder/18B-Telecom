<!DOCTYPE html>
<html>

<head>
    @include('admin.includes.header')
</head>

<body class="bg-blue">
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <div class="container mt-6">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-list"></i>
                    Admin Login
                </div>
                <div class="card-body" style="width: 400px;">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action=" {{ route('checklogin') }} " method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for=""> Password: </label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <!-- Remember me -->
                            <div class="custom-control custom-checkbox mb-3">
                                <input class="custom-control-input" id="remember_me" name="remember_me" type="checkbox">
                                <label class="custom-control-label" for="remember_me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.scripts')
</body>

</html>
