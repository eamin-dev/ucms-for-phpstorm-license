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
                        <h4 class="page-title">RapidPro Flow Create</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#role-add-modal"><i class="fas fa-user-plus"></i>Create New</button>
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
                    <div class="card card-border card-primary">

                        <div class="card-header border-primary bg-transparent pb-0">
                            {{--                            <h3 class="card-title text-primary">Lorem Ipsum .....</h3>--}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                               


                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>


    <!-- MODAL start-->

    <div id="role-add-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('rapidPro.rapidflow-create')
            </div>
        </div>
    </div>

    <div id="role-edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role & Permissions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="formContent"></div>
            </div>
        </div>
    </div>

    <!-- MODAL end-->

@endsection

@section('script')
    @include('rolePermission.script')
@endsection
