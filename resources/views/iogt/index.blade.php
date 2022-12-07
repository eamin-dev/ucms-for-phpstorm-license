@extends('layouts.app')
@section('title', 'Rapid Pro ')
@section('css')
@endsection
@section('content')
    <div class="content roleData">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">IOGT Translate </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#role-add-modal"><i class="fas fa-user-plus"></i>Translate</button>
                                </li>
                            </ol>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <!-- Basic example -->
                        <div class="col-xl-6">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Basic example</h3>
                                </div> --}}
                                <div class="card-body">
                                    <form>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">English</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" readonly placeholder="English">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Title</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="" id="" class="form-control" cols="30" rows="10">
                                                Enter text here
                                            </textarea>
                                        </div>
                                        {{-- <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button> --}}
                                    </form>
                                </div>
                                <!-- card-body -->
                            </div>
                            <!-- card -->
                        </div>
                        <!-- col-->

                        <!-- Horizontal form -->
                        <div class="col-xl-6">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Basic example</h3>
                                </div> --}}
                                <div class="card-body">
                                    <form>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Language</label>
                                            <select name=""  class="form-control" id="">
                                                <option value="">Select Language</option>

                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Title</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="" id="" class="form-control" cols="30" rows="10">
                                                Enter text here
                                            </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Push to IOGT</button>
                                    </form>
                                </div>
                                <!-- card-body -->
                            </div>
                            <!-- card -->
                        </div>
                        <!-- col -->

                    </div>
                    <!-- End row -->
                  
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>



@endsection

@section('script')
    @include('rolePermission.script')
@endsection
