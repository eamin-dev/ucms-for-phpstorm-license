@extends('layouts.app')
@section('title', 'RapidPro Flow ')
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
                        <h4 class="page-title">RapidPro Flow Creation</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">
                                <button type="button" class="btn btn-sm btn-primary" ><i class="fas fa-eye"></i>Export json</button> 

                                    {{-- <a href="" class="btn btn-sm btn-primary"><i class="fas fa-user-plus"></i>Export json</a> --}}
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
                <h3 class="card-title text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                     and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h3>-
                        </div>
                        <div class="card-body">
                            <div class="row">

                                
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="">
                                <div class="add_item">
                                <div class="form-row">
                                   
                                <div class="form-group col-md-10">
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Question title">
                                </div>
                                
                                <div class="btn-group mt-1 mr-1">
                                    <button type="button" class="btn btn-white dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       ...
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" style="">
                                        <li><a href="#" class="dropdown-item">Multiple Choice</a></li>
                                        <li><a href="#" class="dropdown-item">Check Box</a></li>
                                        <li><a href="#" class="dropdown-item">Input Box</a></li>
                        
                                    </ul>
                                </div>
                               {{-- end add item --}}
                                <div class="form-group col-md-1" >
                                        <span class="btn btn-success addQuestion"> <i class="fa fa-plus-circle"></i></span>
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="checkbox" id="option1" name="option1" value="option1">
                                    <label for="option1"> Option 1 </label><br>
                                    <input type="checkbox" id="option2" name="option2" value="option2">
                                    <label for="option2"> Option 2</label><br>
                                    <input type="checkbox" id="option3" name="option3" value="option3">
                                    <label for="option3"> Option 3</label><br><br>
    
                                </div>

                            </div>

                               
                             </div>     <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>


                             </form>
                                {{-- add more question --}}
                                <div class="form-group col-lg-12" style="visibility: hidden">
                                    <div class="whole_extra_item_add" id="whole_extra_item_add">
                                        <div class="delete_whole_extra_item" id="delete_whole_extra_item">
                                    <div class="form-row">
                                        <div class="form-group col-md-10" >

                                            <input type="email" name="question_title[]" class="form-control" id="exampleInputEmail2" placeholder="Question title">
                                        </div>

                                    <div class="form-group col-md-1">
                                            <div class="form-row">
                                              <span class="btn btn-success addQuestion"> <i class="fa fa-plus-circle"></i> </span>
                                              <span class="btn btn-danger removeQuestion"> <i class="fa fa-minus-circle"></i> </span>
                                            </div>
                                    </div>

                                     <div class="form-group col-md-6">
                                            <input type="checkbox" id="option1" name="option1" value="option1">
                                            <label for="option1"> Option 1 </label><br>
                                            <input type="checkbox" id="option2" name="option2" value="option2">
                                            <label for="option2"> Option 2</label><br>
                                            <input type="checkbox" id="option3" name="option3" value="option3">
                                            <label for="option3"> Option 3</label><br><br>
            
                                    </div>
    
                                       
                                        </div>
                                    </div>
                                    </div>
                                    
                                </div>

                                {{-- END question --}}
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

    <!-- script tag for addevent items -->
    <script type="text/javascript">
        $(document).ready(function(){
           var counter =0;
           $(document).on("click",".addQuestion",function(){
              var whole_extra_item_add =$("#whole_extra_item_add").html();
              $(this).closest(".add_item").append(whole_extra_item_add);
              counter ++;
           });
             $(document).on("click",".removeQuestion",function(){
                //alert(delete_whole_extra_item);
               $(this).closest(".delete_whole_extra_item").remove();
               
               counter -= 1;
           });
        });
        </script>
@endsection
