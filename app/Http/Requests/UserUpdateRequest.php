<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'required|integer',
            'profession' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'hobby' => 'required|string|max:255',
        ];
    }
}
