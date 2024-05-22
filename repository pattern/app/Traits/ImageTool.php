<?php

namespace App\Traits;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageTool
{
    public function saveImage(UploadedFile $image, string $directory = ''): string
    {
        $filename = $image->getClientOriginalName();
        $path = $image->storeAs($directory, $filename, 'public_images');
        return '/storage/images/' . $path;
    }

    public function uploadImage(UploadedFile $image, string $directory = '', string $oldImagePath = null)
    {
        // Delete the old image if it exists
        if ($oldImagePath && Storage::disk('public_images')->exists($oldImagePath)) {
            Storage::disk('public_images')->delete($oldImagePath);
        }

        $filename = $image->getClientOriginalName();
        $path = $image->storeAs($directory, $filename, 'public_images');
        return '/storage/images/' . $path;
    }

    public function deleteImage(string $imagePath)
    {
        if (Storage::disk('public_images')->exists($imagePath)) {
            Storage::disk('public_images')->delete($imagePath);
        }
    }

}