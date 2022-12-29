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

                        <!-- Horizontal form -->
                        <div class="col-xl-9">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Basic example</h3>
                                </div> --}}
                                <div class="card-body">
                                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
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
                                        
                                        <div class="form-group">
                                            <img src="{{ !empty($authData->image)?url($authData->image):url('upload/user_image/no-image.png')}}" id="showImage"  width="200" height="200" class="img-rounded" alt="">
                                        </div>
                                     
                                        <div class="form-group">
                                              <input type="file" name="image" class="form-control"  placeholder="select Image">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Full Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $authData->name }}" id="" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="text" class="form-control" name="email" value="{{$authData->email }}" id="" placeholder="Ener Email">
                                        </div>
                                       
                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Update </button>
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


<script>
    $(document).ready(function(){
            $('#image').change(function(e){
                var reader =new FileReader();
                reader.onload =function(e){
                $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            });
</script>
    
@endsection
