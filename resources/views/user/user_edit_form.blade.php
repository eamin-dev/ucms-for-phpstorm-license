<form id="userEditForm">@csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input name="name" value="{{$user->name}}" type="text" class="form-control" id="field-1" placeholder="User's full name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input disabled type="email" name="email" value="{{$user->email}}" class="form-control" id="field-3" placeholder="Email address">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input id="password" type="text" name="password" class="form-control" placeholder="Change Password">
{{--                    <span class="input-group-append">--}}
{{--                        <button type="button" class="btn waves-effect waves-light btn-primary " onclick="generatePassInEdit()">Generate Password</button>--}}
{{--                    </span>--}}
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <select name="platform" class="form-control">
                        <option value="">Select Platform</option>
                        @foreach(\App\Models\Setting::platform() as $platform)
                        <option value="{{$platform['id']}}" @if($user->platform == $platform['id']) selected @endif>{{$platform['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <select name="role_id" class="form-control">
                        <option value="">Select Role</option>
                        @forelse($roles as $role)
                            <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif>{{$role->name}}</option>
                        @empty
                            <option value="">No Role Found</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input name="user_id" value="{{\App\Utilities\AppHelper::encrypt($user->id)}}" type="hidden">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
    </div>
</form>

