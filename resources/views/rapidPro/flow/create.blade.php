<form id="">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input name="text"  class="form-control" id="field-1" placeholder="Enter Question title">
                </div>
            </div>
            
            <div class="col-md-12">
                <label for="">Select Ans type</label>
                <select name="ans_type" id="ans_Type" class="form-control">
                    <option value="">Select Ans Type</option>
                    <option value="multiple_Choice">Multiple Choice </option>
                    <option value="check_Box">Check Box</option>
                    <option value="InputBox">Input Box</option>

                </select>
            </div>
            

            <br>
            <br>

            <div class="form-group col-md-12 selectCheck" style="display: none">
                <input type="checkbox" id="option1" name="option1" value="option1">
                <label for="option1"> Option 1 </label><br>
                <input type="checkbox" id="option2" name="option2" value="option2">
                <label for="option2"> Option 2</label><br>
                <input type="checkbox" id="option3" name="option3" value="option3">
                <label for="option3"> Option 3</label><br><br>
            </div>

            <div class="form-group col-md-12 selectType" style="display: none">
                <label for=""> Type Answer</label>
                <input type="text" class="form-control" placeholder="Enter Answer here">
            </div>

            <div class="form-group col-md-12 selectMultiple" style="display: none">
                <input type="radio" id="html" name="fav_language" value="HTML">
                    <label for="html">Option 1</label><br>
                    <input type="radio" id="css" name="fav_language" value="CSS">
                    <label for="css">Option 2</label><br>
                    <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                    <label for="javascript">Option 3</label>

            </div>



        </div>
        
        

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Create</button>
    </div>
</form>
