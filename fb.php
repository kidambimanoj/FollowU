<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require 'facebook/facebook-php-sdk/src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '767981646651061',
  'secret' => '5d071bbb1693c87028a59bbb42d41594',
));

// Get User ID
$user = $facebook->getUser();

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
  if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
    echo "<br>Loginout ".$logoutUrl;
    echo "<br>";
    print_r($user_profile);
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
} else {
  $loginUrl = $facebook->getLoginUrl();
  echo "<br>Login ".$loginUrl;
}

$facebook->api('/me/feed/', 'post', array(
    'message' => 'I want to display this message on my wall'
));

?>
