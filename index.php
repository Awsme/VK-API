<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>VK API</title>
    
    <!-- // <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?34"></script> -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

	
</head>

<body>
<!-- Форма №1 для модального окна -->
    <a href="#x" class="overlay" id="login_form"></a>
    <div class="popup">
        <h3 class="conclusion_title">Подведем итоги</h3>
        <p>Удалось опубликовать <b>24 сообщения<b> на стенах ваших друзей.</p>
        <h3>Каждая покупка принесет вам <span>30%</span> от чека.</h3>
        <p>Рекомендуем не сидеть сложа руки и отправить письмо по списку ваших контактов в почте.</p>
        <a href="#">Отправить письмо</a>
        <a class="close" href="#close"></a>
    </div>
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
					</div>
					<div class="vkapi">	
						<div class="checkbox">
							<input type="checkbox" name="user_id" id="all_friends">Отправить всем друзьям
						</div>
						<div class="vkfriends">
							<ul id="vkapi">
								<div id="vk_auth"></div>
								<script type="text/javascript">
								VK.init({apiId: 5028334});
									console.log("test");

								VK.Auth.getLoginStatus(function(response){
									if (!response.session) {
										VK.Widgets.Auth("vk_auth", {width: "492px"});
									}
								});
								/*function authInfo(response) {
									if (response.session) {
										console.log('user: '+response.session.mid);
									} else {
										console.log('not auth');
									}
								}
								VK.Auth.getLoginStatus(authInfo);*/
								VK.Api.call('friends.get', {
										fields: 'user_id, first_name, last_name, photo'
									}, function(s){
									if(s.response) {
										for(i = 0; i < s.response.length; i++){
											var friendUl = document.getElementById("vkapi");
											var friendList = document.createElement("li");
											var friendChecked = document.createElement("input");
											friendChecked.setAttribute("type", "checkbox");
											friendChecked.setAttribute("name", "user_id");
											friendChecked.setAttribute("id", "id" + i);

											var friendImage = document.createElement("img");
											friendImage.setAttribute("src", s.response[i].photo);
											friendImage.setAttribute("alt", s.response[i].last_name);

											var friendLink = document.createElement("p");
											var friendName = document.createTextNode(s.response[i].first_name + " " + s.response[i].last_name);
									
											friendLink.appendChild(friendName);

											friendList.appendChild(friendChecked);
											friendList.appendChild(friendImage);
											friendList.appendChild(friendLink);

											friendUl.appendChild(friendList);
										}
										// var checkedList = [];
										// for(i = 0; i < s.response.length; i++) {
										// 	var checkedFriend = document.getElementById("id" + i);
										// 	if(checkedFriend.checked) {
										// 		checkedList.push(checkedFriend);
										// 		console.log(checkedList);
										// 	}
										// }
							    	}	
								    
								});

								$('#all_friends').on('click', function(event) {
									if($(this).is(":checked")) {
										$('input[name="user_id"]').prop({
											checked:true
										})
									}
									else{
										$('input[name="user_id"]').prop({
									     checked: false
									    });
									}
								})
							</script>
							</ul>
						</div>
					</div>
					<a href="#login_form" class="show_example" id="login_pop">Посмотреть пример</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
