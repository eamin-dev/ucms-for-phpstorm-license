<!DOCTYPE html>
{{-- <html lang="{{$locale}}"> --}}
<head>
    {{-- <meta charset="{{$charset}}" /> --}}
    <title>@yield('title')</title>
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
    <!-- Plugins css-->
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- Responsive Table css -->
    <link href="{{asset('assets/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom box css -->
    <link href="{{asset('assets/libs/custombox/custombox.min.css')}}" rel="stylesheet">
    <!--Toastr CDN -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @yield('css')

</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    @include('layouts.topbar')
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">

        <!-- start content -->
        @yield('content')
        <!-- end content -->



        <!-- Footer Start -->
       @include('layouts.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->


<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<script src="{{asset('assets/libs/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-scrollto/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- Chat app -->
<script src="{{asset('assets/js/pages/jquery.chat.js')}}"></script>

<!-- Todo app -->
<script src="{{asset('assets/js/pages/jquery.todo.js')}}"></script>

<!-- flot chart -->
<script src="{{asset('assets/libs/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('assets/libs/flot-charts/jquery.flot.time.js')}}"></script>
<script src="{{asset('assets/libs/flot-charts/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('assets/libs/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/libs/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/libs/flot-charts/jquery.flot.selection.js')}}"></script>
<script src="{{asset('assets/libs/flot-charts/jquery.flot.stack.js')}}"></script>
<script src="{{asset('assets/libs/flot-charts/jquery.flot.crosshair.js')}}'"></script>
<!-- Dashboard init JS -->
<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
<!-- Responsive Table js -->
<script src="{{asset('assets/libs/rwd-table/rwd-table.min.js')}}"></script>
<!-- Init js -->
<script src="{{asset('assets/js/pages/responsive-table.init.js')}}"></script>
<!-- Modal-Effect -->
<script src="{{asset('assets/libs/custombox/custombox.min.js')}}"></script>
<!-- Toastr js-->
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

{!! Toastr::message() !!}

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('.summernote').summernote({
        height: 400,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    });
</script>

@yield('script')

</body>

</html>
