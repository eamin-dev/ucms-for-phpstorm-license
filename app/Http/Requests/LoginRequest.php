<?php

namespace App\Http\Requests;

use App\Utilities\AppHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|email|max:100',
            'password' => 'required|string|min:6|max:100',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be valid',
            'email.max' => 'Email must be less than 100 characters',
            'password.string' => 'Password must be string',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must be less than 100 characters',
            'password.required' => 'Password is required',
        ];
    }


    /**
     * @param Validator $validator
     * @return RedirectResponse|void
     */
    protected function failedValidation(Validator $validator)
    {
        return AppHelper::errorRedirect($validator->errors()->first());
    }
}
