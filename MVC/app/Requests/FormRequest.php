<?php
namespace App\Requests;

use App\Database\DB;

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
                $value = $this->data[$field] ?? null; 

                if (strpos($rule, 'unique') === 0) {
                    // dd($rule);

                    $ruleParts = explode(':', $rule);
                    // dd($ruleParts);
                    if (count($ruleParts) > 1) {

                        $params = explode(',', $ruleParts[1]);

                        $table = $params[0];

                        $column = $params[1] ?? $field;

                        $exists = DB::table($table)->where($column, $value);
                        
                        if ($exists) {
                            $this->errors[$field] = $this->messages()[$field . '.unique'] ?? "$field already exists.";
                        }
                    }
                } else {

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
        }
        // dd($this->errors);
        return empty($this->errors);
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
