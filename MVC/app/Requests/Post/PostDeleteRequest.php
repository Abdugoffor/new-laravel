<?php
namespace App\Requests\Post;

use App\Requests\FormRequest;

class PostDeleteRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'id' => 'required|int',
        ];
    }

    protected function messages(): array
    {
        return [
            'id.required' => 'id is required.',
            'id.int' => 'id is invalid .',
        ];
    }
}
