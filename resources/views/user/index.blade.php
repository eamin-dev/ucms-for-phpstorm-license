@extends('layouts.app')
@section('title', 'User list')
@section('css')
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">User list</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#user-add-modal"><i class="fas fa-user-plus"></i> Add User</button>
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
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table class="table table-striped table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Full Name</th>
                                        <th data-priority="1">Email</th>
                                        <th data-priority="2">Status</th>
                                        <th data-priority="3">Role</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{\App\Models\Setting::status()[$user->status]}} </td>
                                            <td>
                                                {{$roles->where('id', $user->role_id)->first()->name ?? $roles->where('id', $user->role_id)->first()}}
                                                <div class=" float-right  btn-group mt-1 mr-1">
                                                    <button type="button" class="btn btn-light btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <button data-id="{{$user->id}}" id="userEditBtn" type="button" class="dropdown-item text-info">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button id="deleteUserBtn" data-id="{{$user->id}}" type="button" class="dropdown-item text-danger">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </li>
                                                        <li>
                                                            @if($user->status == 1)
                                                                <button id="changeStatusBtn" data-id="{{$user->id}}" data-status="2" type="button" class="dropdown-item text-purple">
                                                                    <i class="fas fa-pen-nib"></i> Inactive
                                                                </button>
                                                            @else
                                                                <button id="changeStatusBtn" data-id="{{$user->id}}" data-status="1" type="button" class="dropdown-item text-success">
                                                                    <i class="fas fa-pen-nib"></i> Active
                                                                </button>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No data found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                </div>
                                @isset($users)
                                    <div class="col-md-12 col-sm-12 col-12 ">
                                        {{$users->links()}}
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

    <div id="user-add-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('user.user_create_form')
            </div>
        </div>
    </div>

    <div id="user-edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User Information</h5>
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
    @include('user.script')
@endsection
