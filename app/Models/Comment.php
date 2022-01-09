<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'post_id', 'user_id'];

    public function post()
    {
        $this->belongsTo(Products::class, 'post_id', 'id');
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
