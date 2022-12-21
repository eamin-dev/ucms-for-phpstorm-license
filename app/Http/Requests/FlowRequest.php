<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlowRequest extends FormRequest
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
            'country_office_id' => 'required|integer',
            'date' =>'required',
            'file_id'=>'required|string|max:100|unique:flows,file_id',
            'themefic_area_id'=>'required|integer',
        ];
    }

    public function messages()
    {
        return[ 
            'country_office_id.required' => 'Country Office Name is required',
            'date.required' => 'Date field is required',
            'file_id.required' => 'file Id is required',
            'themefic_area_id.required' => 'Themefic Area is required',

        ];
    }
}
