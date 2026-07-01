<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
protected $fillable = ['title', 'body', 'image', 'user_id'];

    // A post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}