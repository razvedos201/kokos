<?php session_start() ?>




<html>
	<head>
		<title>form</title>
		<meta charset="utf-8">
		<link rel="stylesheet" media="screen" href="css/style.css" >
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
		<body>
		
		<!--<?php //include('view/menu.php');?>-->
		<?php /* include('view/menu.php'); */ ?>
			<div id="mainmenu">
					<ul id="nav">

						<li><a href="?view=about" class="active">Отзывы о нас</a>
							<ul>
								<li><a href="?view=gallery">Галерея</a></li>
								<li><a href="?view=history">История</a></li>
							</ul>
						</li>	

						<li><a href="?view=contacts">Контакты</a></li>
						<li><a href="?view=register">Зарегестрироваться</a></li>
					</ul>
				</div>
			</div>

			<div id="hello">
				<?php
			
				if(isset($_SESSION['name'])){
					echo "Вы вошли как, ". $_SESSION['name']."<br>";
					echo '<div id="logform">
							<form action="controller/outlog.php" method="post">
									<input type="submit" name="exit" value="Выйти">
							</form></div>';
				}
				else{
					include("controller/login.php");
				}

				?>
			</div>


			<div id="contener">
				<h2><?php
				
						$itemId = isset($_GET['view']) ? $_GET['view'] : 'about'; // выбранный пункт меню
						$menuItems = array( // все пункты меню
								'about' => 'Отзывы о нас',
								'gallery' => 'Галерея',
								'history' => 'История',
								'contacts' => 'Контакты',
								'register'=>'Регистрация'
						);
					echo $menuItems[$itemId];?>

				</h2>
				
					<?php
						switch($_GET['view']) {

							case 'about':
							include("view/about.php");
							break;

							case 'contacts':
							include("view/contacts.php");
							break;

							case 'history':
							include("view/history.php");
							break;
							
							case 'gallery':
							include("view/gallery.php");
							break;

							case 'register':
							include("controller/register.php");
							break;

							default: include("view/about.php");
						}
						?>
					
			</div>
		</body>
</html>