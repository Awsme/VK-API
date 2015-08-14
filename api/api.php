<?php
    class Vkapi {
        private $client_id     = '5028334'; // ID app
        private $client_secret = '3qQyJmeL1YTph708Yp1q';
        private $redirect_uri  = 'http://localhost/vkapi'; // address site
        private $url           = 'http://oauth.vk.com/authorize?';

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
            'client_id'     => $client_id,
            'scope'         => 'notify,friends,photos,notes,wall,offline',
            'redirect_uri'  => $redirect_uri,
            'response_type' => 'code'
        );

        echo $link = '<a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a>';
    }

    function run() {
        if (isset($_GET['code'])) {
            $result = false;
            $params = array(
                'client_id'     => $this->$client_id,
                'scope'         => 'notify,friends,photos,wall,offline',
                'client_secret' => $this->$client_secret,
                'code'          => $_GET['code'],
                'redirect_uri'  => $this->$redirect_uri
            );

            $token = json_decode($this->url_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

            $id = '95366042';
            $text = "Hello!";

            if (isset($token['access_token'])) {
                $params = array(
                    'uids'         => $token['user_id'], // Записываем ID пользователя
                    'fields'       => 'uid,first_name,last_name,photo', // fields for get info user
                    'access_token' => $token['access_token']
                );

                $userInfo = json_decode(url_get_contents('https://api.vk.com/method/friends.get' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['response'][0]['uid'])) {
                    $result = true;
                }
            }

            if ($result) {
                foreach ($userInfo['response'] as $key => $value) {
                    ?>
                        <li>
                            <input type="checkbox" name="user_id" id="user_id" value="<?php echo $value['uid']?>">
                            <img src="<?php echo $value['photo']?>" alt="<?php echo $value['last_name']?>">
                            <a href="#"><?php echo $value['first_name']; ?><br><?php echo $value['last_name']; ?></a>
                        </li>
                    <?php
            }
        }
    }
    }
    function echoing() {

        if (isset($_POST['user_id'])){
            $asd = $_POST['user_id'];
            $text = "Hello";
            $sRequest = "https://api.vkontakte.ru/method/wall.post?owner_id=$asd[0]&access_token=$this->access_token&message=$text";
            $oResponce = json_decode($this->url_get_contents($sRequest));                   
        } else {
            var_dump("sss");
        }
       return $asd;

    }
    

}
