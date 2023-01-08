<form action="{{ route('rapidpro.question.store') }}" id="myform" method="POST">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="flow_id" id="flow_id" value="{{ $flowData->id }}">
        {{-- error show --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- end error show --}}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="question_title">Question Title</label>
                    <input type="text" name="question_title" id="question_title" class="form-control"
                                                               placeholder="Enter Question title">
                </div>
            </div>

            <div class="col-md-12">
                <label for="ans_type">Select Answer type</label>
                <select name="ans_type" id="ans_type" class="form-control">
                    <option value="">Select Answer Type</option>
                    <option value="multiple_Choice">Multiple Choice</option>
                    <option value="Input_answer">Input Box</option>
                </select>
            </div>

            <br>
            <br>

            <div class="col-md-12">
                <div class="selectMultiple" style="display: none">
                    <div class="add_item">
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="multiple_ans">Multiple Answer</label>
                                <input id="answer" type="text"  name="answer[]" class="form-control"
                                       placeholder="Enter Multiple Answer">
                            </div>
                            <div class="form-group col-md-1" style="margin-top: 30px">
                                <span class="btn btn-success addQuestion"><i class="fa fa-plus-circle"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end add-item --}}

{{--            <div class="form-group col-md-12 selectType" style="display: none">--}}
{{--                <label for="inp_ans">Input Answer</label>--}}
{{--                <input id="inp_ans" type="text" class="form-control" name="input_answer" placeholder="Enter Answer here">--}}
{{--            </div>--}}

        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Create</button>
    </div>
</form>

{{-- add more multiple question --}}
<div class="col-lg-12" style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item" id="delete_whole_extra_item">
            <div class="form-row">
                <div class="form-group col-md-11">
                    <label for="m_ans">Multiple Answer</label>
                    <input id="answer" type="text" name="answer[]" class="form-control" placeholder="Enter Multiple Answer">
                </div>
                <div class="form-group col-md-1" style="margin-top: 30px">
                    <div class="form-row">
                        <span class="btn btn-danger removeQuestion"> <i class="fa fa-minus-circle"></i> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- end multiple question --}}
