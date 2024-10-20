<?php
namespace App\Requests;

abstract class FormRequest
{
    protected $data;
    public $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate()
    {
        foreach ($this->rules() as $field => $rules) {
            foreach (explode('|', $rules) as $rule) {
                $value = $this->data[$field] ?? null; // $field mavjudligini tekshiring
                switch ($rule) {
                    case 'required':
                        if (empty($value)) {
                            $this->errors[$field] = $this->messages()[$field . '.required'] ?? 'This field is required.';
                        }
                        break;
                    case 'email':
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $this->errors[$field] = $this->messages()[$field . '.email'] ?? 'Invalid email format.';
                        }
                        break;
                    case 'phone':
                        if (!preg_match('/^\+?[0-9]{7,15}$/', $value)) {
                            $this->errors[$field] = $this->messages()[$field . '.phone'] ?? 'Invalid phone number.';
                        }
                        break;
                    case 'int':
                        if (!filter_var($value, FILTER_VALIDATE_INT)) {
                            $this->errors[$field] = $this->messages()[$field . '.int'] ?? 'This field must be an integer.';
                        }
                        break;
                    case 'date':
                        if (!strtotime($value)) {
                            $this->errors[$field] = $this->messages()[$field . '.date'] ?? 'Invalid date format.';
                        }
                        break;
                }
            }
        }

        return empty($this->errors); // Agar xatoliklar bo'lmasa true qaytaradi
    }

    public function errors()
    {
        return $this->errors;
    }

    public function getData()
    {
        return $this->data;
    }

    protected function rules(): array
    {
        return [];
    }

    protected function messages(): array
    {
        return [];
    }
}
