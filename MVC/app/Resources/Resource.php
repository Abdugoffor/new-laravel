<?php
namespace App\Resources;

abstract class Resource
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function toArray()
    {
        return $this->data;
    }

    public static function collection($items)
    {
        return array_map(function ($item) {
            return (new static($item))->toArray();
        }, $items);
    }
}
