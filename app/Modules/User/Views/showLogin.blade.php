<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <style>
    .login-page {
        background: #242424;
    }
    </style>
</head>

<body class="hold-transition login-page" >

    <div class="login-box">
        <div class="login-logo">
                <img src="{{asset('/img/whbi.png')}}" alt="" class="pb-2" style="width: 280px;
                height: 280px;
                object-fit: contain;">
            <a href="#"><b> Login to WH - BI</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{route('handleLogin')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{old('email')}}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            value="{{old('password')}}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                    <!-- /.col -->
            </div>
            </form>



        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    @include('sweet::alert')
</body>

</html>
