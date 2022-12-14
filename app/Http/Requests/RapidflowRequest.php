<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RapidflowRequest extends FormRequest
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
            'question_title'=> 'required',
            'ans_type' =>'required'
        ];
    }


    public function messages()
    {
        return[ 
            'question_title.required' => 'Question title field is required',
            'ans_type.required' => 'Ans Type field is required'

        ];
    }
}
