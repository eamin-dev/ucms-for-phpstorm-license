<div class="btn-group mt-1 mr-1">
    <button type="button" class="btn btn-light btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
    </button>
    <ul class="dropdown-menu">
        <li>
            <a  type="button" title="Edit " data-admin-id="{{$id}}" style="margin-bottom: 5px" class="edit dropdown-item text-warning "><i class="fa fa-pen"></i>Edit </a>
        </li>
        <li>
            <a  type="button" title="Delete" data-admin-id="{{$id}}" style="margin-bottom: 5px" data-area-name="{{ $name }}" class="delete dropdown-item text-danger"><i class="fa fa-trash"></i>Delete  </a>
        </li>
    </ul>
</div>
    


