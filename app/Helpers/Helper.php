<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class Helper
{
    public static function uploadFile($image, $path, $file_old)
    {
        $path = 'files/' . $path;
        $tgl = date('Y-m-d');
        $file = array('file' => $image);
        $rules = array('file' => 'mimes:jpeg,jpg,gif,png');
        $validator = Validator::make($file, $rules);

        if ($validator->fails() or $image == NUll) {
            $fileName = $file_old == '' ? '' : $file_old;
        } else {
            $extension = strstr($image->getClientOriginalName(), '.');
            $uniq = uniqid();
            $fileName = $tgl . "_" . $uniq . $extension;
            $image->move($path, $fileName);
            Helper::deleteFile($file_old, $path);
        }
        return $fileName;
    }

    public static function deleteFile($image, $path)
    {
        $path = 'files/' . $path;
        File::delete($path . '/' . $image);
    }
}
