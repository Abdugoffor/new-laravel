<?php
namespace App\Requests\Post;

use App\Requests\FormRequest;

class PostEditRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'id' => 'required|int',
            'title' => 'required|string',
            'description' => 'required|string',
            'text' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'id.required' => 'id is required.',
            'id.int' => 'id is invalid .',
            'title.required' => 'title is required.',
            'description.required' => 'description is required.',
            'text.required' => 'text is required.',
        ];
    }
}
