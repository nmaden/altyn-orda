<?php
namespace App\Services;
use Storage;
class UploadPhoto {
    static function upload($file, $compress = true){
		
        if (!$file)
            return null;
		

        $file_name = time().rand(0,9).'.'.$file->getClientOriginalExtension();
        $file_path = $file->storeAs('/store/gallery/'.date('Y').'/'.date('m').'/'.date('d'), $file_name);
        return $file_path;
    }
}
