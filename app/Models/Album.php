<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Album extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'cover_url',
        'description',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
