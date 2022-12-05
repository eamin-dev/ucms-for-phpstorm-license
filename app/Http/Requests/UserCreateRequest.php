<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email:rfc,dns|unique:users|email|max:100',
            'password' => 'required|string|min:6|max:100',
            'platform' => 'required|integer',
            'role_id' => 'required|integer',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'role_id.required'    => 'User role must be selected',
            'email.unique' => 'Email already exist',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'name.required' => 'Name is required',
            'name.string' => 'Name must be string',
            'name.max' => 'Name must be less than 100 characters',
            'email.email' => 'Email must be valid',
            'email.max' => 'Email must be less than 100 characters',
            'password.string' => 'Password must be string',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must be less than 100 characters',
            'platform.required' => 'Platform is required',
            'platform.integer' => 'Platform value is invalid',
            'role_id.integer' => 'Role value is invalid',
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'failed',
            'errors'=>$validator->errors()->getMessageBag()
        ], Response::HTTP_OK));
    }
}
