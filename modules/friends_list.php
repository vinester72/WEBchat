<?php
include $_SERVER['DOCUMENT_ROOT'] .'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] .'/configs/add-ons.php';
?>


<?php

if( isset($_POST["search-text-modal"]) && ($_POST["search-text-modal"]) !="") {
	$sql = "SELECT * FROM `polzovateli` WHERE `name` LIKE '%" . $_POST["search-text-modal"] . "%' AND id != " . $_COOKIE["polzovatel_id"];

	} elseif (isset($_COOKIE["polzovatel_id"]))  {
	
	$sql = "SELECT * FROM polzovateli WHERE id !=" . $user_id;
	}

	$result = mysqli_query($connect, $sql);
	$col_polzovateli = mysqli_num_rows($result);	
	$i = 0;
	while($i < $col_polzovateli) {
		$polzovatel = mysqli_fetch_assoc($result);
		?>
		<li>
			
			<div class="modal-avatar">
				<img src="data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>">
			</div>
			<div class="modal-list-text">
				<h3><?php echo $polzovatel["name"] ?></h3>
		    	<p><?php echo $polzovatel["email"] ?></p>
				
			</div>	 
			<?php
				$sql = "SELECT * FROM friends WHERE user_1 =" . $polzovatel["id"] . " AND user_2 =" . $user_id . " OR  user_1 =" . $user_id . " AND user_2 =" . $polzovatel["id"];

				$friendsResult = mysqli_query($connect, $sql);
				$col_friends = mysqli_num_rows($friendsResult);

				if($col_friends > 0) {
				?>
					<div data-link="http://chat_2.local/delete_friend.php?user_id=<?php echo $polzovatel["id"]; ?>" class="friends-link" onclick="deleteFriend(this)">Удалить из друзей -</div>
				<?php
				} else {
				?>
					<div data-link="http://chat_2.local/add_friend.php?user_id=<?php echo $polzovatel["id"]; ?>" class="friends-link" onclick="addFriend(this)">Добавить в друзья +</div>
				<?php
				}
			?>
			
		</li>
		<?php
		$i = $i +1;
		}
	?>
	