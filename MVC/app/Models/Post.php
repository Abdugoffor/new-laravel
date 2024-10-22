<?php
namespace App\Models;

class Post extends Model
{
    protected static $table = "posts";
    private array $colpoms = [
        'title',
        'description',
        'text',
        // 'img',
    ];
}
