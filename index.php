<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>VK API</title>
    
    <!-- // <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?34"></script> -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	<script type="text/javascript" src="http://userapi.com/js/api/openapi.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	
</head>

<body>
<?php 
	require_once "api/api.php";
	$api = new Vkapi();
?>
	<div class="wrapper">
		<div class="container">
			<div class="content-center">
				<img src="img/logo-tm.png" alt="TemplateMonster" class="tm-logo">
				<h1 class="header--title">Денежная стена Вконтакте</h1>
				<h3 class="header--title__descr">Рекомендуйте шаблоны друзьям и зарабатывайте 1.000.000</h3>
				<img src="img/mouse-icon.png" alt="mouse" class="mouse-icon">
				<div class="main-content">
					<div class="main-content--text">
						<h2 class="main-content--text__welcome">Привет!</h2>
						<p class="main-content--descr" align="left">Зарабатывать с <span class="main-content--descr__tm-blue">Template</span><span class="main-content--descr__tm-red">Monster</span> – мировым производителем шаблонов сайтов не только весело и увлекательно, но еще и очень просто.</p>
						<br>
						<br>
						<p class="main-content--descr" align="left">Представляем вашему вниманию инструмент, который позволит мгновенно разослать сообщения с вашей аффилиатской ссылкой по всем вашим друзьям вконтакте.</p>
						<br>
						<br>
						<p class="main-content--descr" align="left">Вам останется только проверять статистику и смотреть на то, как растет доход.</p>
					</div>
					<div class="main-content--backend">
						<h2 class="main-content--text__welcome">Поехали!</h2>
						<label for="no-login" class="main-content--backend__label">Ваш логин в партнерской программе TemplateMonster:</label>
						<a href="#" class="main-content--backend__no-login">Нет, логина?</a>
						<input name="no-login" class="main-content--backend__input" type="text" autocomplete="off">
						<label for="product" class="main-content--backend__label">Про какой продукт хотите рассказать: </label>
						<select name="no-login" class="main-content--backend__select" type="text" autocomplete="off">
							<option>Все шаблоны</option>
							<option>Wordpress шаблоны</option>
							<option>Monstroid</option>
							<option>Joomla шаблоны</option>
							<option>MotoCMS шаблоны</option>
							<option>PrestaShop шаблоны</option>
							<option>OpenCart шаблоны</option>
							<option>Magento шаблоны</option>
							<option>Woocommerce шаблоны</option>
							<option>HTML шаблоны</option>
						</select>
						<?php
							$api->authorize_link();
						?>
					</div>
					<form action="POST">
						<div class="vkapi">
							
								<div class="checkbox">
									<input type="checkbox" value="1" name="user_id" checked>Отправить всем друзьям
								</div>
								<div class="vkfriends">
									<ul>
										<?php
											$api->run();
										?>
										<li><input type="checkbox" checked><img src="img/photo.png" alt=""><a href="#">UserName<br>UserSurname</a></li>
										<li><input type="checkbox" checked><img src="img/photo.png" alt=""><a href="#">UserName<br>UserSurname</a></li>
										<li><input type="checkbox" checked><img src="img/photo.png" alt=""><a href="#">UserName<br>UserSurname</a></li>
										<li><input type="checkbox" checked><img src="img/photo.png" alt=""><a href="#">UserName<br>UserSurname</a></li>
										<li><input type="checkbox" checked><img src="img/photo.png" alt=""><a href="#">UserName<br>UserSurname</a></li>
										<li><input type="checkbox" checked><img src="img/photo.png" alt=""><a href="#">UserName<br>UserSurname</a></li>
										<li><input type="checkbox" checked><img src="img/photo.png" alt=""><a href="#">UserName<br>UserSurname</a></li>
										<li><input type="checkbox" checked><img src="img/photo.png" alt=""><a href="#">UserName<br>UserSurname</a></li>
									</ul>
								</div>
							
							
							<?php
								$api->echoing();
							?>
						</div>
					</form>
					<button type="submit" class="send_button"><span>Посмотреть пример</span></button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>