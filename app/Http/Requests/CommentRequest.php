<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'comment' => ['required', 'string', 'min:1']
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'Поле Комментарий является обязательным',
            'comment.string' => 'Поле Комментарий должно быть строкой',
            'comment.min' => 'Комментарий должен содержать хотя бы 1 символ'
        ];
    }
}
