<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = [
        'catId', 
        'subcatId', 
        'userId', 
        'date', 
        'amount', 
        'remark'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'catId', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcatId', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Admin::class, 'userId', 'id');
    }
}
