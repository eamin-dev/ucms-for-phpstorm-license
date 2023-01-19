@extends('layouts.app')
@section('title', 'Regions')
@section('css')
    <style>
        .mycard {
            background-color: #FFFFFF;
            background-position: right top;
            background-repeat: no-repeat;
            border-radius: 40px;
            background-size:125px;
        }
    </style>
@endsection
@section('content')
    <div class="content roleData">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Region </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">

                                </li>
                            </ol>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-3">
                    <div class="card p-4 mycard" style="background-image: url(assets/images/asia.png)">
                        <a href="{{ route('country.wise.details') }}" style="font-size: 32px"
                            class="fw-normal text-dark mb-3 d-inline-block">Asia</a>
                        <p class="mb-0">Country - 7</p>
                        <p class="mb-0"> Thematic area - 120</p>
                        <p class="mb-0">Total RapidPro flow- 2131</p>
                        <p class="mb-0">Total IoGT push- 230</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card p-4 mycard" style="background-image: url(assets/images/img2.svg)">
                        <a href="{{ route('country.wise.details') }}" style="font-size: 32px"
                            class="fw-normal text-dark mb-3 d-inline-block">Africa </a>
                        <p class="mb-0">Country - 7</p>
                        <p class="mb-0"> Thematic area - 120</p>
                        <p class="mb-0">Total RapidPro flow- 2131</p>
                        <p class="mb-0">Total IoGT push- 230</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card p-4 mycard" style="background-image: url(assets/images/north.svg)">
                        <a href="{{ route('country.wise.details') }}" style="font-size: 32px"
                            class="fw-normal text-dark mb-3 d-inline-block">North America</a>
                        <p class="mb-0">Country - 7</p>
                        <p class="mb-0"> Thematic area - 120</p>
                        <p class="mb-0">Total RapidPro flow- 2131</p>
                        <p class="mb-0">Total IoGT push- 230</p>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card p-4 mycard"  style="background-image: url(assets/images/north.svg)">
                        <a href="{{ route('country.wise.details') }}" style="font-size: 32px"
                            class="fw-normal text-dark mb-3 d-inline-block">South America</a>
                        <p class="mb-0">Country - 7</p>
                        <p class="mb-0"> Thematic area - 120</p>
                        <p class="mb-0">Total RapidPro flow- 2131</p>
                        <p class="mb-0">Total IoGT push- 230</p>
                    </div>
                </div>
                 <div class="col-lg-3">
                    <div class="card p-4 mycard" style="background-image: url(assets/images/ant.png)">
                        <a href="{{ route('country.wise.details') }}" style="font-size: 32px"
                            class="fw-normal text-dark mb-3 d-inline-block">Antarctica</a>
                        <p class="mb-0">Country - 7</p>
                        <p class="mb-0"> Thematic area - 120</p>
                        <p class="mb-0">Total RapidPro flow- 2131</p>
                        <p class="mb-0">Total IoGT push- 230</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card p-4 mycard" style="background-image: url(assets/images/europe.png)">
                        <a href="{{ route('country.wise.details') }}" style="font-size: 32px"
                            class="fw-normal text-dark mb-3 d-inline-block">Europe</a>
                        <p class="mb-0">Country - 7</p>
                        <p class="mb-0"> Thematic area - 120</p>
                        <p class="mb-0">Total RapidPro flow- 2131</p>
                        <p class="mb-0">Total IoGT push- 230</p>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card p-4 mycard" style="background-image: url(assets/images/australia.png)">
                        <a href="{{ route('country.wise.details') }}" style="font-size: 32px"
                            class="fw-normal text-dark mb-3 d-inline-block">Australia</a>
                        <p class="mb-0">Country - 7</p>
                        <p class="mb-0"> Thematic area - 120</p>
                        <p class="mb-0">Total RapidPro flow- 2131</p>
                        <p class="mb-0">Total IoGT push- 230</p>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>



@endsection

@section('script')

@endsection
