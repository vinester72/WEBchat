<?php
	include "configs/db.php";


if(
	isset($_POST["submit"]) 
   ){
	
	$sql = "SELECT * FROM polzovateli WHERE name LIKE '" . $_POST["name"] . "' AND email LIKE '" . $_POST["email"] . "' AND password LIKE '" . $_POST["password"] . "'";
	
	$result = mysqli_query($connect, $sql);
	$col_polzovateli = mysqli_num_rows($result);
	if($col_polzovateli == 1) {
		$polzovatel = mysqli_fetch_assoc($result);
		setcookie("polzovatel_id", $polzovatel["id"], time() + 60*60);
		header("Location: /");
	} else {
		echo "<h3>Произошла ошибка. Логин или пароль введены не верно</h3>" . mysqli_error($connect);
	}
}



?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Авторизация</title>
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
				АВТОРИЗАЦИЯ
			</h2>
			<a href="/" id="logo" style="display: flex; margin-top: 0; width: 120px; " title="На главную">
				<img src="img/telegram.png" alt="logo" style="width: 40px; height: 40px; margin-top: -10px; margin-left: auto;">
			</a>
		
    	</div>
		<form action="login.php" method="POST" enctype="multipart/form-data">
			<p>
			Поля обязательные для ввода
		</p>	
			<input type="text" name="name" placeholder="Имя" required="">
			<input type="text" name="email" placeholder="E-mail" required="">
			
			<input type="password" name="password" placeholder="Пароль" required="">

			<button class="registration-btn" type="submit" name="submit" style="width: 170px">
				Авторизация
			</button>
			<a href="register.php" id="come-in"  class="reg-btn" style="margin-left: 200px">
				Зарегистрироваться
			</a>
		</form>
	</div>

</body>
</html>