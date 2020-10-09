<?php

/*
файл для настроек сайта 
*/

// название сайта
$nameSite = "My WEBchat";


$user_id = null;

if(isset($_COOKIE["polzovatel_id"])) {
	$user_id = $_COOKIE["polzovatel_id"];
}


?>