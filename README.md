# SoundCloud Silex Provider

[![Build Status](https://travis-ci.org/mrprompt/silex-soundcloud.svg?branch=master)](https://travis-ci.org/mrprompt/silex-soundcloud)


```
use SilexFriends\SoundCloud\SoundCloud;
use Silex\Application;

$client_id      = getenv('SOUNDCLOUD_CLIENT_ID');
$client_secret  = getenv('SOUNDCLOUD_CLIENT_SECRET');

$app = new Application;
$app->register(new SoundCloud($client_id, $client_secret));

/* @var $url string */
$url = $app['request']->get('url');

/* @var $sound array */
$sound = $app['soundcloud']($url);

var_dump($sound);
```

Done :)