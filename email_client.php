<?php
require_once '/var/www/html/sendgrid-php/sendgrid-php.php';

class email_client{

public static function email_send($to,$msg,$subject)
{
$sendgrid = new SendGrid('nibinabr', 'qwerty123');
$email    = new SendGrid\Email();
$email->addTo($to)->
       addTo('nibinabr@gmail.com')->
       setFromName('VStalk4U')-> 
       setFrom('noreply@vstalk4u.com')->
       setSubject($subject)->
       setHtml($msg);

$sendgrid->send($email);
}

}
?>
