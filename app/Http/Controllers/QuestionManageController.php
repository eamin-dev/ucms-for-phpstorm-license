<?php

namespace App\Http\Controllers;

use App\Models\FlowQuestion;
use App\Models\FlowQuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionManageController extends Controller
{
    public function editQuestion(Request $request)
    {

        $editQuestion = FlowQuestion::with('answers')->findorFail($request->id);

        return view('rapidflow.question.edit', compact('editQuestion'));

    }

    public function delete(Request $request)
    {

        $question = FlowQuestion::findorFail($request->id);
        $question->delete();
        $answers = FlowQuestionAnswer::where('flow_question_id', $request->id)->get();

        if (!empty($answers)) {

            $answers->each->delete();
        }
        $notification = array(
            'message' => 'Question  Deleted',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notification);

    }

    public function updateQuestion(Request $request)
    {

         //return $request;
        DB::beginTransaction();
        try {

            $question = FlowQuestion::findorFail($request->question_id);
           // $question->flow_id = $request->flow_id;
            $question->question_title = $request->question_title;
            $question->ans_Type = $request->ans_Type;
            $question->update();

            if($request->ans_Type=="multiple_Choice"){

                $answer = FlowQuestionAnswer::where('flow_question_id', $request->question_id)->get();
                $answer->each->delete();
                for ($i = 0; $i < count($request->answer); $i++) {

                    $ans = new FlowQuestionAnswer();
                    $ans->flow_question_id = $request->question_id;
                    // $ans->uuid = Str::uuid();
                    $ans->answer = $request->answer[$i];
                    $ans->save();
                }
           }


            DB::commit();

            $notification = array(
                'message' => 'Question Updated Successfully Added',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);

        
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
