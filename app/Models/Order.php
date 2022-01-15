<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['user_id', 'address', 'cellphone_number', 'order_status', 'payment_method', 'order_date', 'delivery_date', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
