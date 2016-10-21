# SoundCloud Silex Provider

[![Build Status](https://travis-ci.org/SilexFriends/SoundCloud.svg?branch=master)](https://travis-ci.org/SilexFriends/SoundCloud)
[![Code Climate](https://codeclimate.com/github/SilexFriends/SoundCloud/badges/gpa.svg)](https://codeclimate.com/github/SilexFriends/SoundCloud)
[![Test Coverage](https://codeclimate.com/github/SilexFriends/SoundCloud/badges/coverage.svg)](https://codeclimate.com/github/SilexFriends/SoundCloud/coverage)
[![Issue Count](https://codeclimate.com/github/SilexFriends/SoundCloud/badges/issue_count.svg)](https://codeclimate.com/github/SilexFriends/SoundCloud)

## Install
```
composer require mrprompt/silex-soundcloud
```

## Usage
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

## Tests

```
./vendor/bin/phpunit
```

## License

MIT