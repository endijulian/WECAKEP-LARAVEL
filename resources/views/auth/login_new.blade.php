<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/iCheck/square/blue.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
{{-- <body style="background-repeat: no-repeat; background-attachment: fixed;  background-size: cover; background-image: url({{asset('img/background.jpeg')}})" class="hold-transition login-page"> --}}
<body class="hold-transition login-page">

    <div style="margin-top: 10px;" class="login-logo">
        <img style="width: 350px;" src="{{asset('img/header-polsekjatiuwung.png')}}" alt="">
        {{--  <a href="#"><b>Polsek Jatiuwung</b></a>  --}}
        <center>
            <h3>SELAMAT DATANG DI WEBSITE WECAKEP (WEBSITE CATATAN KEPOLISIAN) </h3>
        </center>
        <h5>1. Website ini digunakan untuk mencatat, menyimpan dan menampilkan data pelaku tindak pidana <br>
                dan/atau pelanggaran guna mendukung legitimasi penerbitan Surat Keterangan Catatan Kepolisian (SKCK).</h5>
        <h5>2. Pada website ini terdapat pilihan untuk menghapus data namun dengan seizin KAPOLSEK. <br> Sebelum melakukan entry data, petugas WAJIB untuk meneliti seluruh data yang akan dimasukkan.</h5>
    </div>

    <div class="login-box">
    <div style="background-color: gray;"class="login-box-body">
        <p style="color: white;" class="login-box-msg">Silahkan Login</p>

    <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group has-feedback">

                <input type="text" name="username" class="form-control @error('username') : is-invalid @enderror" placeholder="USERNAME" value="{{ old('username') }}" required autocomplete="username" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control @error('password') : is-invalid @enderror" placeholder="NRP" value="{{ old('password') }}" required autocomplete="password" autofocus>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
        </div>
    </form>
    </div>
    </div>

    <script src="{{asset('AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
            $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>
</html>
