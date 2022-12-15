<form action="{{ route('store.rapid.pro.flow') }}"  method="POST" enctype="multipart/form-data">
    @csrf
        
    <div class="modal-body">

        {{-- error show --}}
        @if($errors->any())
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
                    <input type="text" name="question_title" id="question_title"   class="form-control"  placeholder="Enter Question title">
                </div>
            </div>

        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Create</button>
    </div>
</form>
