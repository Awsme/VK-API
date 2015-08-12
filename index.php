<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>VK API</title>
    
    <!-- // <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?34"></script> -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans" />

</head>

<body>

    <?php

    function url_get_contents($Url) {
        if (!function_exists('curl_init')){ 
            die('CURL is not installed!');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_PROXY, '192.168.5.111:3128');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    $client_id = '5028334'; // ID приложения
    $client_secret = '3qQyJmeL1YTph708Yp1q'; // Защищённый ключ
    $redirect_uri = 'http://vkapi'; // Адрес сайта

    $url = 'http://oauth.vk.com/authorize?';

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code'
    );

    echo $link = '<p><a href="' . $url . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';

	if (isset($_GET['code'])) {
    $result = false;
    $params = array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $_GET['code'],
        'redirect_uri' => $redirect_uri
    );

    $token = json_decode(url_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) {
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_100',
            'access_token' => $token['access_token']
        );

        $userInfo = json_decode(url_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
        if (isset($userInfo['response'][0]['uid'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;
        }
    }

    if ($result) {
        echo "Социальный ID пользователя: " . $userInfo['uid'] . '<br />';
        echo "Имя пользователя: " . $userInfo['first_name'] . '<br />';
        echo "Ссылка на профиль пользователя: " . $userInfo['screen_name'] . '<br />';
        
        echo "Пол пользователя: " . $userInfo['sex'] . '<br />';
        echo "День Рождения: " . $userInfo['bdate'] . '<br />';
        echo '<img src="' . $userInfo['photo_100'] . '" />'; echo "<br />";
    }
}
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
					</div>
					<!-- https://oauth.vk.com/blank.html -->
					<!-- e668b7f279294fe2e1 -->
					<a href="https://oauth.vk.com/authorize?client_id=5028334&scope=offline,friends,wall&redirect_uri=https://oauth.vk.com/blank.html &display=page&v=3.0&response_type=token">Autorize</a><br>
					<a href="https://api.vk.com/method/wall.post?owner_id=95366042&message=ТУТ_ТЕКСТ&v=5.0&access_token=d38528409ed240818f61d8115eceb85a66d20b12a759368a3ab2e439851b62520d29134cc8955b2a9b748">Post</a><br>
					<a href="https://api.vk.com/method/account.getAppPermissions?access_token=d38528409ed240818f61d8115eceb85a66d20b12a759368a3ab2e439851b62520d29134cc8955b2a9b748">AAAA</a><br>
					<a href="https://api.vk.com/method/friends.get?user_id=95366042&v=5.36&access_token=d38528409ed240818f61d8115eceb85a66d20b12a759368a3ab2e439851b62520d29134cc8955b2a9b748">friends.get</a>
				</div>
			</div>
		</div>
	</div>
	
	
</body>
</html>