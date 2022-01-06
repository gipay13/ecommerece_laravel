<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'  => 'required|string',
            'photo' => 'required|image|mimes:svg'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string'   => 'Name must be a character',
            'photo.required' => 'Photo is required',
            'photo.image' => 'Photo must be an image',
            'photo.mimes' => 'Photo must be an svg'
        ];
    }
}
