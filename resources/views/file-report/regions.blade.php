@extends('layouts.app')
@section('title', 'Regions')
@section('css')
    <style>
        .mycard {
            background-color: #FFFFFF;
            background-position: right top;
            background-repeat: no-repeat;
            border-radius: 40px;
            background-size: 125px;
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
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                @foreach($data as $region)

                    <div class="col-lg-3">
                        <div class="card p-4 mycard"
                             style="background-image: url({{ asset('assets/images').'/'.$region['region_image'] }})">
                            <a href="{{ route('country.wise.details',$region['region_id']) }}" style="font-size: 32px"
                               class="fw-normal text-dark mb-3 d-inline-block">{{ $region['region_name'] }}</a>
                            <p class="mb-0">Country - {{ $region['total_country'] }}</p>
                            <p class="mb-0"> Thematic area - {{ $region['total_themefic_area_count'] }}</p>
                            <p class="mb-0">Total RapidPro flow- {{ $region['total_flow_count'] }}</p>
                            <p class="mb-0">Total IoGT push- 0</p>
                        </div>
                    </div>

                @endforeach

            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>

@endsection

@section('script')

@endsection
