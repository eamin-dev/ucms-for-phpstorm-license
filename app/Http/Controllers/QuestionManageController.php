<?php

namespace App\Http\Controllers;

use App\Models\FlowQuestion;
use App\Models\FlowQuestionAnswer;
use Illuminate\Http\Request;

class QuestionManageController extends Controller
{
    public function editQuestion(Request $request){

        $editQuestion = FlowQuestion::where('id', $request->id)->with('answers')->get();

        return $editQuestion;

    }


    public function delete(Request $request){

        $question = FlowQuestion::findorFail($request->id);
        $question->delete();

        $answers = FlowQuestionAnswer::where('flow_question_id', $request->id)->get();

        //return [$question,$answers];

        if(!empty($answers)){
            
            $answers->each->delete();
        }
        $notification = array(
            'message' => 'Question  Deleted',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notification);

    }
}
