<?php
include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] .'/configs/add-ons.php';

/*=================
отправка сообщения выбранному пользователю
==================*/
// заносим в переменную форматы файлов какие можно загружать на сервер чтобы проверять не вирус ли
$types = array('image/gif', 'image/png', 'image/jpeg');	

// заносим в переменную максимальный размер файла в байтах
$size = 1024000;


if(
	isset($_POST["send"]) && 
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

	$sqlm = "INSERT INTO messages (user_id, user_id_2, message, photo) VALUES ('" . $_POST["user_id"] ."', '" . $_POST["user_id_2"] . "', '" . $_POST["text"] . "', '" . $photo . "')";
	if(mysqli_query($connect, $sqlm)) {
		// echo "<h3>Сообщение добавлено</h3>";
		// header("Location: /");
		
	} else {
		echo "<h3>Произошла ошибка</h3>" . mysqli_error($connect);
	}

} elseif (
	isset($_POST["send"]) 
) {
	$sqlm = "INSERT INTO messages (user_id, user_id_2, message) VALUES ('" . $_POST["user_id"] ."', '" . $_POST["user_id_2"] . "', '" . $_POST["text"] . "')";
	if(mysqli_query($connect, $sqlm)) {
		// echo "<h3>Сообщение добавлено</h3>";
		// header("Location: /");
		
	} else {
		echo "<h3>Произошла ошибка</h3>" . mysqli_error($connect);
	}
}


// $user_id_2 = $_POST["user_id_2"];
// $user_id = $_POST["user_id"];


?>

	<ul  id="message-list">
		<?php
		if(isset($_GET["user"]) || isset($user_id_2)) {
			$get_user_id= null;

			if(isset($_GET["user"])) {
				$get_user_id = $_GET["user"];
			} else {
				$get_user_id = $user_id_2;
			}

			$sql = "SELECT * FROM messages" .
				" WHERE (user_id_2 =" .  $get_user_id . 
				" AND user_id = " . $user_id . ")" .
				" OR (user_id_2 = " . $user_id . " AND user_id = ".  $get_user_id . ")";

			$result = mysqli_query($connect, $sql);
			$col_messages = mysqli_num_rows($result);
			
			$i = 0;
			while ($i < $col_messages) {
				$message =mysqli_fetch_assoc($result);
				
					if(isset($_COOKIE["polzovatel_id"])) {
						$sql2 = "SELECT * FROM polzovateli WHERE id = " . $message["user_id"];
						$result2 = mysqli_query($connect, $sql2);
						$polzovatel = mysqli_fetch_assoc($result2);


						$sql3 = "SELECT * FROM polzovateli WHERE id =" . $_COOKIE["polzovatel_id"];
						$result3 = mysqli_query($connect, $sql3);
						$polzovatel_registr = mysqli_fetch_assoc($result3); 


					?>
					<li id="message-li" class="<?php if( $polzovatel_registr["id"] == $message["user_id"]){ ?> message-right <?php } ?>">
						
						<?php
							
							
							?>
						<a href="#" class="messages-avatar">
						          <img src="data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>">
						</a>
						
						<div class="messages-list-text" id="messages-list-text">
							
							
							<a href="#" class="messages-list-link" id="messages-list-link"><?php echo $polzovatel["name"]; ?></a>
							<div>
								<p><?php echo $message["message"]; ?></p>
								<div id="message-photo-link" onclick="messagePhotoLink(this)">
									<img src="data:image/jpeg;base64,<?php echo base64_encode($message["photo"]); ?>" style="max-width: 100%">
									<!-- <div class="messages-overlay">
										<i class="fa fa-expand" aria-hidden="true"></i>
									</div> -->
								</div>
							</div>
							

							<div class="messages-clock"><?php echo $message["time"]; ?></div>

							
							<div   class="messages_window" >
								<ul>
									<li  data-id="<?php echo $message["id"]; ?>"  id="messages_modal" title="Удалить сообщение" onclick="messagesModal(this)"> Удалить сообщение</li>
									<li id="messages_send" title="Переслать сообщение" >Переслать сообщение</li>
								</ul> 
							</div>
						</div>
						


						<?php
						 ?>
						

					</li>

					<?php
					}
				$i ++;
			}
			} else {
				echo "<h3>Сообщений нет</h3>";
				
			}
		?>	
		
	</ul>

<div class="modal-message" id="modal-message">						
	<div class="content">
		<h3>Удалить это сообщение?</h3>

		<form acttion="delete_messages.php" method="POST">
			<div class="message-checkbox">
		        <label>
		            <input type="hidden" name="message_id" id="messageId">
		           <input type="checkbox" name="checkbox" class="checkbox_input">
		          <p class="checkbox_text">
		            Удалить всё этого пользователя?
		          </p>
		        </label>
		    </div>
			<div class="message-btn">
				<button class="message-close-btn" >Отмена</button>
				
				<button type="submit" name="message-delete-btn" title="Удалить сообщение" class="message-delete-btn" id="message-delete-btn" > Удалить</button>
			</div>	
		</form>
		
	</div>

</div>