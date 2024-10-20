<?php
namespace App\Requests;

class UserStoreRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            // 'phone' => 'required|phone', // Agar kerak bo'lsa, bu yerda ham qo'shishingiz mumkin
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
        ];
    }
}
