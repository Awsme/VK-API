<?php
    class vkApi {
        public $client_id     = '5028334'; // ID app
        public $client_secret = '3qQyJmeL1YTph708Yp1q';
        public $redirect_uri  = 'http://vkapi'; // address site
        public $url           = 'http://oauth.vk.com/authorize?';

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

    function authorize_link(){
        $params = array(
            'client_id'     => $this->$client_id,
            'redirect_uri'  => $this->$redirect_uri,
            'response_type' => 'code'
        );
        echo $link = '<p><a href="' . $url . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
    }

   

    function run() {
        if (isset($_GET['code'])) {
            $result = false;
            $params = array(
                'client_id' => $this->$client_id,
                'client_secret' => $this->$client_secret,
                'code' => $_GET['code'],
                'redirect_uri' => $this->$redirect_uri
            );

            $token = json_decode($this->url_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

            if (isset($token['access_token'])) {
                $params = array(
                    'uids'         => $token['user_id'], // Записываем ID пользователя
                    'fields'       => 'uid,first_name,last_name,photo', // fields for get info user
                    'access_token' => $token['access_token']
                );

                $userInfo = json_decode(url_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['response'][0]['uid'])) {
                    $userInfo = $userInfo['response'][0];
                    $result = true;
                }
            }

            if ($result) {
                echo "Имя пользователя: " . $userInfo['first_name'] . '<br />';
                echo '<img src="' . $userInfo['photo'] . '" />'; echo "<br />";
            }
         }
    } // The end of run function
    
} // The end of vkApi class
?>