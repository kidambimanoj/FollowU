<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '/var/www/html/config/db.php';
class Stalkee{
    
    private static $STALKEE_URL = "http://ec2-52-24-56-226.us-west-2.compute.amazonaws.com/gallery/gallery.php?se_id=";
    public static function get_stalkee_fb_id($stalkee_id){
        $sql1 = "SELECT distinct stalkee_fb_id FROM stalkee where stalkee_id='".$stalkee_id."'";
         $stalkee_fb_id = '';
         $conn = db::connect_to_db();
        if($conn){
            $result = $conn->query($sql1);
            if ($result) {
                while($row = $result->fetch_assoc()) {
                $stalkee_fb_id = $row["stalkee_fb_id"];
                }
            }
            $conn->close(); 
        }
        return($stalkee_fb_id);
    } 
    
    public static function get_stalkee_list(){
        $sql = "SELECT stalkee_id, stalkee_fb_id FROM stalkee";
        $conn = db::connect_to_db();
        if($conn){
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $stalkee[] = $row["stalkee_id"];           
                }
            }
            $conn->close(); 
        }
        return($stalkee);
    }
    
    public static function insert_photo_db($stalkee_id,$image_name,$status){
        $sql = "INSERT INTO stalkee_photos VALUES ('".$stalkee_id."','".$image_name."','".$status."')";
        $conn = db::connect_to_db();
        if($conn)
        $result = $conn->query($sql);
        $conn->close(); 
    }
    
    public static function get_stalkee_name($stalkee_id){
       $fbquery = "http://graph.facebook.com/".Stalkee::get_stalkee_fb_id($stalkee_id)."/?fields=name,link";
       $fb = file_get_contents($fbquery, 'rb');
       $fbarray = json_decode($fb, true);
       return($fbarray['name']); 
    }
    
    public static function get_stalkee_gallery($stalkee){
        $gallery_url = self::$STALKEE_URL.base64_encode($stalkee);
        return("<a href=".$gallery_url.">".Stalkee::get_stalkee_name($stalkee)."</a>");
    }
    
    public static function update_photo_status(){
        $sql = "update stalkee_photos set new_photo=0";
        $conn = db::connect_to_db();
        if($conn)
        $result = $conn->query($sql);
        $conn->close(); 
    }
    
}
?>