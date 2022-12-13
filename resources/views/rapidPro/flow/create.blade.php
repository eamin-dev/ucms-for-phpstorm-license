<form action="{{ route('store.rapid.pro.flow') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="question_title" required  class="form-control" id="field-1" placeholder="Enter Question title">
                </div>
            </div>
            
            <div class="col-md-12">
                <label for="">Select Ans type</label>
                <select name="ans_type" id="ans_type" required class="form-control">
                    <option value="">Select Ans Type</option>
                    <option value="multiple_Choice">Multiple Choice </option>
                    {{-- <option value="check_Box">Check Box</option> --}}
                    <option value="InputBox">Input Box</option>

                </select>
            </div>
            

            <br>
            <br>
{{-- 
            <div class="form-group col-md-8 selectMultiple" style="display:none; margin-top: 15px;">
                <input type="checkbox" id="option1" name="option1" value="option1">
                <label for="option1"> Option 1 </label><br>
                <input type="checkbox" id="option2" name="option2" value="option2">
                <label for="option2"> Option 2</label><br>
                <input type="checkbox" id="option3" name="option3" value="option3">
                <label for="option3"> Option 3</label><br><br>
            </div> --}}

            {{-- <div class="form-group mt-1 mr-1" style="margin-top: 10px">
                <span class="btn btn-sm btn-success addQuestion"> <i class="fa fa-plus-circle"></i></span>
            </div> --}}
 
             <div class="form-group col-md-12 selectMultiple" style="display: none ;margin-top: 15px;">
                <input type="radio" id="html" name="multiple_answer" value="1">
                    <label for="html">Option 1</label><br>
                    <input type="radio" id="css" name="multiple_answer" value="2">
                    <label for="css">Option 2</label><br>
                    <input type="radio" id="javascript" name="multiple_answer" value="3">
                    <label for="javascript">Option 3</label>
            </div> 

            <div class="form-group col-md-12 selectType" style="display: none">
                <label for=""> Type Answer</label>
                <input type="text" class="form-control" name="input_answer" placeholder="Enter Answer here">
            </div>

        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Create</button>
    </div>
</form>
