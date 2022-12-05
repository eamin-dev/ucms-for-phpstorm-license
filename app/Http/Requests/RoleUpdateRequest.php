<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class RoleUpdateRequest extends FormRequest
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
     * @return string[]
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'permissions' => 'required|array',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'Role Name is required',
            'name.string' => 'Role Name must be string',
            'name.max' => 'Role Name must be less than 100 characters',
            'permissions.required' => 'Permissions is required',
            'permissions.array' => 'Permissions must be array',
            'permissions.*.required' => 'Permissions is required',
            'permissions.*.integer' => 'Permissions must be integer',
            'permissions.*.exists' => 'Permissions must be exists',
        ];
    }


    /**
     * @param Validator $validator
     * @return RedirectResponse|void
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'failed',
            'errors'=>$validator->errors()->getMessageBag()
        ], Response::HTTP_OK));
    }
}
