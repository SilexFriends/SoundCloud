<?php
declare(strict_types = 1);

namespace MrPrompt\Silex;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Njasm\Soundcloud\Soundcloud as SoundCloudDriver;

/**
 * SoundCloud Service
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
final class SoundCloud implements SoundCloudInterface, ServiceProviderInterface
{
    /**
     * @var array
     */
    private $config;

    /**
     * SoundCloud constructor.
     *
     * @param string $client_id
     * @param string $client_secret
     */
    public function __construct(string $client_id, string $client_secret)
    {
        $this->config = [
            'client_id'     => $client_id,
            'client_secret' => $client_secret,
        ];
    }

    /**
     * (non-PHPdoc)
     * @see \Silex\ServiceProviderInterface::register()
     * @param Application $app
     */
    public function register(Application $app)
    {
        $service = $this;

        $app[static::NAME] = $app->protect(
            function (string $url) use ($service) {
                return $service->create($url);
            }
        );
    }

    /**
     * (non-PHPdoc)
     * @see \Silex\ServiceProviderInterface::boot()
     * @param Application $app
     */
    public function boot(Application $app)
    {
        // :)
    }

    /**
     * @param string $url
     * @return array
     */
    public function create(string $url): array
    {
        $config = $this->config;

        /* @service SoundcloudFacade */
        $service = new SoundCloudDriver($config['client_id'], $config['client_secret']);

        /* @var $responseSoundcloud \Njasm\Soundcloud\Request\Response */
        $responseSoundcloud = $service->get('/resolve',['url' => $url])->asJson()->request();

        /* @var $track \StdClass */
        $track = $responseSoundcloud->bodyObject();

        /* @var $parsed array */
        $parsed = parse_url($track->location);

        /* @var $response \Njasm\Soundcloud\Request\Response */
        $response = $service->get($parsed['path'])->request();

        return $response->bodyArray();
    }
}
