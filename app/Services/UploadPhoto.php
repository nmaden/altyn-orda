<?php
namespace App\Services;
use Storage;
use Intervention\Image\Facades\Image as ImageInt;
class UploadPhoto {
    static function upload($file, $compress = true){
		
        if (!$file)
            return null;
		

     $file_name = time().rand(0,9).'.'.$file->getClientOriginalExtension();
	
     // $file_path = $file->storeAs('/store/test/'.date('Y').'/'.date('m').'/'.date('d'), $file_name);
	 
		
	//$file= $this->request->photo;
	$ext = $file->getClientOriginalExtension();
	 $file_name = time().rand(0,9).'.'.$file->getClientOriginalExtension();
	 $img = ImageInt::make($file->getRealPath());
	 $height = $img->height();
     $width = $img->width();
	 $resizedImage =  $img->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
	 $resizedImage->response($ext);
		$file_path= '/store/test404/'.date('Y').'/'.date('m').'/'.date('d').'/'.$file_name;
        Storage::put($file_path,  $resizedImage);
	return $file_path;
		
		
		
		
    }
}
