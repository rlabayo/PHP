<?php
/** Laravel function **/
/** Conver base64 to image file */
/** $image = input file image **/
/** $filesize = maximum file size **/


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


/** Parameters: $image = base64 format image, $filepath = destination directory  */
function convert_base64_to_image($image, $filepath){
    // create custom folder if it doesn't exist yet
    if(!File::exists($filepath)){
        Storage::disk('public')->makeDirectory($filepath);
    }
    $image_64 = $image; //your base64 encoded data

    $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // get extension ex. .jpg .png .pdf

    $replace = substr($image_64, 0, strpos($image_64, ',')+1); // get the value of this substring function to be use to get the decoded image eg: data:image/png;base64,

    $image = str_replace($replace, '', $image_64); 
    $image = str_replace(' ', '+', $image); 

    $imageName = date('ymd') . '_' . time() .'_'. Str::random(10).'.'.$extension; // create image name with date_time_rand() format

    Storage::disk('public')->put($filepath.$imageName, base64_decode($image)); // save image to the destination path
    $imagePath = $filepath . $imageName;
    
    return $imagePath; // return filepath with filename
}





?>