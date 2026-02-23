<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class BlogPost extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'published_at',
        'image_url',
        'status',
        'views_count',
        'is_featured',
        'reading_time',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];
}
