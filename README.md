# SoundCloud Silex Provider

[![Build Status](https://travis-ci.org/mrprompt/silex-soundcloud.svg?branch=master)](https://travis-ci.org/mrprompt/silex-soundcloud)


```
<?php
use MrPrompt\Silex\SoundCloud as SoundCloudServiceProvider;
use Silex\Application;

$client_id      = getenv('SOUNDCLOUD_CLIENT_ID');
$client_secret  = getenv('SOUNDCLOUD_CLIENT_SECRET');

$app = new Application;
$app->register(new SoundCloud($client_id, $client_secret));

// SoundCloud Provider
$app->register(
    new SoundCloudServiceProvider($client_id, $client_secret)
);

/* @var $url string */
$url = $app['request']->get('url');

/* @var $sound array */
$sound = $app['soundcloud']($url);

var_dump($sound);
```

Done :)