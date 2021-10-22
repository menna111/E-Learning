<?php
namespace App\Traits;
use Illuminate\support\Str;
use  Intervention\Image\Facades\Image;


Trait ImageUpload
{
    function uploadImage($image,$directoty,$quality,$width=false,$height=false):string
    {
        // 1-making a name to image
        $file_extention=$image->getClientOriginalExtension();
        $file_name=Str::random(20) . '.' . $file_extention;


        // 2- creating the directory that images will be saved in
        if(! is_dir($directoty)){
            mkdir($directoty,0777,true);
        }

        // 3- we tell pacage what is image
        $img=Image::make($image->getRealPath());
        if($width == true OR $height ==true){
            $img->resize($width,$height);
            $img->save($directoty . '/' .$file_name, $quality);
        }else {


            $img->save($directoty . '/'. $file_name, $quality);
        }
        return  $directoty . '/' . $file_name ;
    }

}





?>
