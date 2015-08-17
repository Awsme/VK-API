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
	<div class="wrapper">
		<div class="container">
			<div class="content-center">
				<img src="img/logo-tm.png" alt="TemplateMonster" class="tm-logo">
				<h1 class="header--title">Денежная стена Вконтакте</h1>
				<h3 class="header--title__descr">Рекомендуйте шаблоны друзьям и зарабатывайте 1.000.000</h3>
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB0AAAAzCAYAAABrNQNJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpCNzA1OTVCN0Y5QTBFMjExQjBEOUE3RjY5QTY5MTBBNCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpERDhCOTkyNDQwMEExMUU1QjgyNDhCQTlFMkY3OUVFRiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpERDhCOTkyMzQwMEExMUU1QjgyNDhCQTlFMkY3OUVFRiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo1OTBGRjYwNDVGM0JFNTExOUNGNzgwOEZBRThBREI5RiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpCNzA1OTVCN0Y5QTBFMjExQjBEOUE3RjY5QTY5MTBBNCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PnwrhfYAAALFSURBVHja7JhPSBRxFMenQQhZhAhT9hDGEhFFVAQLGdHBWxRBpojIXjoo0SG8JvTvXF1CqOiyRCyFB+vYSagNFjtEBCEReRJNvIgsgSx9n31fPKaZ2dl1flQwDz47zG9/v/f9/ZvfzHs7SsMXvQTWAYrgFNgPukAeLIF18AW8BTWwmcRZnHWCMXAB5EL+z5MD4CzYALPgKahHOfVjBM+AMhiNEAyzHOuX2b6lkY6A8UDZD/CeU/gdrIJusIdTfwLsZF0pvwkegkoS0StgKCAm0zUTMmULvM5yKQa5HCouHd8NpuOmdzAg+BmUmq0Rrc56JbZTG6LfUNECmDD382ASrHit2QrbzZuyCfr/Q/Same5FMBUzOvnvNa9Ro56iH13GyaBoPzhi1vAGr1E2QEcDMXWCfg5T57fosKn80vRwu7ZIf2qXVLQHHDW9q3jpWsWMVnS6RPSkqfAGrKUsuka/Osii/BwyFT56bsz63RItBB4TF2b9FkS0lzebfGu4sCXz9un1eXzps9VwJNowz3zONwdC3XNr6t/3vb9gmeg/KVrlI1Btp3FHm6LXszXNRDPRTDQT/f9EGybqdmnqv+EzZNdC3+HgVHRDbpbNay7vSDRvXqPLfiBYOu5I1Pr96gc++Y85ErV+ayL6zhT0M0eQpu3SuJSbdktUwvUPZjONpCw6ajbRJ7Cuu/W5qXQO9KUkuJf+1Gbs4VA1GRHp1S2TlmnXpP0dM0rxPxc8ke6ayEpGensbB0Yn2/eZiPB+2DEoScVHNngF95geaMV62K5oysTvQtTZ+4KoHfR+5fnGEoxak5dltovyGfqxPc08wbhZm8t0WCOrrCOPVzdHVQzZB4/Bs6Rf+BVGz1fpVMVPk2YmnXqgG6eVsGKOo5Jc33kvWfpVXh6vOMX1dmMZaSjp0yecPsnh7jPTqtP8zXSyaWb7pwADAGhVlEz6CRpRAAAAAElFTkSuQmCC" alt="mouse" class="mouse-icon">
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
							<input type="checkbox" id="all_friends" checked>Отправить всем друзьям
							<script type="text/javascript">

							</script>
						</div>
						<div class="vkfriends">
							<ul id="vkapi">
								<div id="vk_auth"></div>
								<script type="text/javascript">
								VK.init({apiId: 5028334});
								VK.Widgets.Auth("vk_auth", {width: "492px", onAuth: function(data) {
									if(data.session) {
										document.getElementById("vk_auth").style.display = "none";
									}
									VK.Api.call('friends.get', {
									    fields: 'user_id, first_name, last_name, photo'
									}, function(s){
										if(s.response) {
											for(i = 0; i < s.response.length; i++){
												var friendUl = document.getElementById("vkapi");
												var friendList = document.createElement("li");
												var friendChecked = document.createElement("input");
												friendChecked.setAttribute("type", "checkbox");
												// if(document.getElementById("all_friends").checked){
												// 	friendChecked.setAttribute("checked", "");
												// }
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
											if(document.getElementById("all_friends").checked){
												friendChecked.setAttribute("checked", "");
											}
											var checkedList = [];
											for(i = 0; i < s.response.length; i++) {
												var checkedFriend = document.getElementById("id" + i);
												if(checkedFriend.checked) {
													checkedList.push(checkedFriend);
													console.log(checkedList);
												}
											}
								    	}	
									    
									});

								} });
							</script>
							</ul>
						</div>
					</div>
					<a href="#" class="show_example">Посмотреть пример</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>