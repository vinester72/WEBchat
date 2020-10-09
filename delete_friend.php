<?php
include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] .'/configs/add-ons.php';

if($_GET["user_id"]) {
	$sql = "DELETE FROM friends WHERE user_1 = " . $user_id . " AND user_2 = " . $_GET["user_id"];
	if(mysqli_query($connect, $sql)) {
		// header("Location: /");
		include "modules/friends_list.php";
	} else {
		echo "<h3>Ошибка</h3>";
	}

}

?>