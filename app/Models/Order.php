<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'reg',
        'tableId',
        'total',
        'discount',
        'payable',
        'pay',
        'due',
        'kitchen',
        'status'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'tableId', 'id');
    }
    
}
