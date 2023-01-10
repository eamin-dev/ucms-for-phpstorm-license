@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h2 class="page-title"><strong class="text-info">Dashboard</strong> </h2>
                    {{-- <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">DCMS</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> --}}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <style>
        .card-box {
            background-image: linear-gradient(to left, rgba(0, 0, 0, .6), rgba(0, 0, 0, 0.3));
            position: relative;
            height: 180px;
            overflow: hidden;
            z-index: 10;
            display: flex;
            align-items: center;
            --style-box-size: 140px;
            --bg-style-color: rgba(255, 255, 255, 0.2);
        }

        .card-box::after,
        .card-box::before {
            content: '';
            display: block;
            position: absolute;
            bottom: 0%;
            right: 0;
            transform: translate(calc(var(--style-box-size) / 2), 5%);
            width: var(--style-box-size);
            height: var(--style-box-size);
            border-radius: 100%;
            background-color: var(--bg-style-color);
            z-index: -10;
        }

        .card-box::before {
            background-color: var(--bg-style-color);
            right: calc(0% + 20px);
            transform: translateY(50px);
        }
    </style>
    <!--Widget-4 -->
    {{-- first row --}}
    <div class="row">

        <div class="col-md-4">
            <div class="card-box"
                style="background: linear-gradient(284.59deg, #FF3535 0%, rgba(252, 180, 114, 0.88) 87.75%);
                border-radius: 20px;">
                <div class="media-card text-light pl-3">
                    <i class="fas display-4 fa-user-circle mb-2"></i>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h2 class="text-light">Total User  </h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalActiveUsers }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>


        <div class="col-md-4">
            <div class="card-box"
                style="background: linear-gradient(282.59deg, #38ACFF 4.55%, rgba(191, 224, 255, 0.97) 120.48%);
                border-radius: 20px;">
                <div class="media-card text-light pl-3">
                    <i class="fas display-4 fa-user-circle mb-2"></i>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h2 class="text-light">Total Admin  </h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalActiveUsers }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>





            <div class="col-md-4">
                <div class="card-box"
                    style="background: linear-gradient(283.84deg, #6119BC 2.94%, rgba(148, 111, 255, 0.74) 98.65%);
border-radius: 20px;">
                    <div class="media-card text-light pl-3">
                        <i class="fas display-4 fa-user-circle mb-2"></i>
                        <div class="media-body align-self-center">
                            <div class="text-left">
                                <h2 class="text-light">Total Themefic Area </h4>
                                <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalThemeficAreas }} </strong> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-box-->
            </div>
            <!-- end card-box-->

    </div>
    <!-- end fist row -->

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title"> <b><strong class="text-info">Rapid Pro</strong></b> </h2>
            </div>

        </div>
    </div>

    {{-- Second row --}}
    <div class="row">


        <div class="col-md-4">
            <div class="card-box"
                style="background: linear-gradient(107.58deg, #12D519 0%, #009106 92.27%);
                border-radius: 20px;">
                <div class="media-card text-light pl-3">
                    <i class="fas display-4 fa-user-circle mb-2"></i>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h2 class="text-light">Total RapidPro Access</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalRapidProUser ?? 0 }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-4">
            <div class="card-box"
                style="background: linear-gradient(107.58deg, #A4C8FF 0%, #6B68FF 92.27%);
                border-radius: 20px;">
                <div class="media-card text-light pl-3">
                    <i class="fas display-4 fa-user-circle mb-2"></i>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h2 class="text-light">Active RapidPro Access</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalRapidActiveUser ?? 0 }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-4">
            <div class="card-box"
                style="background: linear-gradient(107.58deg, #E8D9A4 0%, #D0A200 92.27%);
                border-radius: 20px;">
                <div class="media-card text-light pl-3">
                    <i class="fas display-4 fa-user-circle mb-2"></i>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h2 class="text-light">Total Json Extract </h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalRapidActiveUser ?? 0 }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>


    </div>
    <!-- end 2nd row -->

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title"> <b><strong class="text-info">IOGT</strong></b> </h2>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    {{-- third row --}}

    <div class="row">

        {{-- new --}}
        <div class="col-md-4">
            <div class="card-box"
                style="background: linear-gradient(107.58deg, #FF855F 0%, #FE9800 92.27%);
                border-radius: 20px;">
                <div class="media-card text-light pl-3">
                    <i class="fas display-4 fa-user-circle mb-2"></i>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h2 class="text-light">Total  IOGT Access</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalRapidProUser ?? 0 }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-4">
            <div class="card-box"
                style="background: linear-gradient(107.58deg, #266C3E 0%, #35D994 92.27%);
                border-radius: 20px;">
                <div class="media-card text-light pl-3">
                    <i class="fas display-4 fa-user-circle mb-2"></i>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h2 class="text-light"> IOGT Access</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalRapidActiveUser ?? 0 }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-4">
            <div class="card-box"
                style="background: linear-gradient(107.58deg, #FFA9A9 0%, #D01900 92.27%);
                border-radius: 20px;">
                <div class="media-card text-light pl-3">
                    <i class="fas display-4 fa-user-circle mb-2"></i>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h2 class="text-light">Push to IOGT</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalRapidActiveUser ?? 0 }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        {{-- end new --}}

    </div>

    {{-- end third row --}}

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="card-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false"
                            aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                        <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h5 class="card-title mb-0"> Website Stats</h5>
                </div>
                <div id="cardCollpase1" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="website-stats" style="position: relative;height: 320px"></div>
                                <div class="row text-center mt-4">
                                    <div class="col-sm-4">
                                        <h5 class="my-1"><span data-plugin="counterup">86,956</span></h5>
                                        <small class="text-muted"> Weekly Report</small>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5 class="my-1"><span data-plugin="counterup">86,69</span></h5>
                                        <small class="text-muted">Monthly Report</small>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5 class="my-1"><span data-plugin="counterup">948,16</span></h5>
                                        <small class="text-muted">Yearly Report</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end card-->
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="card-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false"
                            aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                        <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h5 class="card-title mb-0"> Website Stats</h5>
                </div>
                <div id="cardCollpase2" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="pie-chart">
                                    <div id="pie-chart-container" class="flot-chart" style="height: 320px">
                                    </div>
                                </div>
                                <div class="row text-center mt-4">
                                    <div class="col-sm-6">
                                        <h5 class="my-1"><span data-plugin="counterup">86,69</span></h5>
                                        <small class="text-muted"> Weekly Report</small>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="my-1"><span data-plugin="counterup">86,69</span></h5>
                                        <small class="text-muted">Monthly Report</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end card-->
        </div>
        <!-- end col -->
    </div>
    <!-- End row -->

    </div>
    <!-- end container-fluid -->

@endsection
