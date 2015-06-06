<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PhotoDownloader{
    private static $DOWNLOAD_FOLDER = "/var/www/html/stalkee_photos";
    
    public static function download_photo($photo_url,$stalkee_id){
        $stalkee_dir = self::$DOWNLOAD_FOLDER.'/'.$stalkee_id;
        
        if (!file_exists($stalkee_dir)) {
            mkdir($stalkee_dir, 0777, true);    
        }
        $latest_image = $stalkee_dir."/".PhotoDownloader::get_latest_photo($stalkee_id);
        $time = time();
        $image_name = $stalkee_dir.'/'.$time.'.jpg';
        
        if(PhotoDownloader::check_new_file($latest_image,$photo_url)){
            file_put_contents($image_name, file_get_contents($photo_url));
            Stalkee::insert_photo_db($stalkee_id,$time,1);
        }  
    }
      
   private static function check_new_file($old_image,$new_image){
       if(md5_file($old_image)==md5_file($new_image)){
           return(0);
       }
       return(1);
   }
   
   private static function get_latest_photo($stalkee_id){
       $files = scandir(self::$DOWNLOAD_FOLDER."/".$stalkee_id,1);
       return($files[0]);
   }
}
?>

