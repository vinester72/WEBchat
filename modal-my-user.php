<?php

include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] .'/configs/add-ons.php';


if(isset($_COOKIE["polzovatel_id"])) {
?>

<div class="modal-my-user" id="modal-my-user">
	<?php
	
	?>
	<div class="content-us">
		<div class="modal-my-user-backgound">
			<div class="close">+</div>
			
			<div class="modal-my-user-photo">
				<img src="data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>">
			</div>
			<div class="modal-my-user-data">
				<p class="modal-my-user-name"><?php echo $polzovatel["name"]; ?></p>
				<p class="modal-my-user-phone"><?php echo $polzovatel["phone"];?></p>
				<p class="modal-my-user-email"><?php echo $polzovatel["email"];?></p>
			</div>
			
		</div>
		<button class="modal-my-user-change" id="modal-my-user-change">
			<i class="fa fa-info-circle" aria-hidden="true"></i>
			<p>Изменить профиль</p>
		</button>
		<button class="modal-my-user-change" id="modal-my-user-messages">
			
			<i class="fa fa-bell" aria-hidden="true"></i>
			<p>Уведомления</p>
		</button>
		<button class="modal-my-user-group">
			<i class="fa fa-users" aria-hidden="true"></i>
			<p>Создать группу</p>
		</button>
		<button class="modal-my-user-contact" id="my-user-contact" type="submite" >
				<i class="fa fa-user" aria-hidden="true"></i>
				<p>Контакты</p>
		</button>
		<button class="modal-my-user-delete">
			<i class="fa fa-phone" aria-hidden="true"></i>
			<p>Звонки</p>
		</button>
		<button class="modal-my-user-delete">
			<i class="fa fa-wrench" aria-hidden="true"></i>
			<p>Настройки</p>
		</button>
	</div>
	<?php

	?>

	<a href="/" id="logo" class="modal-my-user-logo" title="На главную">
		<i class="fa fa-paper-plane" aria-hidden="true"></i>
		<p><span>WEB</span>chat</p>
	</a>

</div>
<?php
}
?>


<div class="modal-my-profile" id="modal-my-profile">
	<div class="close" title="Закрыть">+</div>
	<div class="close-back" title="Изменить профиль">
		<i class="fa fa-arrow-left" aria-hidden="true"></i>

	</div>
	<?php
	if(isset($_COOKIE["polzovatel_id"])) {
		$sql = "SELECT * FROM polzovateli WHERE id =" . $_COOKIE["polzovatel_id"];
		$result = mysqli_query($connect, $sql);
		$polzovatel = mysqli_fetch_assoc($result);
		// var_dump($row);
	?>
	
	<div class="content">
				 <?php
				
				?>	
		
				<div class="modal-my-profile-backgound">
					<div class="modal-my-profile-photo">
						<img src="data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>">
					</div>
					<form id="my-profile-upload" action="" class="my-profile_form" action="" method="POST" >
						<div id="input-btn">
							<input type="file" name="my-photo" class="form-control-img" id="file-input" multiple ></input>
							<label for="file-input">Выберите фото</label>
						</div>
						<div class="change-my-photo" id="change-my-photo">
							<label>Замена фото:</label>
							<div class="modal-my-profile-photo" id="modal-my-profile-photo">
								<img src="data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>">
				
							</div>
							<div class="change-my-photo-btn">
								<div  id="my-profile-photo-exit">
									Отмена
								</div>
								<button type="submit" name="send_photo" id="my-profile-photo-save">
									Сохранить
								</button>
							</div>
						</div>
					</form>
				</div>


				 <?php
				if (isset($_POST["send_name"]) && isset($_COOKIE["polzovatel_id"])) {
					$sql1 = "UPDATE `polzovateli` SET `name` = '" . $_POST["name"] . "'   WHERE `polzovateli`.`id` = " . $_COOKIE["polzovatel_id"];
					 mysqli_query($connect, $sql1);

				}
				?>	
				<button class="modal-my-profile-name" type="submite" id="modal-my-profile-name">
					<i class="fa fa-user" aria-hidden="true"></i>
					<label>
						<p style="text-align: left;">Имя: </p>
						<p class="modal-my-user-name" style="line-height: 0.8em"> <?php echo $polzovatel["name"]; ?></p>
					</label>
				</button>

				<div class="change-my-name" id="change-my-name">
					<form action="" method="POST"  id="change-my-name-form">
						<label>Редактирование имени:</label>
						<input type="text" name="name" value="<?php echo $polzovatel["name"]; ?>">
						<div class="change-my-name-btn">
							<div  id="my-profile-name-exit">
								Отмена
							</div>
							
							<button type="submit" name="send_name" id="my-profile-name-save">
								Сохранить
							</button>
						</div>
					</form>
				</div>

				 <?php
				if (isset($_POST["send_email"]) && isset($_COOKIE["polzovatel_id"])) {
					$sql2 = "UPDATE `polzovateli` SET `email` = '" . $_POST["email"] . "'   WHERE `polzovateli`.`id` = " . $_COOKIE["polzovatel_id"];
					 mysqli_query($connect, $sql2);

				}
				?>	
				<button type="submite" class="modal-my-profile-email" id="modal-my-profile-email">
					<i class="fa fa-at" aria-hidden="true"></i>
					<label>
						<p style="text-align: left;">Email:</p>
						<p class="modal-my-user-email"><?php echo $polzovatel["email"]; ?></p>
						
					</label>
				</button>

				<div class="change-my-email" id="change-my-email">
					<form action="" method="POST" enctype="multipart/form-data" id="change-my-email-form">
						<label>Редактирование email:</label>
						<input type="text" name="email" value="<?php echo $polzovatel["email"]; ?>">
						<div class="change-my-email-btn">
							<div  id="my-profile-email-exit">
								Отмена
							</div>
							
							<button type="submit" name="send_email" id="my-profile-email-save">
								Сохранить
							</button>
						</div>
					</form>
				</div>
				
				 <?php
				if (isset($_POST["send_phone"]) && isset($_COOKIE["polzovatel_id"])) {
					$sql3 = "UPDATE `polzovateli` SET `phone` = '" . $_POST["phone"] . "'   WHERE `polzovateli`.`id` = " . $_COOKIE["polzovatel_id"];
					 mysqli_query($connect, $sql3);

				}
				?>		
				<button type="submit" class="modal-my-profile-phone" id="modal-my-profile-phone">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<label>
						<p style="text-align: left;">Phone:</p>
						<p class="modal-my-user-phone"><?php echo $polzovatel["phone"];?></p>
					</label>
				</button>

				<div class="change-my-phone" id="change-my-phone">
					<form action="" method="POST" enctype="multipart/form-data" id="change-my-phone-form">
						<label>Редактирование phone:</label>
						<input type="text" name="phone" value="<?php echo $polzovatel["phone"];?>">
						<div class="change-my-phone-btn">
							<div  id="my-profile-phone-exit">
								Отмена
							</div>
							
							<button type="submit" name="send_phone" id="my-profile-phone-save">
								Сохранить
							</button>
						</div>
					</form>
				</div>
				
				<button class="modal-my-profile-password" type="submit" id="modal-my-profile-password">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<label>
						<p>Изменить пароль</p>
					</label>
				</button>
					
			    <div class="change-my-password" id="change-my-password">
					<form action="modal-my-user.php" method="POST" enctype="multipart/form-data" id="change-my-password-form">
						<label>Смена пароля:</label>
						<input type="password" name="password" autocomplete="current-password" placeholder="Введите старый пароль:" minlength="4">
						<input type="password" name="new-password" placeholder="Придумайте новый пароль:" minlength="4" size="6">
						<input type="password" name="new-password" placeholder="Новый пароль ещё раз:" minlength="4" size="6">
						<div class="change-my-password-btn">
							<div  id="my-profile-password-exit">
								Отмена
							</div>
							
							<button type="submit" id="my-profile-password-save">
								Сохранить
							</button>
						</div>
					</form>
				</div> 
				
	</div>
	<?php
	}
	?>
	<a href="/" id="logo" class="modal-my-user-logo " title="На главную">
		<i class="fa fa-paper-plane" aria-hidden="true"></i>
		<p><span>WEB</span>chat</p>
	</a>	
	
</div>
