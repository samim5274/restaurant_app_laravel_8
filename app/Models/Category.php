<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'catId', 'id');
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class, 'catId', 'id');
    }

}
