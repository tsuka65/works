<?php

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '{c679689a309540a4b257a20d901b19a3}',
    '{d5880bf84e954881aaf11833585f8294}',
    '{"D:\D_Work\A213\xampp\htdocs\music\index.php"}'
);
$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());
} else {
    header('Location: ' . $session->getAuthorizeUrl(array(
        'scope' => array(
            'playlist-read-private',
            'playlist-modify-private',
            'user-read-private',
            'playlist-modify'
        )
    )));
    die();
}

echo '<pre>';
print_r($api->me()); //認証を受けたアカウントのプロフィールが表示される
echo '</pre>';
