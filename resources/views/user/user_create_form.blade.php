<form id="userAddForm">@csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input name="name" type="text" class="form-control" id="field-1" placeholder="Full name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="field-3" placeholder="Email address">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <select name="region_id" id="region_id" class="form-control">
                        <option value="">Select Region</option>
                        @forelse($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                        @empty
                            <option value="">No Country office Found</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <select name="country_id" id="country_id" class="form-control select2">
                        <option value="">Select Country</option>

                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <select name="role" class="form-control">
                        <option value="">Select Platform</option>
                        @forelse($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @empty
                            <option value="">No Role Found</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input id="password" type="text" name="password" class="form-control" placeholder="Password">
                    <span class="input-group-append">
                                    <button type="button" class="btn waves-effect waves-light btn-primary " onclick="generatePass()">Generate Password</button>
                    </span>
                </div>
            </div>
        </div><br>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
    </div>
</form>

