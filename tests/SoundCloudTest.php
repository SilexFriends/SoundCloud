<?php
namespace SilexFriends\SoundCloud\Tests;

use SilexFriends\SoundCloud\SoundCloud;
use PHPUnit_Framework_TestCase;
use Silex\Application;

/**
 * SoundCloud service test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class SoundCloudTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $app;

    /**
     * Bootstrap
     */
    public function setUp()
    {
        parent::setUp();

        $client_id      = getenv('SOUNDCLOUD_CLIENT_ID');
        $client_secret  = getenv('SOUNDCLOUD_CLIENT_SECRET');

        $app = new Application;
        $app->register(new SoundCloud($client_id, $client_secret));

        $this->app = $app;
    }

    /**
     * Shutdown
     */
    public function tearDown()
    {
        $this->app = null;

        parent::tearDown();
    }

    /**
     * @test
     * @dataProvider validSounds
     */
    public function createMustBeReturnArray($url)
    {
        $result = $this->app[SoundCloud::NAME]($url);

        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('description', $result);
        $this->assertArrayHasKey('uri', $result);
        $this->assertArrayHasKey('artwork_url', $result);
    }

    /**
     * @return array
     */
    public function validSounds()
    {
        return [
            [
                'https://soundcloud.com/r3hab/calvin-harris-john-newman-blame-r3hab-trap-remix'
            ],
            [
                'https://soundcloud.com/bottom2thatop-records/kenny-b-i-gotta-have-you'
            ],
            [
                'https://soundcloud.com/r3hab/freak-joe-stone-remix'
            ],
        ];
    }
}
