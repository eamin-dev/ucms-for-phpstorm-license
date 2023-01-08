<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class storeQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question_title'=>'required',
            'ans_type' =>'required',
            'answer' => 'required_if:ans_type,multiple_Choice'

        ];
    }
    

    public function messages()
    {
        return [
            'question_title.required' => 'Question Title field is required',
            'ans_type.required' => ' Ans Type field is required',
            'answer.required_if' => 'Answer field is required'
            
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
           // 'status' => 'failed',
            'errors'=>$validator->errors()->getMessageBag()
        ], Response::HTTP_OK));
    }
}
