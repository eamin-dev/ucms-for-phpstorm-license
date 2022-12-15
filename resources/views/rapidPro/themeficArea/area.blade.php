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
                        <h4 class="page-title">Themefic Area </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                             
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
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">View Themefic Area</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Actions</th>
                                                </thead>

                                                <tbody>
                                                    @foreach ($officeNames as $key=>$office)
                                                    <tr>
                                                        <td class="text-center">{{ $key +1  }} </td>
                                                        <td class="text-center"> <span class="badge badge-primary">{{ $office->name }}</span> </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('themefic.area.edit',$office->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('themefic.area.delete',$office->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                            
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <!-- card-body -->
                            </div>
                            <!-- card -->
                        </div>
                        <!-- col-->

                        <!-- Horizontal form -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Add Themefic Area</h3>
                                </div>  

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                  @endif

                                <div class="card-body">
                                    <form method="POST" action="{{ route('themefic.area.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Themefic Area</label>
                                            <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Themefic Area Name">
                                            
                                        </div>
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                        </div>

                                    
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
    

    <script type="text/javascript">
        $(function(){
          $(document).on('click','#delete',function(e){
          e.preventDefault();
        var link = $(this).attr("href");
                Swal.fire({
            title: 'Are you sure?',
            text: "delete Themefic Area!",
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
                'Themefic Area has been deleted.',
                'success'
              )
            }
          })
    });
    });
    </script>
@endsection
