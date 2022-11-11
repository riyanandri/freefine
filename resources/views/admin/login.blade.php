<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('admin/auth/css/auth.css') }}">

    <!--<title>Login & Registration Form</title>-->
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>
                @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 15px;" role="alert">
                    <strong style="color: red;">Error :</strong> {{ Session::get('error_message')}}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger" style="margin-top: 20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ url('admin/login') }}" method="post">
                    @csrf
                    <div class="input-field">
                        <input type="text" id="email" class="form-control" name="email" placeholder="Email">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                        <i class="uil uil-lock icon"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Ingat saya</label>
                        </div>

                        <a href="#" class="text">Lupa password?</a>
                    </div>

                    <div class="input-field button">
                        <button type="submit"><input type="button" value="Masuk"></button>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Belum punya akun?
                        <a href="#" class="text signup-link">Daftar</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
