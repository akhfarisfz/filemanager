<?php

if(!function_exists('makeAvatar')){
    function makeAvatar($fontPath,$dest,$char){
        $path = $dest;
        $image = imagecreate(200,200);
        $red = rand(0,255);
        $green  = rand(0,255);
        $blue  = rand(0,255);
        $font = 'font/Roboto-Black.ttf';
        imagecolorallocate($image,$red,$green,$blue);
        $textcolor=imagecolorallocate($image,255,255,255);
        imagettftext($image,100,0,50,150,$textcolor,$font,$char);
        imagepng($image,$path);
        imagedestroy($image);
        return $path;

    }
}


?>