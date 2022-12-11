<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    // 1-Usul
    protected $fillable = ['title', 'short_content', 'content', 'photo'];

    // // 2-Usul
    // protected $guarded = [];
}
