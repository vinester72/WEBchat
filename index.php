<?php
include "configs/db.php";
include "configs/add-ons.php";

if($user_id == null) {
	header("Location: /login.php");
}


?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $nameSite ?></title>
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
	<?php
	include "chasti_site/header.php";	
	?>
	
	<section class="bg">
		<div class="container">
			<div id="content">
				<div id="users">
					<div class="search_block">
						<a href="#" id="my-user-btn">
							<img src="img/gamburger.png">
						</a>
						<?php
						include $_SERVER['DOCUMENT_ROOT'] .'/modal-my-user.php';	

						if(isset($_GET["user"])) {
						?>
						<form action="http://chat_2.local/modules/list.php" method="POST" id="search" class="search">
							<input type="text" name="search-text" placeholder="поиск">
							<button>
								<img src="img/search.png" alt="search">
							</button>
						</form>
						<?php
						 } else {
						 ?>
						 <form action="http://chat_2.local" method="POST" id="search" class="search">
							<input type="text" name="search-text" placeholder="поиск" >
							<button>
								<img src="img/search.png" alt="search">
							</button>
						</form>
						 <?php	
						 }
						?>
					</div>
					<div class="choice">
						<a href="#">
							<p>
								Избранные
							</p>	
							<span>
								^
							</span>
						</a>
					</div>	
					<div id="list">
					<?php
					/*
					Список пользователей
					*/
					include "modules/list.php";
					?>
					</div>
				</div>
				<div id="messages"> 
					
					<div class="messages-menu">
						<?php 
					if(isset($_GET['user'])) {
						$sql = "SELECT * FROM polzovateli WHERE id = " . $_GET["user"];
						$result = mysqli_query($connect, $sql);
						$polzovatel = mysqli_fetch_assoc($result);
						
					?>

						<a href="" class="">
							<div class="messages-menu-avatar">
								<img src="data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>">
							</div>
							<div class="messages-menu-text">
								<h3>
									<?php echo $polzovatel["name"] ?>
								</h3>
								<a href="#"><?php echo $polzovatel["phone"] ?></a>
							</div>
						</a>
						<div class="messages-menu-contacts">
							<a href="#" title="Добавить учасников">
								<i class="fa fa-user-plus"></i>
							</a>
							<a href="#" title="Вызов">
								<i class="fa fa-phone-volume"></i>
							</a>
							<a href="#" title="Видеозвонок" >
								<i class="fa fa-video"></i>
							</a>
							<a href="#" id="user-contact" title="Подробности">
								<i class="fa fa-info-circle"></i>
							</a>
						</div>
						<?php
				
						}
						?>

					</div>
					<div id="messages-list" class="messages-list">
					<?php
					/*
					Список сообщений
					*/
					 
						include $_SERVER['DOCUMENT_ROOT'] .'/modules/messages-list.php';
					?>	
						
					</div>
					<?php
					if(isset($_GET["user"])) {
					?>	
					<div id="messages-form">
						<form action="" method="POST" enctype="multipart/form-data" id="messages__form" >

							<div id="message_photo_upload" title="Прикрепить файл">
								<input type="file" name="photo" id="message_photo_input">
								<label for="message_photo_input">
									<i class="fa fa-paperclip" aria-hidden="true"></i>
								</label>
							</div>	
							
							<input type="hidden" name="user_id_2" value="<?php echo $_GET["user"]; ?>">
							<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
							<textarea name="text" placeholder="Написать сообщение..."></textarea>
							<button type="submit" name="send"  class="send" title="Послать сообщение" id="send-sms">
								<i class="fa fa-paper-plane" aria-hidden="true"></i>
							</button>
						</form>
						
					</div>
					<?php
					}
					?>
					
				</div>
			</div>
		</div>
	
	</section>

	<?php
		include "modules/contacts.php";
	?>
	<div id="full-image"></div>
	<div id="overlay"></div>
	<script src="js/modal.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
