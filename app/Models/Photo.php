<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Photo extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'category',
        'url',
        'exif',
        'album_id',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
