<!DOCTYPE html>
{{-- <html lang="{{$locale}}"> --}}

<head>
    {{-- <meta charset="{{$charset}}" /> --}}
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{$favicon}}"> --}}

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <style>
        .bg{

            background-image: url(/assets/images/ucms-logo.png);
            background-repeat: round

        }
    </style>

</head>


<body class="authentication-page bg">

@yield('content')

<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>

</body>

</html>
