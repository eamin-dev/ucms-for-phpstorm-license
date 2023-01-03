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
                        <h4 class="page-title"></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">
                                    {{-- <h4 class="text-left">Edit Question</h4> --}}
                                </li>
                            </ol>
                        </div>
                        <div class="clearfix">
                            <h4 class="text-left">Edit Question</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-border card-primary">
                        <div class="card-header border-primary bg-transparent pb-0">
                            <h3 class="card-title text-secondary">
                                <input type="hidden" name="flow_id" id="flow_id" value="" id="">

                            </h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('flow.question.update', $editQuestion->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">

                                    {{-- error show --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    {{-- end error show --}}
                                    <div class="form-group col-md-12">
                                        <input type="text" name="question_title" value= "{{ $editQuestion->question_title }} "required 
                                            class="form-control" placeholder="Enter Question title">

                                            {{-- <input type="text" name="question_title" value="{{ $editQuestion->question_title }}" required class="form-control" placeholder="Enter Queation Title"> --}}

                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="">Select Ans type</label>
                                        <select name="ans_Type" id="ans_Type" class="form-control">
                                            <option value="">Select Ans Type</option>
                                            <option value="multiple_Choice"
                                                {{ @$editQuestion->ans_Type == 'multiple_Choice' ? 'selected' : '' }}>
                                                Multiple
                                                Choice </option>
                                            <option value="Input_answer"
                                                {{ @$editQuestion->ans_Type == 'Input_answer' ? 'selected' : '' }}>Input Box
                                            </option>

                                        </select>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="col-md-12">
                                        <div class="selectMultiple" style="display: none">
                                            <div class="add_item">
                                                <div class="row">
                                                    <div class="form-group col-md-11">
                                                        <label for="">Multiple Answer</label>
                                                        <input type="text" name="answer[]" class="form-control"
                                                            placeholder="Enter Multiple Answer">
                                                    </div>
                                                    <div class="form-group col-md-1" style="margin-top: 30px">
                                                        <span class="btn btn-success addQuestion"><i
                                                                class="fa fa-plus-circle"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end add-item --}}

                                    <div class="form-group col-md-12 selectType" style="display: none">
                                        <label for="">Input Answer</label>
                                        <input type="text" class="form-control" name="input_answer"
                                            placeholder="Enter Answer here">
                                    </div>


                                </div>
                                <div class="modal-footer">
                                 
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                </div>
                            </form>

                            {{-- add more multiple question --}}
                            <div class="col-lg-12" style="visibility: hidden">
                                <div class="whole_extra_item_add" id="whole_extra_item_add">
                                    <div class="delete_whole_extra_item" id="delete_whole_extra_item">
                                        <div class="form-row">
                                            <div class="form-group col-md-11">
                                                <label for="">Multiple Answer</label>
                                                <input type="text" name="answer[]" class="form-control"
                                                    placeholder="Enter Multiple Answer">
                                            </div>
                                            <div class="form-group col-md-1" style="margin-top: 30px">
                                                <div class="form-row">
                                                    {{-- <span class="btn btn-success addQuestion"> <i class="fa fa-plus-circle"></i> </span> --}}
                                                    <span class="btn btn-danger removeQuestion"> <i
                                                            class="fa fa-minus-circle"></i> </span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- end multiple question --}}


                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>


    <!-- MODAL start-->

    {{-- <div  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"> --}}

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Add Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- @include('rapidflow.question.question-create') --}}
            </div>
        </div>
    </div>


@endsection

@section('script')
    {{-- @include('rolePermission.script') --}}

    <script>
        $(document).on('change', '#ans_Type', function() {

            var ans_Type = $(this).val();

            if (ans_Type == 'Input_answer') {
                $('.selectType').show();
            } else {
                $('.selectType').hide();
            }

            if (ans_Type == 'multiple_Choice') {
                $('.selectMultiple').show();
            } else {
                $('.selectMultiple').hide();
            }

        });
    </script>

    <!-- script tag for addevent items -->
    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addQuestion", function() {
                //alert('ok');
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeQuestion", function() {
                //alert(delete_whole_extra_item);
                $(this).closest(".delete_whole_extra_item").remove();

                counter -= 1;
            });
        });
    </script>



@endsection
