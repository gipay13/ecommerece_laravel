<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as RulesPassword;

class UserRequest extends FormRequest
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
            'name'      => 'required|string|max:50',
            'email'     => 'required|unique:users|email',
            'password'  => ['required', RulesPassword::min(8)->mixedCase()->numbers()],
            'roles'     => 'required|string|in:admin,user'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Name is required',
            'name.string'       => 'Name must be a character type',
            'name.max'          => 'Maxiumum lenght is 50 character',
            'email.required'    => 'Email is required',
            'email.unique'      => 'Email has been used',
            'email.email'       => 'Please use valid email',
            'password.required' => 'Password is required',
            'password.min'      => 'Password must contain a least 8 character',
            'roles.required'    => 'Roles is required',
            'roles.string'      => 'Roles must be a character type',
            'roles.in'          => 'Roles must contain admin or user',
        ];
    }
}
