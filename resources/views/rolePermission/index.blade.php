@extends('layouts.app')
@section('title', 'Role Permission')
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
                        <h4 class="page-title">Role & Permission</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#role-add-modal"><i class="fas fa-user-plus"></i> Add Role</button>
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
                                @forelse($roles as $role)
                                <div class="card col-md-3">
                                    <div class="card-header bg-soft-dark row">
                                        <div class="col-md-6">
                                            <h3 class="card-title text-dark">{{$role->name}}</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-sm btn-info float-right" data-id="{{$role->id}}" id="roleEditBtn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body border-2">
                                        <p class="mb-0">
                                            @forelse($role->permissions as $permission)
                                                <span class="badge badge-primary">{{strtoupper($permission->name)}}</span>
                                            @empty
                                                <span class="text-danger">No Permission Set</span>
                                            @endforelse
                                        </p>
                                    </div>
                                </div> &nbsp;&nbsp;
                                @empty
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            No data found
                                        </div>
                                    </div>
                                @endforelse


                                @isset($roles)
                                    <div class="col-md-12 col-sm-12 col-12 ">
                                        {{$roles->links()}}
                                    </div>
                                @endisset
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
                    <h5 class="modal-title">Add New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('rolePermission.role_create_form')
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
