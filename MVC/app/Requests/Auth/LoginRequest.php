<?php
namespace App\Requests\Auth;

use App\Requests\FormRequest;

class LoginRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
        ];
    }
}
