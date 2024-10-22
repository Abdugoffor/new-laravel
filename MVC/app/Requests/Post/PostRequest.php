<?php
namespace App\Requests\Post;

use App\Requests\FormRequest;

class PostRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'text' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'title.required' => 'title is required.',
            'description.required' => 'description is required.',
            'text.required' => 'text is required.',
        ];
    }
}
