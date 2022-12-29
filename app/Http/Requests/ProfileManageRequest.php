<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileManageRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'image' =>'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=1500,max_height=1500',
            'name' =>'required',
            //'email'=> ['required',Rule::unique('users')->ignore($request->id)],
            'email'=> 'required',

        ];
    }

    public function messages()
    {
        return[

            'image'=>'Image format or size not supported',
            'name.required'=>'Name field is required',
            'email.required'=>'Email Field is required'

        ];
    }
}
