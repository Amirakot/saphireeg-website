<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;

trait UploadImage
{
    public function uploadimage(Request $request, $foldername)
    {

  $paths = [];

    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $path = $file->store($foldername, 'public');

            $paths[] = [
                'path' => $path,

            ];
        }
    }
// dd($paths);
    return $paths;
    }
}
