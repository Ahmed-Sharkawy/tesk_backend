<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('uploadImage')) {
    function uploadImage($image, $path)
    {
        $imageName    = date('Y-m-d') . '_' . uniqid() . '.' . $image->extension();
        $pathImageUrl = $image->storeAs($path, $imageName);

        return $pathImageUrl;
    }
}

if (! function_exists('deletImage')) {
    function deletImage($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
}
