<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Photo extends Model
{

    protected $fillable = [
        'title',
        'gallery_category_id',
        'url',
        'exif',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function galleryCategory()
    {
        return $this->belongsTo(GalleryCategory::class);
    }
}
