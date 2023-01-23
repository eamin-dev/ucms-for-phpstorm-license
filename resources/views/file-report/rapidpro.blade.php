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
                        <h4 class="page-title">File Report - RapidPro</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#role-add-modal"><i class="fas fa-filter"></i> Filter</button>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table id="ReportDatatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#ReportDatatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('report.rapidpro') }}",
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        title: 'SL',
                        searchable: false,
                        bSortable:false,
                    },
                    {
                        data: 'file_id',
                        title: 'File Name'
                    },
                    {
                        data: 'creator.name',
                        title: 'Name',
                        searchable: false,
                    },
                    {
                        data: 'creator.email',
                        title: 'Email',
                        searchable: false,
                    },
                    {
                        data: 'creator.region.name',
                        title: 'Region',
                        searchable: false,
                    },
                    {
                        data: 'creator.country.name',
                        title: 'Country',
                        searchable: false,
                    },
                    {
                        data: 'themefic_area',
                        title: 'Themefic Area',
                    },
                    {
                        data: 'date_time',
                        title: 'Date & Time',
                    },
                    {
                        data: 'action',
                        title: 'Action',
                        searchable: false,
                        orderable: false,
                    },
                ]
            });
        })
    </script>
@endsection
