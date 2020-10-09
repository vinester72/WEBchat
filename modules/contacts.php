

<div class="modal" id="contacts-modal">
	<div class="search_block search_block_modal">
						
	<?php
	if(isset($_GET["user"])) {
	?>
	<form action="http://chat_2.local/modules/friends_list.php" method="POST" id="search-friend" class="search">
		<input type="text" name="search-text-modal" placeholder="поиск">
		<button type="submit" name="search-modal-btn" id="search-modal-btn">
			<img src="img/search.png" alt="search">
		</button>
	</form>
	<?php
	 } 
	 ?>
		
	</div>
	<div class="back" id="back-btn" title="На  профиль">
		<i class="fa fa-reply" aria-hidden="true"></i>
	</div>
	<div class="close">+</div>
	<div class="content">
		<ul id="friends-list">
			<?php
			include $_SERVER['DOCUMENT_ROOT'] .'/modules/friends_list.php';
			?>
		</ul>
	</div>
</div>