<a href="{{ route('rapidpro.question.json', $id) }}" class="btn btn-primary btn-sm">Export Json</a>

<div class="btn-group mt-1 mr-1">
    <button type="button" class="btn btn-light btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
    </button>
    <ul class="dropdown-menu">
        <li>
            <a  onclick="newPage(this.id)" id="{{$id}}" style="margin-bottom: 5px"  type="button"
            title="Question Create" data-file-id="{{$id}}" class="showDetails dropdown-item text-info"><i class="fa fa-plus"></i> View</a>
        </li>
        <li>
            <a  type="button" title="Edit " data-file-id="{{$id}}" style="margin-bottom: 5px" class="edit dropdown-item text-warning "><i class="fa fa-pen"></i> Edit</a>
        </li>
        <li>
            <a  type="button" title="Delete" data-file-id="{{$id}}" style="margin-bottom: 5px" data-area-name="{{$file_id}}" class="delete dropdown-item text-danger"><i class="fa fa-trash"></i> Delete</a>
        </li>
    </ul>
</div>




{{--
<button onclick="newPage(this.id)" id="{{$id}}" type="button" title="Question Create" data-file-id="{{$id}}" class="showDetails btn btn-secondary btn-sm"><i class="fa fa-plus"></i> </button>
<button type="button" title="Edit " data-file-id="{{$id}}" class="edit btn btn-primary btn-sm"><i class="fa fa-pen"></i> </button>
<button type="button" title="Delete" data-file-id="{{$id}}" data-area-name="{{$file_id}}" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button> --}}

