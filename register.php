<?php
	include "configs/db.php";
// заносим в переменную форматы файлов какие можно загружать на сервер чтобы проверять не вирус ли
$types = array('image/gif', 'image/png', 'image/jpeg');	

// заносим в переменную максимальный размер файла в байтах
$size = 1024000;


if(
	isset($_POST["submit"]) && 
	!empty($_FILES["photo"]["tmp_name"]) && 
	$_FILES["photo"]["size"] != 0 
   ){
	// проверяем что загружаемое изображение не вирус и соответствует формату если не соответствует то выводим сообщение
    if (!in_array($_FILES["photo"]["type"], $types)){
    //  // die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');
        echo "Запрещённый тип файла";
    }		// Проверяем размер файла, если файл больше то выводим сообщение
         if ($_FILES["photo"]["size"] > $size){
         die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
        }
	
 
	$photo =  addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));

	$sql = "INSERT INTO polzovateli (name, email, phone, password, photo) VALUES ('" . $_POST["name"] ."', '" . $_POST["email"] . "', '" . $_POST["phone"] . "', '" .  $_POST["password"] . "', '" . $photo . "')";
	if(mysqli_query($connect, $sql)) {
		echo "<h3>Пользователь добавлен</h3>";
	} else {
		echo "<h3>Произошла ошибка</h3>" . mysqli_error($connect);
	}
}



?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Регистрация</title>
	<meta name="description" content=">WEBchat">
	<meta name="keywords" content="WEBchat">
	<!-- Favicon -->
	<link rel="icon" href="/img/telegram.png" type="image/x-icon">
	<link rel="shortcut icon" href="/img/telegram.png" type="image/x-icon">
	<!--- Awesomes Fonts --->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="box-register" id="registration-modal">
        	<div style="display: flex; justify-content: space-between; align-items: center">
        		<h2 style="margin-left: 120px">
					РЕГИСТРАЦИЯ
				</h2>
				<a href="/" id="logo" style="display: flex;  margin-top: 0; width: 120px" title="На главную">
					<img src="img/telegram.png" alt="logo" style="width: 40px; height: 40px; margin-top: -10px; margin-left: auto;">
					
				</a>
				
        	</div>
        	
			
			<form action="register.php" method="POST" enctype="multipart/form-data">
				<p>
					Поля обязательные для ввода
				</p>
				<input type="text" name="name" placeholder="Имя" required="">
				<input type="text" name="email" placeholder="E-mail" required="">
				<input type="text" name="phone" placeholder="Телефон" required="">
				<input type="password" name="password" placeholder="Пароль" required="">
			
				<div id="upload-registr">
					<input type="file" name="photo" id="form-control-registr">
					<label for="form-control-registr">Выберите фото</label>
				</div>	
				
				<button class="registration-btn" type="submit" name="submit" >
					Зарегистрироваться
				</button>
				<a href="login.php" id="come-in"  class="reg-btn">
					Войти
				</a>
			</form>
    	</div>

</body>
</html>