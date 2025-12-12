<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'description',
        'content',
        'image',
        'views',
        'published_at',
        'status',
    ];

    use HasFactory;
}
