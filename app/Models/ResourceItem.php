<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ResourceItem extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'description',
        'type',
        'downloads',
        'file_size',
        'url',
    ];
}
