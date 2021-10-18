<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageTrait {

    public function assignArticleThumbnail($path, $thumbnail, $slug, $width = '1000', $height = '600'): string
    {
        $thumbnailExtensions = $thumbnail->getClientOriginalExtension();
        $thumbnailName = time() . '-' . $slug . ".$thumbnailExtensions";

        $image = Image::make($thumbnail)->resize($width, $height);
        $image->stream($thumbnailExtensions);
        Storage::disk('public')->put($path . '/' . $thumbnailName, $image, 'public');

        return $thumbnailName;
    }

}
