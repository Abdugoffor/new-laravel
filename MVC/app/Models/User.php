<?php
namespace App\Models;

class User extends Model
{
    protected static $table = "users";
    private array $colpoms = [
        'name',
        'email',
        'password',
    ];
}
