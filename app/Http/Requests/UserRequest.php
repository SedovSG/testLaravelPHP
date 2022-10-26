<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required', 'string'],
            'email' => ['required', 'email:rfc,dns']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле :attribute обязательно для заполнения',
            'name.string' => 'Поле :attribute должно содержать буквенные символы',
            'email.required' => 'Поле :attribute обязательно для заполнения',
            'email.email' => 'Поле :attribute должно быть формата RFC 822',
        ];
    }
}
