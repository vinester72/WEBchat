<?php 
include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';

/*=================
отправка сообщения выбранному пользователю
==================*/
// заносим в переменную форматы файлов какие можно загружать на сервер чтобы проверять не вирус ли
$types = array('image/gif', 'image/png', 'image/jpeg');	

// заносим в переменную максимальный размер файла в байтах
$size = 1024000;


// if(
// 	isset($_POST["send"]) && 
// 	!empty($_FILES["photo"]["tmp_name"]) && 
// 	$_FILES["photo"]["size"] != 0 
//    ){
// 	// проверяем что загружаемое изображение не вирус и соответствует формату если не соответствует то выводим сообщение
//     if (!in_array($_FILES["photo"]["type"], $types)){
//     //  // die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');
//         echo "Запрещённый тип файла";
//     }		// Проверяем размер файла, если файл больше то выводим сообщение
//          if ($_FILES["photo"]["size"] > $size){
//          die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
//         }
	
 
// 	$photo =  addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));

// 	$sql = "INSERT INTO messages (user_id, user_id_2, message, photo) VALUES ('" . $_POST["user_id"] ."', '" . $_POST["user_id_2"] . "', '" . $_POST["text"] . "', '" . $photo . "')";
// 	if(mysqli_query($connect, $sql)) {
// 		echo "<h3>Сообщение добавлено</h3>";
// 		header("Location: /");
	
// 	} else {
// 		echo "<h3>Произошла ошибка</h3>" . mysqli_error($connect);
// 	}

// } elseif (
// 	isset($_POST["send"]) 
// ) {
// 	$sql = "INSERT INTO messages (user_id, user_id_2, message) VALUES ('" . $_POST["user_id"] ."', '" . $_POST["user_id_2"] . "', '" . $_POST["text"] . "')";
// 	if(mysqli_query($connect, $sql)) {
// 		echo "<h3>Сообщение добавлено</h3>";
// 		header("Location: /");
		
// 	} else {
// 		echo "<h3>Произошла ошибка</h3>" . mysqli_error($connect);
// 	}
// }


// $user_id_2 = $_POST["user_id_2"];
// $user_id = $_POST["user_id"];

// include $_SERVER['DOCUMENT_ROOT'] .'/modules/messages-list.php';

?>