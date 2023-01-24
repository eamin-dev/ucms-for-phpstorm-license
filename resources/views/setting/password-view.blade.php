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
                        <h4 class="page-title">Settings </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">

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

                    <div class="row">
                        <!-- Basic example -->
                        @include('layouts.user-sidebar')
                        <!-- col-->
                        <div class="col-xl-1">

                        </div>

                        <!-- Horizontal form -->
                        <div class="col-xl-6">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Basic example</h3>
                                </div> --}}
                                <div class="card-body">
                                    <form method="POST" action="{{ route('user.password.update') }}" id="myform">
                                        @csrf


                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Current Password</label>
                                            <input type="password" class="form-control" name="current_password"  id="current_password" placeholder="Current Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">New Password</label>
                                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm Password">
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-info btn-block waves-effect waves-light">Update </button>
                                    </form>
                                </div>
                                <!-- card-body -->
                            </div>
                            <!-- card -->
                        </div>
                        <!-- col -->

                    </div>
                    <!-- End row -->

                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>



@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
      $('#myform').validate({
        rules: {
          current_password: {
            required: true,
          },
          new_password: {
            required: true,
          },
          confirm_new_password: {
            required: true,
            equalTo:'#new_password'
          }
        },
        messages: {
          current_password: {
            required: "Please enter Current password",
          },
          new_password: {
            required: "Please provide a new password",
            minlength: "Your password must be at least 6 characters long"
          },
          confirm_new_password: {
            required: "Please provide confirm password",
            equalTo: "Your password didnot match with new password"
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>

@endsection
