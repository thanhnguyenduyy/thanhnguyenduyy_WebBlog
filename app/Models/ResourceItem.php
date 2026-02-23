<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ResourceItem extends Model
{

    protected $fillable = [
        'title',
        'description',
        'type',
        'downloads',
        'file_size',
        'url',
    ];
}
