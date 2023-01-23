@extends('layouts.app')
@section('title', 'Rapid Pro ')
@section('content')
    <div class="content roleData">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <a href="{{ route('rapid.flow.view') }}"> ←Back</a>
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ $flowData->file_id }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">
                                    <h3 class="card-title text-secondary">
                                        <a href="{{ route('rapidpro.question.json', $flowData->id) }}"
                                            class="btn btn-info btn-sm float-left">Export to Json</a>
                                    </h3>
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
                            <h5 class="">Write Descrition</h5>
                                <p contenteditable="true">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                        </div>
                        <div class="card-body">

                            {{-- <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr style="background-color: #a4bad0">
                                            <th class="text-center">#</th>
                                            <th class="text-center">Question Title</th>
                                            <th class="text-center">Ans Type</th>
                                            <th class="text-center">Quick Answer</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($flowData->questions as $key=>$data)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-center">{{ $data->question_title }}</td>
                                                <td class="text-center"><span
                                                        class="bg bg-info badge-pill">{{ $data->ans_type }}</span> </td>
                                                <td class="text-center">
                                                    @foreach ($data->answers as $answer)
                                                        <span class="bg bg-success badge-pill">{{ $answer->answer }}</span>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('flow.question.edit', $data->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('flow.question.delete', $data->id) }}" id="delete"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                                </td>
                                            <tr>
                                            @empty
                                            <tr class="text-center">
                                                <td colspan="5"><span>No data found</span></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div> --}}

                            @forelse ($flowData->questions as $key=>$data  )

                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <strong> <p>{{ $key + 1 }}. Question {{ $key +1  }}</p></strong>

                                    </div>
                                  <div class="px-3 mb-3">
                                        <div class="bg-light rounded px-3 d-flex align-items-center gap-2 mb-2">
                                            <p class="flex-grow-1 py-2 m-0">{{ $data->question_title }}</p>
                                            <div class="btn-group dropleft flex-shrink-0">
                                                <button type="button" class="btn btn-light float-left btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu" x-placement="right">
                                                    <li>
                                                        <a  type="button" title="Edit " style="margin-bottom: 5px" href="{{ route('flow.question.edit', $data->id) }}" class="edit dropdown-item text-warning "><i class="fa fa-pen"></i>Edit </a>
                                                    </li>
                                                    <li>
                                                        <a  type="button" id="delete" title="Delete"  style="margin-bottom: 5px" href="{{ route('flow.question.delete', $data->id) }}" class="delete dropdown-item text-danger"><i class="fa fa-trash"></i>Delete  </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bg-light rounded px-3">
                                            @foreach ($data->answers as $ans)
                                                <p class="answer-option m-0 py-1">{{ $ans->answer }} </p>
                                            @endforeach

                                            <style>
                                                .answer-option + .answer-option {
                                                    border-top: 1px solid #dddddd;
                                                }
                                            </style>
                                        </div>
                                  </div>
                                </div>
                            </div>

                            @empty
                            <td colspan="5"><span>No data found</span></td>
                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>

             <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal"
                                            data-target=".bs-example-modal-lg"><i class="fas fa-plus"></i> Add Question
            </button>

    <!-- MODAL start-->

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- @include('rapidflow.question.question-create') --}}
                {{-- start modal --}}

                <form action="{{ route('rapidpro.question.store') }}" method="POST" id="myform">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="flow_id" id="flow_id" value="{{ $flowData->id }}">
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="question_title">Question Title</label>
                                    <input type="text" name="question_title" id="question_title" class="form-control"
                                        placeholder="Enter Question title">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="ans_type">Select Answer type</label>
                                <select name="ans_type" id="ans_type" class="form-control">
                                    <option value="">Select Answer Type</option>
                                    <option value="multiple_Choice">Multiple Choice</option>
                                    <option value="Input_answer">Input Box</option>
                                </select>
                            </div>

                            <br>
                            <br>

                            <div class="col-md-12">
                                <div class="selectMultiple" style="display: none">
                                    <div class="add_item">
                                        <div class="row">
                                            <div class="form-group col-md-11">
                                                <label for="multiple_ans">Multiple Answer</label>
                                                <input id="answer" type="text" name="answer[]" class="form-control"
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

                            {{--            <div class="form-group col-md-12 selectType" style="display: none"> --}}
                            {{--                <label for="inp_ans">Input Answer</label> --}}
                            {{--                <input id="inp_ans" type="text" class="form-control" name="input_answer" placeholder="Enter Answer here"> --}}
                            {{--            </div> --}}

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect float-left"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Create</button>
                    </div>
                </form>

                {{-- add more multiple question --}}
                <div class="col-lg-12" style="visibility: hidden">
                    <div class="whole_extra_item_add" id="whole_extra_item_add">
                        <div class="delete_whole_extra_item" id="delete_whole_extra_item">
                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label for="m_ans">Multiple Answer</label>
                                    <input id="answer" type="text" name="answer[]" class="form-control"
                                        placeholder="Enter Multiple Answer">
                                </div>
                                <div class="form-group col-md-1" style="margin-top: 30px">
                                    <div class="form-row">
                                        <span class="btn btn-danger removeQuestion"> <i class="fa fa-minus-circle"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- end multiple question --}}


                {{-- end modal --}}
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myform').validate({
                rules: {
                    question_title: {
                        required: true,
                    },
                    ans_type: {
                        required: true,
                    },
                    answer: {
                        required: $("$ans_type").val(multiple_Choice)
                    }
                },
                messages: {
                    question_title: {
                        required: "Please enter Question Title",
                    },
                    ans_type: {
                        required: "Please provide Ans Type",
                    },
                    answer: {
                        required: "Please provide Multiple Question Ans",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

    <script>
        $(document).on('change', '#ans_type', function() {

            var ans_type = $(this).val();

            if (ans_type == 'Input_answer') {
                $('.selectType').show();
            } else {
                $('.selectType').hide();
            }

            if (ans_type == 'multiple_Choice') {
                $('.selectMultiple').show();
            } else {
                $('.selectMultiple').hide();
            }


        });
    </script>

    <!-- script tag for add event items -->
    <script type="text/javascript">
        $(document).ready(function() {
            let counter = 0;
            $(document).on("click", ".addQuestion", function() {
                //alert('ok');
                const whole_extra_item_add = $("#whole_extra_item_add").html();
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




    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "delete Flow Question!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Confirm it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                            'approved!',
                            'Question has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endsection
