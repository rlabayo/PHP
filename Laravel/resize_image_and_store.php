<?php
/** Laravel function **/
/**  */

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


/** Parameters: $image = input image file, $width = desired width, $height = desired height, $filepath = destination directory  */
function createImage($image,int $width = 400,int $height = 300, $filepath){
    // create custom folder if the directory doesn't exist yet
    if(!File::exists($filepath)){
        Storage::disk('public')->makeDirectory($filepath); 
    }

    $new_image = Image::make($image->getRealPath());

    // check if image is not null
    if($new_image != null) {
        $file = $image;

        // resize image base on the given width and height
        $new_image->resize($width, $height, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $filename = date('ymd') . '_' . time() .'_'. Str::random(10). '.' . $file->getClientOriginalExtension();
        $new_image->save(storage_path('app/public/' . $filepath . $filename));  // save the image in the public directory
        $image = $filepath . $filename;

        return $image; // return filepath with filename
    }
}




?>