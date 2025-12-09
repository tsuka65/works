<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>music</title>
</head>

<body>
    <header>
        <form action="music.php" method="post" class="serach">
            <input type="text" size="32" class="keyword">
            <input type="image" src="imges/magnifier.png" alt="検索" class="magnifier">
        </form>
        <div class="kinnosuke">
            <p class="kinnosuke_text">力こそパワー<br>power is power</p>
            <img src="imges/fukidashi.png" alt="吹き出し">
            <img src="imges/kinnnosuke.png" alt="きんのすけ">
        </div>
    </header>
    <div class="playlists">
        <div class="playlist">
            <!--<iframe data-testid="embed-iframe" style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DX5zN3WoQDNeH?utm_source=generator" width="90%" height="300px" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            -->
        </div>
    </div>

    <?php

    // require_once('vendor/autoload.php');

    // $session = new SpotifyWebAPI\Session(
    //     'c679689a309540a4b257a20d901b19a3',
    //     'd5880bf84e954881aaf11833585f8294',
    //     'https://open.spotify.com/',


    // );
    // $api = new SpotifyWebAPI\SpotifyWebAPI();
    // $session->requestCredentialsToken();
    // $accessToken = $session->getAccessToken();
    // $api->setAccessToken($accessToken);

    // $result = $api->search('OFFICIAL HIGE DANDISM', 'track');

    // foreach ($result->tracks->items as $track) {
    //     $name  = $track->name;
    //     $uri   = $track->uri;
    //     $image = $track->album->images[0]->url;

    //     // track ID 抽出
    //     $trackId = str_replace('spotify:track:', '', $uri);
    //     $embedUrl = "https://open.spotify.com/embed/track/" . $trackId;

    //     echo "<h3>{$name}</h3>";
    //     echo "<img src='{$image}' width='200'><br><br>";

    //     echo '<iframe src="' . $embedUrl . '" 
    //         width="300" height="380" frameborder="0"
    //         allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture">
    //     </iframe>';
    //     echo "<hr>";
    // }


    ?>

    <?php

    require 'vendor/autoload.php';

    $session = new SpotifyWebAPI\Session(
        'c679689a309540a4b257a20d901b19a3',
        'd5880bf84e954881aaf11833585f8294',
        'https://open.spotify.com/',
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
    ?>

</body>

</html>