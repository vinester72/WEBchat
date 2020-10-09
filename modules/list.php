<?php

include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] .'/configs/add-ons.php';


?>

	<ul id="list-user">
		<?php

		if( isset($_POST["search-text"]) && ($_POST["search-text"]) !="") {
		$sql2 = "SELECT * FROM `polzovateli` WHERE `name` LIKE '%" . $_POST["search-text"] . "%' AND id != " . $_COOKIE["polzovatel_id"];

		} elseif (isset($_COOKIE["polzovatel_id"]))  {
		

		$sql2 = "SELECT * FROM polzovateli WHERE id != " . $user_id;
		}
			$result2 = mysqli_query($connect, $sql2);
			$col_polzovateli = mysqli_num_rows($result2);

			$sql = "SELECT * FROM messages";
			$result = mysqli_query($connect, $sql);
			$col_messages = mysqli_num_rows($result);
			$i = 0;
			
			while($i < $col_polzovateli) {
				//преобразует данные БД в понятный массив
				$polzovatel = mysqli_fetch_assoc($result2);
				$message = mysqli_fetch_assoc($result);
				
				?>
					<li>
						<a class="<?php if(isset($_GET['user']) && $_GET['user'] == $polzovatel["id"]){ ?> active <?php } ?>" href='/index.php?user=<?php echo $polzovatel["id"]; ?>' id='list-user'>
							<div class="avatar">
								<img src='data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>'>
							</div>	
							<div class="list-text">
								<h3><?php echo  $polzovatel["name"]; ?></h3>
								
								 <p><?php echo $message["message"]; ?></p>
								<div class="clock"><?php echo $message["time"]; ?></div>
							</div>
							<div class="list-user-window" >
								<button type="submit" class="list-user-window-delete" title="Удалить контакт" id="user-delete-btn">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</button>

								
								<button class="list-user-window-message" title="Отключить уведомления">
									<i class="fa fa-bell-slash" aria-hidden="true"></i>
								</button>
								
							</div>
						</a>		  
					</li>

				<?php
				$i = $i + 1;
			}
				
		?>
		
	</ul>

	
<?php
if(isset($_GET["user"])) {
$sql = "SELECT * FROM polzovateli WHERE id = " . $_GET["user"];
	$result = mysqli_query($connect, $sql);
	$polzovatel = mysqli_fetch_assoc($result);

?>

<div class="modal-user" id="modal-user">
	<div class="close">+</div>
	
	<div class="content">

		<div class="modal-user-photo">
			<img src="data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>">
		</div>
		<div class="modal-user-text">
			<h3>Имя: <?php echo $polzovatel["name"] ?></h3>
			<h3>Email: <?php echo $polzovatel["email"] ?></h3>
			<h3>Телефон: <?php echo $polzovatel["phone"] ?></h3>
		</div>


		<?php
		if(isset($_POST["send_btn"]) && $_GET["user"]) {
		$sql1 = "UPDATE `polzovateli` SET `name` = '" . $_POST["name"] . "' WHERE `polzovateli`.`id` = " . $_GET["user"];
		 	mysqli_query($connect, $sql1);
		          
		}
		?>
		<a href="#" class="modal-user-change" id="modal-user-change">
			<i class="fa fa-list-ul" aria-hidden="true"></i>
			<p>Изменить контакт</p>
		</a>

		<div class="change-user-name" id="change-user-name">
			<form action="http://chat_2.local/index.php?user=<?php echo $polzovatel["id"]; ?>" method="POST" enctype="multipart/form-data" id="change-user-name-form">
				<label>Переименовать контакт?</label>
				<div class="messages-menu-avatar modal-avatar">
					<img src='data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>'>
					<p>Телефон: <?php echo $polzovatel["phone"] ?></p>
				</div>

				<input type="text" name="name" value="<?php echo $polzovatel["name"]; ?>">
				<div class="change-my-name-btn">
					<div  id="us-profile-name-exit" class="us-profile-name-exit">
						Отмена
					</div>
					
					<button type="submit" name="send_btn" id="my-profile-name-save">
						Сохранить
					</button>
				</div>
			</form>
		</div>


		<?php 
		
			
		
		?>
		<a class="modal-user-delete" id="modal-user-delete-btn">
			<i class="fa fa-trash" aria-hidden="true"></i>
			<p>Удалить контакт</p>
		</a>
		<div class="delete-user-name" id="delete-user-name">
			<form action="http://chat_2.local/index.php?user=<?php echo $polzovatel["id"]; ?>" method="POST" enctype="multipart/form-data" id="delete-user-name-form">
				<label>Удалить контакт?</label>
				<div class="messages-menu-avatar modal-avatar">
					<img src='data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>'>
					<p>Телефон: <?php echo $polzovatel["phone"] ?></p>
				</div>

				<input type="text" name="name_" value="<?php echo $polzovatel["name"]; ?>">
				<div class="change-my-name-btn">
					<div  id="delete-profile-name-exit" class="us-profile-name-exit">
						Отмена
					</div>
					
					<button type="submit" name="send_btn" id="my-profile-name-save">
						Удалить
					</button>
				</div>
			</form>
		</div>


		<a class="modal-user-delete">
			<i class="fa fa-trash" aria-hidden="true"></i>
			<p>Очистить историю</p>
		</a>
		<a class="modal-user-delete">
			<i class="fa fa-lock" aria-hidden="true"></i>
			<p>Заблокировать</p>
		</a>
	</div>
	
</div>
<?php
}
?>