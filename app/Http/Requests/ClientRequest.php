<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => ['required', 'string', 'regex:/[A-Za-zА-Яа-я\s\'-]+/'],
            'lastName' => ['required', 'string', 'regex:/[A-Za-zА-Яа-я\s\'-]+/'],
            'phone' => ['required', 'string', 'regex:/\+?[0-9\-()]+/'],
            'email' => ['required', 'string', 'email', 'regex:/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Имя является обязательным',
            'name.string' => 'Поле Имя должно быть строкой',
            'name.regex' => 'Некорректный формат поля Имя',
            'lastName.required' => 'Поле Фамилия является обязательным',
            'lastName.string' => 'Поле Фамилия должно быть строкой',
            'lastName.regex' => 'Некорректный формат поля Фамилия',
            'email.required' => 'Поле E-mail является обязательным',
            'email.string' => 'Поле E-mail должно быть строкой',
            'email.email' => 'Некорректный формат поля E-mail',
            'email.regex' => 'Некорректный формат поля E-mail',
            'phone.required' => 'Поле Телефон является обязательным',
            'phone.string' => 'Поле Телефон должно быть строкой',
            'phone.regex' => 'Некорректный формат поля Телефон',
        ];
    }
}
