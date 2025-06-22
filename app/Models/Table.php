<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'tName',
        'status',
        'remark'
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'tableId', 'id');
    }
}
