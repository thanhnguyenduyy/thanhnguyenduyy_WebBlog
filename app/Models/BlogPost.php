<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class BlogPost extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'category',
        'date',
        'image_url',
        'status',
    ];
}
