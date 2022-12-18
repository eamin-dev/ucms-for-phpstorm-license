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
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">File Id</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Actions</th>
                                        </thead>

                                        <tbody>

                                            @forelse ($allFlows as $key=>$flow)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center"> File Id:<span class="badge badge-primary"> {{ $flow->file_id }} </span></td>
                                                <td class="text-center">{{ date('d-M-Y',strtotime($flow->date)) }} </td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="#" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>

                                            </tr>
                                                
                                            @empty

                                                <tr>
                                                    <td class="text-center">No data found</td>
                                                </tr>
                                                
                                            @endforelse
                                           
                                           
                                       
                                        </tbody>
                                    </table>

                                </div>
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



@endsection

@section('script')
    @include('rolePermission.script')
@endsection
