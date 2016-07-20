<html>
	<head>
		<title>form</title>
		<meta charset="utf-8">
		<link rel="stylesheet" media="screen" href="css/style.css" >
	</head>
		<body>
		<?require_once 'code/includes/main.php';

			$user = new User();

			if(!$user->loggedIn()){
			redirect('code/index.php');
			}
		?>
		<!--<?php //include('view/menu.php');?>-->
			<div id="mainmenu">
					<ul id="nav">
						<li><a href="?view=about" class="active">Отзывы о нас</a>
							<ul>
								<li><a href="?view=gallery">Галерея</a></li>
								<li><a href="?view=history">История</a></li>
							</ul>
						</li>	

						<li><a href="?view=contacts">Контакты</a></li>
					</ul><!----END MENU-------------->
				</div>
			</div>
			<div id="contener">
				<h2><?php
						$itemId = isset($_GET['view']) ? $_GET['view'] : 'about'; // выбранный пункт меню
						$menuItems = array( // все пункты меню
								'about' => 'Отзывы о нас',
								'gallery' => 'Галерея',
								'history' => 'История',
								'contacts' => 'Контакты'
						);
					echo ($menuItems[$_GET['view']]);?>

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
							
							default: include("view/about.php");
						}
						?>
					
			</div>
		</body>
</html>