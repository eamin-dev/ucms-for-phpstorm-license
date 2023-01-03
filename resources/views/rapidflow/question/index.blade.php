@extends('layouts.app')
@section('title', 'Rapid Pro ')
@section('content')
    <div class="content roleData">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ $flowData->file_id }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target=".bs-example-modal-lg"><i class="fas fa-plus"></i> Add Question
                                    </button>
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
                            <h3 class="card-title text-secondary">
                                <a href="{{ route('rapidpro.question.json', $flowData->id) }}"
                                   class="btn btn-success btn-sm float-left">Export Json</a>
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr style="background-color: #a4bad0">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Question Title</th>
                                        <th class="text-center">Quick Answer</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($flowData->questions as $key=>$data)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $data->question_title }}</td>
                                            <td class="text-center">
                                                @foreach($data->answers as $answer)
                                                    <span
                                                        class="bg bg-success badge-pill">{{ $answer->answer }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <button type="button" title="Edit " data-file-id="{{$data->id}}" class="edit btn btn-primary btn-sm"><i class="fa fa-pen"></i> </button>
                                                <form action="{{ route("rapidpro.question.delete", $data->id) }}" method="post" class="deleteById" id="deleteById">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="flowId" value="" id="flowId"/>
                                                    <button type="submit" title="Delete" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        <tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="3"><span>No data found</span></td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
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
                @include('rapidflow.question.question-create')
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).on('change', '#ans_type', function () {

            const ans_type = $(this).val();

            if (ans_type === 'Input_answer') {
                $('.selectMultiple').hide();
            }else if (ans_type === 'multiple_Choice') {
                $('.selectMultiple').show();
            } else {
                $('.selectMultiple').hide();
            }

        });
    </script>

    <!-- script tag for add event items -->
    <script type="text/javascript">
        $(document).ready(function () {
            let counter = 0;
            $(document).on("click", ".addQuestion", function () {
                //alert('ok');
                const whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeQuestion", function () {
                //alert(delete_whole_extra_item);
                $(this).closest(".delete_whole_extra_item").remove();

                counter -= 1;
            });
        });
    </script>


<script type="text/javascript">
    $(function(){
      $(document).on('click','#delete',function(e){
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
