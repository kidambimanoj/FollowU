<?php

#https://graph.facebook.com/reshma.georgepalackan/picture?width=2000&height=1500


class PhotoURL{
    
     private static $FB_GRAPH_API = "https://graph.facebook.com/";
     private static $PHOTO_WIDTH = 10000;
     private static $PHOTO_HEIGHT = 7500;
    
    public static function get_API($fb_user){
       return(PhotoURL::get_optimal_image_size($fb_user));
    } 
    
    private static function get_optimal_image_size($fb_user){
        $size=getimagesize(PhotoURL::get_photo_url($fb_user,0,0));
        return(PhotoURL::get_photo_url($fb_user,$size[0],$size[1]));
    }
    
    private static function get_photo_url($fb_user,$width,$height){
         if($width==0 ||$height==0){
             return (self::$FB_GRAPH_API.$fb_user."/picture?width=".self::$PHOTO_WIDTH."&height=".self::$PHOTO_HEIGHT);
         }else{
             return (self::$FB_GRAPH_API.$fb_user."/picture?width=".$width."&height=".$height);
         }    
    }
    
}



?>

