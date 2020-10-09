<?php
include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] .'/configs/add-ons.php';

if($_GET["user_id"]) {
	$sql = "INSERT INTO friends (user_1, user_2) VALUES ('" . $user_id . "', '" . $_GET["user_id"] . "')";
	if(mysqli_query($connect, $sql)) {
		// header("Location: /");
		include "modules/friends_list.php";
	} else {
		echo "<h3>Ошибка</h3>";
	}

}

?>