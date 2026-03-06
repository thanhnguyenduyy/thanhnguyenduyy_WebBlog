<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    /**
     * Process and store an uploaded image
     * 
     * @param UploadedFile $file
     * @param string $folder
     * @param int|null $maxWidth
     * @param int|null $maxHeight
     * @param int $quality
     * @return string Public path to the image
     */
    public function optimizeAndStore(UploadedFile $file, string $folder, ?int $maxWidth = 1200, ?int $maxHeight = null, int $quality = 80): string
    {
        // 1. Initialize Image Manager with GD driver
        $manager = new ImageManager(new Driver());

        // 2. Read the image
        $image = $manager->read($file);

        // 3. Resize if needed (constrain aspect ratio)
        if ($maxWidth || $maxHeight) {
            $image->scale(width: $maxWidth, height: $maxHeight);
        }

        // 4. Generate filename (forcing .webp for best compression)
        $filename = Str::random(40) . '.webp';
        $path = $folder . '/' . $filename;

        // 5. Encode to WebP with specific quality
        $encoded = $image->toWebp($quality);

        // 6. Save to public disk
        Storage::disk('public')->put($path, (string) $encoded);

        return '/storage/' . $path;
    }
}
