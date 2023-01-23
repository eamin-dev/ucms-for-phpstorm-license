@extends('layouts.app_login')
@section('content')
    <div class="account-pages  my-5">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-header">
                            {{-- <div class="bg-overlay"></div> --}}
                            <div class="text-center">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            </div>


                            <br>
                            <h3 class="text-black text-center mb-0">Login</h3>
                        </div>
                        <div class="card-body p-4 mt-2">
                            <form action="{{ route('login.user') }}" method="post" class="p-3">@csrf
                                <div class="form-group mb-3">
                                    <input class="form-control" name="email" type="email" required=""
                                        placeholder="Email address">
                                </div>

                                <div class="form-group mb-3">
                                    <input class="form-control" name="password" type="password" required=""
                                        placeholder="Password">
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-sm-7 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                    <div class="col-sm-5 text-right">
                                        <a href="#"><i class="fa fa-lock mr-1"></i> Forgot password?</a>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-5 mb-4">
                                    {{-- <button class="btn btn-info waves-effect width-md waves-light" type="submit"> Log In </button> --}}

                                    <button type="submit" class="btn btn-info btn-block">Login</button>
                                </div>



                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <!-- end row -->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
    </div>
@endsection
