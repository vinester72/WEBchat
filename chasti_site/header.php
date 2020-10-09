<?php


?>


<header id="header">
		<div class="container">
			<div class="navigation" id="navigation">
				<a href="/" id="logo">
					<i class="fa fa-paper-plane" aria-hidden="true"></i>
					<p><span>WEB</span>chat</p>
				</a>
				<div id="menu">
					<a href="#" id="open-contact" class="open-contact">Контакты</a>
					<a href="#">Настройки</a>
					<?php
					if(isset($_COOKIE["polzovatel_id"])) {
						$sql = "SELECT * FROM polzovateli WHERE id =" . $_COOKIE["polzovatel_id"];
						$result = mysqli_query($connect, $sql);
						$polzovatel = mysqli_fetch_assoc($result); 
						

						?>
						<a href="exit.php" class="us" style="display: flex; align-items: center; padding: 9.5px 0 9.5px 20px">
							<div style="display: flex; align-items: center; padding-right: 20px">
								<div class="avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px">
									<img src='data:image/jpeg;base64,<?php echo base64_encode($polzovatel["photo"]) ?>'  style="width: 50px; height: 50px; border-radius: 50%">
									<span class="message-circle">0</span>
								</div>	
								<p style="margin-bottom: 2px">
									<?php echo $polzovatel["name"]; ?>
								</p>		
							</div>
							<img src="../img/exit_close.png" style="height: 40px; opacity: 1; border-radius: none" title="Выход">
						</a>
						<?php
					} else {
					?>
						<a href="login.php">Войти</a>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</header>