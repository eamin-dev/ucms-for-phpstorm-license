@extends('layouts.app')
@section('title', 'User list')
@section('css')
    <style>
        /* profile image */

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Settings</h4>
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
                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="fas fa-user-edit"></i> Profile Settings</a>
                                    <a class="nav-link mb-2" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false"><i class="fas fa-key"></i> Security</a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="tab-content pt-md-0">
                                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                                        <div class="row justify-content-center">
                                            <form action="#" method="post" role="form" class="php-email-form" enctype="multipart/form-data"> @csrf
                                                <div class="container">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="photo" />
                                                            <label for="imageUpload"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview" style="background-image: url('https://t4.ftcdn.net/jpg/02/15/84/43/360_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg');">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center avatar-btn" id='avatar-btn' style="display:none">
                                                    <button type="submit">Change Profile Pic</button>
                                                </div>
                                            </form>
                                            <!-- end col -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">
                                    </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div> <!-- end col -->
            </div>


            </div>
        <!-- end container-fluid -->
    </div>



@endsection

@section('script')
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                            $('#imagePreview').hide();
                            $('#imagePreview').fadeIn(650);
                        }
                        $("#avatar-btn").css('display','block');
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                //Image upload (Profile image- user)
                $("#imageUpload").change(function() {
                    readURL(this);
                });
            </script>
@endsection
