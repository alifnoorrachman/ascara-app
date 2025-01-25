<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * Handle the image upload process
     * 
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $path
     * @param string|null $oldImage
     * @return string
     */
    public function handleUpload($image, $path, $oldImage = null)
    {
        // Delete old image if exists
        if ($oldImage) {
            $this->deleteImage($path . '/' . $oldImage);
        }

        // Generate unique filename
        $filename = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

        // Store the image
        $image->storeAs(
            $path,
            $filename,
            'public'
        );

        return $filename;
    }

    /**
     * Delete an image from storage
     * 
     * @param string $path
     * @return bool
     */
    public function deleteImage($path)
    {
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }
}