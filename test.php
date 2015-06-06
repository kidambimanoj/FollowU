<?php

/* 
 * @author Nibin Abraham Mattam
 * VStalk4U.com
 * 
 */
require '/var/www/html/photos/PhotoURL.php';
require '/var/www/html/photos/PhotoResizer.php';
require '/var/www/html/Downloader/PhotoDownloader.php';
require '/var/www/html/IdGenerator/RandomIDGenerator.php';
require '/var/www/html/DAO/Stalkee.php';
require '/var/www/html/DAO/Stalker.php';
require '/var/www/html/notifier/notifier.php';

foreach (Stalkee::get_stalkee_list() as $stalkee) {
   PhotoDownloader::download_photo(PhotoURL::get_API(Stalkee::get_stalkee_fb_id($stalkee)),$stalkee);
}
notifier::get_notifier_list();

?>
