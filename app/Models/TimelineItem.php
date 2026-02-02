<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class TimelineItem extends Model
{
    use HasUuids;

    protected $fillable = [
        'year',
        'title',
        'description',
        'type',
    ];
}
