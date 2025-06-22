<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category',
        'stock',
        'status',
        'image',
        'ingredients',
        'remark'
    ];

    public function food()
    {
        return $this->hasMany(Food::class, 'foodId', 'id');
    }
}
