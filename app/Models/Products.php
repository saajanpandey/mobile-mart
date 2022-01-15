<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image', 'brand_id', 'status'];

    public function brand()
    {
        return  $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function reviews()
    {
        return  $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_products', 'order_id', 'product_id');
    }
}
