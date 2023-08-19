<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Необходимо заполнить поле Логин',
            'password.required' => 'Необходимо ввести пароль'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function authenticate(): void {
        if (!Auth::attempt($this->only('username', 'password'))) {
            throw ValidationException::withMessages([
                'username' => trans('auth.failed'),
            ]);
        }
    }
}
