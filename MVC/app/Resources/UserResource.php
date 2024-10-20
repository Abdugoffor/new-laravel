<?php
namespace App\Resources;

class UserResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->data->id,
            'name' => $this->data->name,
            'email' => $this->data->email,
        ];
    }
}
