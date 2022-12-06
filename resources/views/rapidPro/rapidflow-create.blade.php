<form id="roleAddForm">@csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <select name="country_office" class="form-control" id="">
                        <option value="">Country office</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input name="date" type="datetime-local" class="form-control" id="field-1" placeholder="Date & Time">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">

                    <select name="country_office" class="form-control" id="">
                        <option value="">Themetic Area</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input name="name" type="text" class="form-control" id="field-1" placeholder="File Id">
                </div>
            </div>
        </div>
        
        

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Create</button>
    </div>
</form>
