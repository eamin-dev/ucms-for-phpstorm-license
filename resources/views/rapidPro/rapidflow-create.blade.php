<form id="" method="POST" action="{{route('rapid.flow.store') }}">
    @csrf
    <div class="modal-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif 


        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <select name="country_office_id" class="form-control" id="country_office_id">
                        <option value="">Select Country office</option>
                        @forelse ($countryOffices as $office)
                        <option value="{{$office->id}}">{{ $office->name }}</option>
                        @empty
                        <option value="">No Country office</option>
                        @endforelse

                       
                        
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input name="date" type="date" class="form-control" id="field-1" placeholder="Enter Date">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">

                    <select name="themefic_area_id" class="form-control" id="themefic_area_id">
                        <option value="">Select Themetic Area</option>
                        @forelse ($areaNames as $area)
                        <option value="{{$area->id}}">{{ $area->name }}</option>
                        @empty
                        <option value="">No Themetic Area</option>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input name="file_id" type="text" class="form-control" id="field-1" placeholder="File Id">
                </div>
            </div>
        </div>
        
        

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Create</button>
    </div>
</form>
