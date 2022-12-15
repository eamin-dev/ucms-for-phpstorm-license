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
                        <div class="card-body">
                            
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                      <tr style="background-color: #6aa8e7">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Question Title </th>
                                        <th class="text-center">Answer Type</th>
                                        <th class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key=>$data)
                                        <tr>
                                        <th class="text-center">{{ $key+1 }}</th>
                                        <th class="text-center">{{ $data->question_title }}</th>   
                                        <th class="text-center">{{ $data->ans_type }}</th>   
                                        <th class="text-center">
                                            <a href="{{route('store.rapid.pro.json',$data->id) }}" class="btn btn-primary btn-sm">Export Json </a>
                                        </th>   
                                        
                                      <tr>
                                        @endforeach
                                      </tr>
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

        $(document).on('change','#ans_type',function(){

            var ans_type =$(this).val();

            if(ans_type =='check_Box'){

                $('.selectCheck').show();
            }else{
                $('.selectCheck').hide();
            }

            if(ans_type =='InputBox'){
                $('.selectType').show();
            }else{
                $('.selectType').hide();
            }

            if(ans_type =='multiple_Choice'){
                $('.selectMultiple').show();
            }else{
                $('.selectMultiple').hide();
            }
            
        });

    </script>

    <script>
        !function(t){"use strict";var e=function()
{this.$rapidflowForm=t("#rapidflowForm"),this.$signupForm=t("#signupForm")};
e.prototype.init=function(){t.validator.setDefaults({submitHandler:function(){alert("submitted!")}}),
this.$rapidflowForm.validate(),this.$signupForm.validate({rules:{question_title:"required",ans_type:"required",
username:{required:!0,minlength:2},password:{required:!0,minlength:5},confirm_password:{required:!0,minlength:5,equalTo:"#password"},email:{required:!0,email:!0},topic:{required:"#newsletter:checked",minlength:2},agree:"required"},
messages:{firstname:"Please enter your Question Title",lastname:"Please enter  Ans Type",username:{required:"Please enter a username",minlength:"Your username must consist of at least 2 characters"},
password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long"},confirm_password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long",equalTo:"Please enter the same password as above"},email:"Please enter a valid email address",agree:"Please accept our policy"}}),t("#username").focus(function(){var e=t("#firstname").val(),a=t("#lastname").val();e&&a&&!this.value&&(this.value=e+"."+a)});var e=t("#newsletter"),a=e.is(":checked"),r=t("#newsletter_topics")[a?"removeClass":"addClass"]("gray"),s=r.find("input").attr("disabled",!a);e.click(function(){r[this.checked?"removeClass":"addClass"]("gray"),s.attr("disabled",!this.checked)})},t.FormValidator=new e,t.FormValidator.Constructor=e}(window.jQuery),

function(e){"use strict";window.jQuery.FormValidator.init()}();
    </script>
 
@endsection
