<?php
/** Laravel function **/
/** Copying files from one folder to another folder **/

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// Parameters: $from = file path, $to = destionation path
public function copy_files_to_another_folder($from, $to){
    // List all the files from a folder
    $fromFiles = Storage::disk('public')->allFiles($from);

    // Using normal get and put (the whole file string at once)
    for ($i=0; $i < count($fromFiles) ; $i++) {
        Storage::disk('public')->put(
            Str::replace($from, $to, $fromFiles[$i]),       // path
            Storage::disk('public')->get($fromFiles[$i])    // content
        );
    }
}

?>