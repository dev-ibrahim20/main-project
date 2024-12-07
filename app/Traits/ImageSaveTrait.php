<?php

namespace App\Traits;

trait ImageSaveTrait
{
    public function saveImage($image, $path)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($path), $imageName);
        return $imageName;
    }
}