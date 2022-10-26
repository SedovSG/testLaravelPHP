<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'user_id' => ['required', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле :attribute обязательно для заполнения',
            'name.string' => 'Поле :attribute должно содержать буквенные символы',
            'date.required' => 'Поле :attribute обязательно для заполнения',
            'date.date' => 'Поле :attribute должно быть формата RFC 3339 без времени',
            'user_id.required' => 'Поле :attribute обязательно для заполнения',
            'user_id.integer' => 'Поле :attribute должно содержать цифровые символы',
        ];
    }
}
