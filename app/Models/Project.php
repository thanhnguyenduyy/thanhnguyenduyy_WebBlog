<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Project extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'description',
        'tech_stack',
        'link',
        'image_url',
    ];

    protected $casts = [
        'tech_stack' => 'array',
    ];
}
