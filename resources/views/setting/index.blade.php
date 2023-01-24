@extends('layouts.app')
@section('title', 'Profile Settings')
@section('css')
<style>

.center-div {
  position: absolute;
  left: 32%;
  top: 68%;
}
</style>
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
                                    <form method="POST" action="{{ route('user.profile.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <h4 class="text-lg-center">Profile Photo</h4>
                                        <div  class="form-group position-relative d-inline-block mb-4 center-div">
                                            <img src="{{ !empty($authData->image) ? url($authData->image) : url('upload/user_image/no-image.png') }}"
                                                id="showImage"
                                                style="width:200px; height : 200px; object-fit : cover; object-position:center"
                                                class="rounded-circle border" alt="img">

                                            <label for="imgUpload" class="btn btn-light rounded-circle"
                                                style="position: absolute; top: 70%; right:0; width : 60px; height :60px; display:flex;
                                                align-items:center; justify-content:center">
                                                <i class=" fas fa-file-image"></i>
                                                <input id="imgUpload" type="file" name="image"
                                                    class="d-none form-control" placeholder="select Image">
                                            </label>

                                        </div>

                                        <div class="form-group">
                                            {{-- <label for="exampleInputPassword1">Full Name</label> --}}
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $authData->name }}" id="" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            {{-- <label for="exampleInputPassword1">Email</label> --}}
                                            <input type="text" class="form-control" name="email"
                                                value="{{ $authData->email }}" id="" placeholder="Ener Email">
                                        </div>
                                        <div class="form-group">
                                            {{-- <label for="exampleInputPassword1">Role</label> --}}
                                            <select name="role" id="" disabled class="form-control">
                                                @if (!empty($authData->getRoleNames()))
                                                    @foreach ($authData->getRoleNames() as $role)
                                                    @endforeach
                                                @endif
                                                <option value="">{{ $role }}</option>
                                            </select>
                                        </div>
                                        <br>
                                        <button type="submit"
                                            class="btn btn-info btn-block waves-effect waves-light">Update </button>
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

    <script>
           $(document).ready(function(){
            $('#imgUpload').change(function(e){
                var reader =new FileReader();
                reader.onload =function(e){
                $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            });
    </script>

@endsection
