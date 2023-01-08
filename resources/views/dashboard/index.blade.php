@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h2 class="page-title"> <strong class="text-info">Dashboard</strong> </h2>
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

    <!--Widget-4 -->
    {{-- first row --}}
    <div class="row">

        <div class="col-md-4">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md rounded-circle mr-2">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h4 class="">Total User</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalActiveUsers }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-4">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md rounded-circle mr-2">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h4 class="">Total Admin</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalActiveUsers }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>


        <div class="col-md-4">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md rounded-circle mr-2">
                        <i class="fas fa-user-plus" style="width: 100%"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h4 class="">Total Themefic Area</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalThemeficAreas }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

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

        <div class="col-md-4 ">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md rounded-circle mr-2">
                        <i class="fas fa-user-plus" style="width: 100%"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h4 class="">Total RapidPro Access</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalRapidProUser }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-4">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md rounded-circle">
                        <i class=" fas fa-list-alt"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h4 class="">Active RapidPro Access</h4>
                            <p class="mb-0 mt-1 text-truncate"> {{ $totalRapidActiveUser ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-4">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md rounded-circle">
                        <i class=" fas fa-list-alt"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h4 class="">Total Json Extract  </h4>
                            <p class="mb-0 mt-1 text-truncate"> {{ $totalRapidActiveUser ?? 0 }}</p>
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

        <div class="col-md-4">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md rounded-circle mr-2">
                        <i class="fas fa-user-plus" style="width: 100%"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h4 class="">Total IOGT Access</h4>
                            <p class="mb-0 mt-1 text-truncate"> <strong> {{ $totalRapidProUser }} </strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md rounded-circle">
                        <i class=" fas fa-list-alt"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h4 class="">Active IOGT Access</h4>
                            <p class="mb-0 mt-1 text-truncate"> {{ $totalRapidActiveUser ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-4">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md rounded-circle">
                        <i class=" fas fa-list-alt"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-left">
                            <h4 class="">Total Push to IOGT</h4>
                            <p class="mb-0 mt-1 text-truncate"> 0</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>
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
