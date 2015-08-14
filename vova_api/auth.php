<?php
class Authentication {

	private $client_id = '5028334'; // ID приложения
	private $client_secret = '3qQyJmeL1YTph708Yp1q'; // Защищённый ключ
	private $redirect_uri = 'http://vkapi/vova_api'; // Адрес сайта
    private $url = 'http://oauth.vk.com/authorize';

	function url_get_contents ($Url) {
	    if (!function_exists('curl_init')){ 
	        die('CURL is not installed!');
	    }
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $Url);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $output = curl_exec($ch);
	    curl_close($ch);
	    return $output;
	}

	function set_authentication_button() {
		$params = array(
	        'client_id'     => $this->client_id,
	        'scope'         => 'notify,friends,photos,notes,wall,offline',
	        'redirect_uri'  => $this->redirect_uri,
	        'response_type' => 'code'
    	);

    	echo $link = '<a href="' . $this->url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a>';
    }

    function run() {
    	if (isset($_GET['code'])) {
		    $result = false;
		    $params = array(
		        'client_id' => $this->client_id,
		        'scope'         => 'notify,friends,photos,notes,wall,offline',
		        'client_secret' => $this->client_secret,
		        'code' => $_GET['code'],
		        'redirect_uri' => $this->redirect_uri
		    );

		    $token = json_decode($this->url_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

		    $id = '5888733';
		    $text = "Hello!";

		    if (isset($token['access_token'])) {
		        $params = array(
		            'uids'         => $token['user_id'],
		            'fields'       => 'uid,first_name,last_name,photo',
		            'access_token' => $token['access_token']
		        );
		        $userInfo = json_decode($this->url_get_contents('https://api.vk.com/method/friends.get' . '?' . urldecode(http_build_query($params))), true);
		        if (isset($userInfo['response'][0]['uid'])) {
		            $result = true;
		        }
		    }


		    if ($result) {
		    	foreach ($userInfo['response'] as $key => $value) {
		    		?>
		    		<li>
		    			<input name="user_id" id="user_id" type="checkbox" value="<?php echo $value['uid']; ?>">
		    			<img class="photo" src="<?php echo $value['photo']; ?>">
		    			<?php echo $value['first_name'];?> <br> <?php echo $value['last_name']; ?>
			        </li>
			        <?php
		    	}
		        
		    }
    	}
	}
	function echoing() {
		if (isset($_POST['user_id'])){
			$asd = $_POST['user_id'];
			return $asd;
		}
	}
}
?>