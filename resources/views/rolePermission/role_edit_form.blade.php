<form id="roleEditForm">@csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input name="name" value="{{$role->name}}" type="text" class="form-control" id="field-1" placeholder="Role name">
                </div>
            </div>
        </div>
        <strong class="text-info">Permission: </strong><hr>
        <div class="row">
            @forelse($permissions as $permission)
                <div class="form-group col-md-3 mb-3">
                    <div class="custom-control custom-checkbox">
                        <input name="permissions[]" value="{{$permission->id}}" {{$role->hasPermissionTo($permission->name) ? 'checked' : ''}} type="checkbox" class="custom-control-input" id="checkbox{{$permission->id}}">
                        <label class="custom-control-label" for="checkbox{{$permission->id}}">{{strtoupper($permission->name)}}</label>
                    </div>
                </div>
                @empty
            @endforelse
        </div>

    </div>
    <div class="modal-footer">
        <input name="role_id" value="{{\App\Utilities\AppHelper::encrypt($role->id)}}" type="hidden">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
    </div>
</form>
