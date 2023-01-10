<div class="col-xl-3">
    <div class="card">
        {{-- <div class="card-header">
                                    <h3 class="card-title">Basic example</h3>
                                </div> --}}
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <a class="btn btn-primary btn-sm btn-block" href="{{ route('user.profile.view') }}"
                    {{ request()->routeIs('user.profile.view') ? 'active' : '' }}>Profile Settings</a>
                <a class="btn btn-primary btn-sm btn-block" href="{{ route('user.change.password') }}"
                    {{ request()->routeIs('user.profile.view') ? 'active' : '' }}>Security </a>
                {{-- <a  class="btn btn-primary btn-sm btn-block" href="" {{ request()->routeIs('user.profile.view')?'active':'' }}>Security</a> --}}


            </ul>
        </div>
        <!-- card-body -->
    </div>
    <!-- card -->
</div>
