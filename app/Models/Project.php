<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Project extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'description',
        'tech_stack',
        'link',
        'github_link',
        'image_url',
        'status',
        'is_featured',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
    ];
}
