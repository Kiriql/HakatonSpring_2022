<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">

<head>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>

    <title>Аутентификация через Yandex</title>

</head>

<body>

<?php

$client_id = '68cec92b4af64cdf9533db086201ba32'; // Id приложения

$client_secret = '31c6cfd924d74f20873e8a672e7a4a2b'; // Пароль приложения

$redirect_uri = 'http://hellohahat.beget.tech/allnice.html'; // Callback URI

 

$url = 'https://oauth.yandex.ru/authorize';

 

$params = array(

    'response_type' => 'code',

    'client_id'     => $client_id,

    'display'       => 'popup'

);

 

echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Yandex</a></p>';

 

if (isset($_GET['code'])) {

    $result = false;

 

    $params = array(

        'grant_type'    => 'authorization_code',

        'code'          => $_GET['code'],

        'client_id'     => $client_id,

        'client_secret' => $client_secret

    );

 

    $url = 'https://oauth.yandex.ru/token';

 

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);

    curl_setopt($curl, CURLOPT_POST, 1);

    curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $result = curl_exec($curl);

    curl_close($curl);

 

    $tokenInfo = json_decode($result, true);

 

    if (isset($tokenInfo['access_token'])) {

        $params = array(

            'format'       => 'json',

            'oauth_token'  => $tokenInfo['access_token']

        );

 

        $userInfo = json_decode(file_get_contents('https://login.yandex.ru/info' . '?' . urldecode(http_build_query($params))), true);

        if (isset($userInfo['id'])) {

            $userInfo = $userInfo;

            $result = true;

        }

    }

    if ($result) {
        
            echo "Социальный ID пользователя: " . $userInfo['id'] . '<br />';
        
            echo "Имя пользователя: " . $userInfo['real_name'] . '<br />';
        
            echo "Email: " . $userInfo['default_email'] . '<br />';
        
            echo "Пол пользователя: " . $userInfo['sex'] . '<br />';
        
            echo "День Рождения: " . $userInfo['birthday'] . '<br />';
        
        }
        
    
}

$_SESSION['user'] = $userInfo;

 

?>
</body>

</html>
