<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

#require '/var/www/html/config/db.php';
class Stalker{
    
    public static function get_stalkers_for_stalkees_with_new_photo(){
        $sql1 = "SELECT stalker_stalkee.stalker_id as stalker_id,stalker_stalkee.stalkee_id as stalkee_id FROM stalker_stalkee,stalkee_photos WHERE stalker_stalkee.stalkee_id = stalkee_photos.stalkee_id and stalkee_photos.new_photo=1";
         $stalkee_fb_id = '';
         $conn = db::connect_to_db();
         
        if($conn){
            $result = $conn->query($sql1);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $stalker_stalkee[$row["stalker_id"]][] = $row["stalkee_id"];
                }
            }else{
                $stalker_stalkee = 0;
            }
            $conn->close(); 
        }
        return($stalker_stalkee);
    }
    
    public static function get_stalker_name($stalker_id){
        $sql1 = "SELECT first_name FROM `stalker` WHERE id='".$stalker_id."'";
         $conn = db::connect_to_db();
         $name="";
        if($conn){
            $result = $conn->query($sql1);
            if ($result) {
                while($row = $result->fetch_assoc()) {
                $name = $row["first_name"];
                }
            }
            $conn->close(); 
        }
        return($name);
    }
    
    public static function get_stalker_email($stalker_id){
        $sql1 = "SELECT email FROM `stalker` WHERE id='".$stalker_id."'";
         $conn = db::connect_to_db();
         $name="";
        if($conn){
            $result = $conn->query($sql1);
            if ($result) {
                while($row = $result->fetch_assoc()) {
                $email = $row["email"];
                }
            }
            $conn->close(); 
        }
        return($email);
    }     
}
?>