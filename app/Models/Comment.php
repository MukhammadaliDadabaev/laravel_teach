<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'post_id',
        'user_id',
    ];

    //-------> BU comment post-ga tegishli
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //-------> BU comment user-ga tegishli
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
