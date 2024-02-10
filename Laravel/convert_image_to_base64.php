<?php
/** Laravel function **/
/** Convert file input image into base64 image **/
/** $image = input file image **/
/** $filesize = maximum file size **/

function convert_image_to_base64($image, $fileSize){
    $base64_image = "";

    // check the image filesize if it is less than or equal to the given maximum filesize
    if($image->getSize() <= $fileSize) {
        $mime_type = $image->getMimeType() ? $image->getMimeType() : 'image/png';

        $base64_image = 'data:' . $mime_type . ';base64,' . base64_encode(file_get_contents($image));
    }

    return $base64_image; 
}

?>