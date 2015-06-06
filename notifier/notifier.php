<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '/var/www/html/email_client.php';
class notifier{
    
    
    public static function get_notifier_list(){
        $stalker_stalkee = Stalker::get_stalkers_for_stalkees_with_new_photo();
        if($stalker_stalkee)
        notifier::process_notifier($stalker_stalkee);
    }
    
    private static function process_notifier($stalker_stalkee){
        foreach($stalker_stalkee as $stalker=>$stalkees){
            $greeting="Hi ".Stalker::get_stalker_name($stalker).",";
            $stalkee_message="<br><br>Following stalkee(s) have uploaded new photos. Click the name to view their gallery<br><br>";
            $stalkee_list = "";
            $count = 0;
            $end_of_message = "<br>Happy Stalking!!!<br><br>VStalk4U.com";
            foreach($stalkees as $stalkee){
                $count++;
                $stalkee_list = $stalkee_list. Stalkee::get_stalkee_gallery($stalkee)."<br><br>";
            }
            if($count==1){
                $subject = Stalkee::get_stalkee_name($stalkee)." uploaded a new photo!!";
            }else{
                $subject = "New Photos uploaded by your stalkees!!";
            }
            $message=$greeting.$stalkee_message.$stalkee_list.$end_of_message;
            notifier::notify_stalker($stalker,$message,$subject);
            }
            Stalkee::update_photo_status();
    }
    
    private static function notify_stalker($stalker,$message,$subject){
        email_client::email_send(Stalker::get_stalker_email($stalker),$message,$subject);
        #return($message);
    }
    
}



?>

