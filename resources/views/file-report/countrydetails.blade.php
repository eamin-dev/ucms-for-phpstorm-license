@extends('layouts.app')
@section('title', 'Rapid Pro ')
@section('css')

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
@endsection
@section('content')
    <div class="content roleData">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title"><b>Asia</b> </h4>
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

            {{-- first row --}}
            <div class="row">

                <div class="col-md-3">
                    <div class="card-box"
                        style="background: linear-gradient(282.59deg, #38ACFF 4.55%, rgba(191, 224, 255, 0.97) 120.48%);
                                border-radius: 20px;">
                        <div class="media-card text-light pl-3">
                            <div class="media-body align-self-center">
                                <div class="text-left">
                                    <h3 class="text-white"> <strong> 32 </strong> </h3>
                                    <h4 class="text-light">Total Country </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->
                </div>


                <div class="col-md-3">
                    <div class="card-box"
                        style="background: linear-gradient(283.84deg, #6119BC 2.94%, rgba(148, 111, 255, 0.74) 98.65%);border-radius: 20px;">
                        <div class="media-card text-light pl-3">
                            <div class="media-body align-self-center">
                                <div class="text-left">
                                    <h3 class="text-white"> <strong> 512 </strong> </h3>
                                    <h4 class="text-light">Total Themefic Area </h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->
                </div>


                <div class="col-md-3">
                    <div class="card-box"
                        style="background: linear-gradient(282.59deg, #4162bc 4.55%, rgba(12, 96, 175, 0.97) 120.48%);
                        border-radius: 20px;">
                        <div class="media-card text-light pl-3">
                            <div class="media-body align-self-center">
                                <div class="text-left">
                                    <h3 class="text-white"> <strong> 35 </strong> </h3>
                                    <h4 class="text-light">Total RapidPro Creation </h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->

                </div>
                <!-- end card-box-->
                <div class="col-md-3">
                    <div class="card-box"
                        style="background: linear-gradient(107.58deg, #266C3E 0%, #35D994 92.27%);
                            border-radius: 20px;">
                        <div class="media-card text-light pl-3">
                            <div class="media-body align-self-center">
                                <div class="text-left">
                                    <h3 class="text-white"> <strong> 50 </strong> </h3>
                                    <h4 class="text-light">Total IOGT Push </h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->
                </div>

            </div>
            <!-- end fist row -->

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="text-white" style="background-color: rgb(109, 109, 251)">
                            <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">Country</th>
                                <th class="text-center">Total Rapid Pro</th>
                                <th class="text-center">Iogt push</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Bangladesh</td>
                                <td class="text-center">35</td>
                                <td class="text-center">40</td>

                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">Bangladesh</td>
                                <td class="text-center">35</td>
                                <td class="text-center">40</td>

                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="text-center">Bangladesh</td>
                                <td class="text-center">35</td>
                                <td class="text-center">40</td>

                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="text-center">Bangladesh</td>
                                <td class="text-center">35</td>
                                <td class="text-center">40</td>

                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="text-center">Bangladesh</td>
                                <td class="text-center">35</td>
                                <td class="text-center">40</td>

                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td class="text-center">Bangladesh</td>
                                <td class="text-center">35</td>
                                <td class="text-center">40</td>

                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>



        </div>
        <!-- end container-fluid -->
    </div>



@endsection

@section('script')

@endsection
