<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileCleanupTrait
{
    /**
     * Delete an old file from storage
     * 
     * @param string|null $fullPath The full public path (e.g., /storage/uploads/...)
     * @param string $disk The storage disk to use
     */
    protected function deleteOldFile(?string $fullPath, string $disk = 'public')
    {
        if (!$fullPath) {
            return;
        }

        // Logic to extract the relative path from the public URL
        // Example: /storage/uploads/settings/file.jpg -> uploads/settings/file.jpg
        $storagePath = str_replace('/storage/', '', $fullPath);

        if (Storage::disk($disk)->exists($storagePath)) {
            Storage::disk($disk)->delete($storagePath);
        }
    }
}
