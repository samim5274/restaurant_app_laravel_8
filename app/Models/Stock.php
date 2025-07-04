<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg',
        'date',
        'foodId',
        'stockIn',
        'stockOut',
        'remark',
        'status',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'foodId', 'id');
    }
}
