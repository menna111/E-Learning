<?php

if(!function_exists('render_image')){
    function render_image($path){
        if (file_exists($path)){
            return asset($path);
        }else{
            return "https://via.placeholder.com/108";
        }
    }
}



?>
