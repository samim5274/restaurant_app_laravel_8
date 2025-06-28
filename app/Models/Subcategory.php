<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['catId', 'name'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'catId', 'id');
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class, 'subcatId', 'id');
    }
}
