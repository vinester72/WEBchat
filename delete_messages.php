<?php
include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] .'/configs/add-ons.php';

if(isset($_POST["message_id"]) && $_POST["message_id"]!="") {
	$sql = "DELETE FROM messages WHERE id =" . $_POST["message_id"];
	if(mysqli_query($connect, $sql)) {
		// header("Location: /");
		// include $_SERVER['DOCUMENT_ROOT'] .'/modules/messages-list.php';
	}
	
	

} 

?>