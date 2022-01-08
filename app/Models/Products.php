<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image', 'brand_id'];

    public function brand()
    {
        $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function reviews()
    {
        $this->hasMany(Review::class);
    }
}
