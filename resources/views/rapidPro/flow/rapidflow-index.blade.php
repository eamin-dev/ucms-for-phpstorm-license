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
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fas fa-plus"></i>Add Question</button>
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

    {{-- <div  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"> --}}
        
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Add Question</h5>
                    <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('rapidPro.flow.create')
            </div>
        </div>
    </div>


@endsection

@section('script')
    {{-- @include('rolePermission.script') --}}

    <script>

        $(document).on('change','#ans_Type',function(){

            var ans_Type =$(this).val();

            if(ans_Type =='check_Box'){

                $('.selectCheck').show();
            }else{
                $('.selectCheck').hide();
            }

            if(ans_Type =='InputBox'){
                $('.selectType').show();
            }else{
                $('.selectType').hide();
            }

            if(ans_Type =='multiple_Choice'){
                $('.selectMultiple').show();
            }else{
                $('.selectMultiple').hide();
            }
            
        });

    </script>
 
@endsection
