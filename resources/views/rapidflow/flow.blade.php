@extends('layouts.app')
@section('title', 'Rapid Flow ')
@section('css')
    <!-- DataTable CSS Start -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <!-- DataTable CSS END -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-totastr.min.css') }}">

    <style>
        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single {
            background-color: white;
        }

        .table>thead>tr>th {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="main-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-titlee float-left pt-2">RapidPro Flow Creation</h4>

                            <div class="card-tools float-right">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <button id="addNew" name="addNew" class="btn btn-primary  text-white"><i
                                                class="fa fa-plus-circle"></i> Create new
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Content Table Start-->
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table id="userTable" class="table table-striped table-bordered text-center"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    </table>
                                </div>
                                <!-- Content Table End-->

                                <!-- Add  Modal Start --->
                                <div id="myModal" class="modal fade bs-example-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"></h5>
                                                <button onclick="myFormReset()" type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-12">

                                                        <form id="myForm">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="region_id">Region</label>
                                                                    <select name="region_id" id="region_id"
                                                                        class="form-control select2">
                                                                        <option value="">Select Region</option>
                                                                        @foreach ($regions as $region)
                                                                            <option value="{{ $region->id }}">
                                                                                {{ $region->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label> Country Office</label>
                                                                    <select name="country_id"
                                                                        class="form-control select2" id="country_id">
                                                                        <option value="">Select Country
                                                                        </option>
                                                                    </select>

                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="themefic_area_id">Themefic Area</label>
                                                                    <select name="themefic_area_id"
                                                                        class="form-control select2" id="themefic_area_id">
                                                                        <option value="">Select Themetic Area</option>
                                                                        @forelse ($themeficAreas as $area)
                                                                            <option value="{{ $area->id }}">
                                                                                {{ $area->code }}
                                                                                - {{ $area->name }}</option>
                                                                        @empty
                                                                            <option value="">No Themetic Area</option>
                                                                        @endforelse
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="file_id">Project Name</label>
                                                                    <input name="file_id" type="text"
                                                                        class="form-control" id="file_id"
                                                                        placeholder="Project name">
                                                                </div>
                                                                <div class="form-group col-md-12 text-center">
                                                                    <input type="hidden" name="action" id="action"
                                                                        value="addNew">
                                                                    <input type="hidden" name="flow_id" id="flow_id">
                                                                    <input type="submit" name="saveBtn" id="saveBtn"
                                                                        class="col-12 btn btn-info btn-md" value="Create">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal -->
                                <!-- Add  Modal End  -->

                                <!-- Delete Modal  Start -->
                                <div id="confirmModal" class="modal fade bs-example-modal-center" tabindex="-1"
                                    role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true"
                                    style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myCenterModalLabel">Confirmation</h5>
                                                <button onclick="myFormReset()" type="button" class="close"
                                                    data-dismiss="modal" aria-hidden="true">??
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--  <h4 align="center" style="margin:0;color: indianred;">Are you sure you want to remove this data?</h4> -->
                                                <h5 align="center" style="margin:0;color: indianred;">Are you sure you
                                                    want to remove <span id="deleteValueName"
                                                        class="text-secondary"></span> Rapid-Flow ?
                                                </h5>

                                                <p id="deleteValueError" class="text-primary text-center text-16"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form class="deleteById" id="deleteById">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="flowId" value=""
                                                        id="flowId" />
                                                    <button id="okBtn" type="submit" name="edit"
                                                        class="delete btn btn-danger">OK
                                                    </button>
                                                </form>
                                                <!-- <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button> -->
                                                <button onclick="myFormReset()" type="button"
                                                    class="btn btn-secondary waves-effect" aria-label="Close"
                                                    data-dismiss="modal">Cancel
                                                </button>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <!-- Delete Modal  End -->

                                <!-- View Modal Start --->
                                <div id="showModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"></h5>
                                                <button onclick="myFormReset()" type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="showTable" class="table ">
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal -->
                                <!-- View Modal Modal End  -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->


        </div>
    </div>
@endsection

@section('script')

    <!-- Datatable Script Start -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- Datatable Script End -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/custom-toastr.min.js') }}"></script>

    @include('rapidflow.flow_script');


    <script type="text/javascript">
        $(function(){
          $(document).on('change','#region_id',function(){
            var region_id =$(this).val();
            $.ajax({
                url:"{{route('get.regionwise.country')}}",
                type:"GET",
                data:{region_id:region_id},
                success:function(data){
                  var html = '<option value="">Select Country </option>';
                  $.each(data,function(key,v){
                    html +='<option value="'+v.id+'">'+v.name+'</option>';
                  });
                  $('#country_id').html(html);
                }
            });
          });
      });
      </script>

@endsection
